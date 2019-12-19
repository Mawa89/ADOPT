-<?php
require_once "pdo.php";

function getActualitesFromBD($type){
    $bdd = connexionPDO();
    $req = '
    SELECT * 
    FROM actualite
    where id_type_actualite = :type
    order by date_publication_actualite DESC
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":type",$type,PDO::PARAM_STR);
    $stmt->execute();
    $actualites = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $actualites;
}

function getActualiteFromBD($idActualite){
    $bdd = connexionPDO();
    $req = '
    SELECT id_actualite, libelle_actualite, contenu_actualite, id_type_actualite, a.id_image, i.url_image, i.libelle_image 
    FROM actualite a
    inner join image i on i.id_image = a.id_image
    where id_actualite = :idActualite
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idActualite",$idActualite,PDO::PARAM_INT);
    $stmt->execute();
    $actualite = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $actualite;
}

function getImageActualiteFromBD($idImage){
    $bdd = connexionPDO();
    $req = '
    SELECT * 
    FROM image 
    where id_image = :idImage
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idImage",$idImage,PDO::PARAM_INT);
    $stmt->execute();
    $image = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $image;
}

function getLastNews(){
    $bdd = connexionPDO();
    $req = '
    SELECT id_actualite,libelle_actualite,contenu_actualite,date_publication_actualite,id_type_actualite, a.id_image, i.libelle_image,i.url_image,i.description_image
    FROM actualite a 
    inner join image i on a.id_image = i.id_image
    where id_type_actualite = :type
    order by date_publication_actualite DESC
    LIMIT 1
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":type",TYPE_NEWS,PDO::PARAM_STR);
    $stmt->execute();
    $actualite = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $actualite;
}

function getLastActionsOrEvents(){
    $bdd = connexionPDO();
    $req = '
    SELECT id_actualite,libelle_actualite,contenu_actualite,date_publication_actualite,id_type_actualite, a.id_image, i.libelle_image,i.url_image,i.description_image
    FROM actualite a 
    inner join image i on a.id_image = i.id_image
    where id_type_actualite = :typeEvent or  id_type_actualite = :typeAction
    order by date_publication_actualite DESC
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":typeEvent",TYPE_EVENTS,PDO::PARAM_STR);
    $stmt->bindValue(":typeAction",TYPE_ACTIONS,PDO::PARAM_STR);
    $stmt->execute();
    $actualite = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $actualite;
}

function getTypesActualite(){
    $bdd = connexionPDO();
    $req = '
    SELECT * 
    FROM type_actualite
    ';
    $stmt = $bdd->prepare($req);
    $stmt->execute();
    $typesActualite = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $typesActualite;
}

function insertActualiteIntoBD($titreActu,$typeActu,$contenuActu,$date,$image){
    $bdd = connexionPDO();
    $req = '
    INSERT INTO actualite (libelle_actualite, contenu_actualite, date_publication_actualite, id_image, id_type_actualite)
    values (:titre, :contenu, :date, :image, :typeActualite)
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":titre",$titreActu,PDO::PARAM_STR);
    $stmt->bindValue(":contenu",$contenuActu,PDO::PARAM_STR);
    $stmt->bindValue(":date",$date,PDO::PARAM_STR);
    $stmt->bindValue(":image",$image,PDO::PARAM_INT);
    $stmt->bindValue(":typeActualite",$typeActu,PDO::PARAM_INT);
    $resultat = $stmt->execute();
    $stmt->closeCursor();
    if($resultat >0) return true;
    else return false;
}

function updateActualiteIntoBD($idActualite,$titreActu,$typeActu,$contenuActu,$idImage){
    $bdd = connexionPDO();
    $req = '
    update actualite
    set libelle_actualite = :libelle, contenu_actualite = :contenu, id_type_actualite = :type, id_image= :image
    where id_actualite = :idActualite
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":libelle",$titreActu,PDO::PARAM_STR);
    $stmt->bindValue(":contenu",$contenuActu,PDO::PARAM_STR);
    $stmt->bindValue(":type",$typeActu,PDO::PARAM_INT);
    $stmt->bindValue(":image",$idImage,PDO::PARAM_INT);
    $stmt->bindValue(":idActualite",$idActualite,PDO::PARAM_INT);
    $resultat = $stmt->execute();
    $stmt->closeCursor();
    if($resultat > 0) return true;
    return false;
}

function deleteActuFromBD($idActualite){
    $bdd = connexionPDO();
    $req = '
    delete from actualite where id_actualite = :idActualite
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idActualite",$idActualite,PDO::PARAM_INT);
    $resultat = $stmt->execute();
    $stmt->closeCursor();
    if($resultat > 0) return true;
    return false;
}