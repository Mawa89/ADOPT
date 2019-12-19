<?php
require_once "pdo.php";

function getAnimalFromStatut($idStatut){
    $bdd = connexionPDO();
    $req = '
    SELECT * 
    FROM animal 
    where id_statut = :idStatut';
    if($idStatut === ID_STATUT_ADOPTE){
        $req .= ' or id_statut = '.ID_STATUT_MORT;
    }
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idStatut",$idStatut,PDO::PARAM_INT);
    $stmt->execute();
    $animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $animaux;
}

function getFirstImageAnimal($idAnimal){
    $bdd = connexionPDO();
    $stmt = $bdd->prepare('
    select i.id_image,libelle_image,url_image,description_image
    from image i
    inner join contient c on i.id_image = c.id_image
    inner join animal a on a.id_animal = c.id_animal
    where a.id_animal= :idAnimal
    LIMIT 1
    ');
    $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
    $stmt->execute();
    $image = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $image;
}

function getCaracteresFromAnimal($idAnimal){
    $bdd = connexionPDO();
    $stmt = $bdd->prepare('
    select c.libelle_caractere_m, c.libelle_caractere_f
    from caractere c 
    inner join dispose d on c.id_caractere = d.id_caractere
    where id_animal = :idAnimal
    ');
    $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
    $stmt->execute();
    $caracteres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $caracteres;
}

function getAnimalFromIdAnimalBD($idAnimal){
    $bdd = connexionPDO();
    $req = '
    SELECT * 
    FROM animal 
    where id_animal = :idAnimal';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
    $stmt->execute();
    $animal = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $animal;
}

function getImagesFromAnimal($idAnimal){
    $bdd = connexionPDO();
    $stmt = $bdd->prepare('
    select i.id_image,libelle_image,url_image,description_image
    from image i
    inner join contient c on i.id_image = c.id_image
    inner join animal a on a.id_animal = c.id_animal
    where a.id_animal= :idAnimal
    ');
    $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
    $stmt->execute();
    $images = $stmt->fetchALL(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $images;
}

function getStatutsAnimal(){
    $bdd = connexionPDO();
    $req = '
    SELECT * 
    FROM statut';
    $stmt = $bdd->prepare($req);
    $stmt->execute();
    $statuts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $statuts;
}

function getListeCaracteresAnimal(){
    $bdd = connexionPDO();
    $req = '
    SELECT * 
    FROM caractere';
    $stmt = $bdd->prepare($req);
    $stmt->execute();
    $caracteres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $caracteres;
}

function insertAnimalIntoBD($nom,$puce,$dateN,$type,$sexe,$statut,$amiChien,$amiChat,$amiEnfant,$description,$adoptionDesc,$localisation,$engagement){
    $bdd = connexionPDO();
    $req = '
    INSERT INTO animal (nom_animal, type_animal, puce, sexe, date_naissance_animal, ami_chien,ami_chat,ami_enfant,description_animal,adoption_desc_animal,localisation_animal,engagement_animal,id_statut)
    values (:nom, :type, :puce, :sexe, :dateN, :amiChien, :amiChat, :amiEnfant, :description, :adoptionDesc, :localisation, :engagement, :statut)
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
    $stmt->bindValue(":type",$type,PDO::PARAM_STR);
    $stmt->bindValue(":puce",$puce,PDO::PARAM_STR);
    $stmt->bindValue(":sexe",$sexe,PDO::PARAM_INT);
    $stmt->bindValue(":dateN",$dateN,PDO::PARAM_STR);
    $stmt->bindValue(":amiChien",$amiChien,PDO::PARAM_STR);
    $stmt->bindValue(":amiChat",$amiChat,PDO::PARAM_STR);
    $stmt->bindValue(":amiEnfant",$amiEnfant,PDO::PARAM_STR);
    $stmt->bindValue(":description",$description,PDO::PARAM_STR);
    $stmt->bindValue(":adoptionDesc",$adoptionDesc,PDO::PARAM_STR);
    $stmt->bindValue(":localisation",$localisation,PDO::PARAM_STR);
    $stmt->bindValue(":engagement",$engagement,PDO::PARAM_STR);
    $stmt->bindValue(":statut",$statut,PDO::PARAM_INT);
    $stmt->execute();
    $resultat = $bdd->lastInsertId();
    $stmt->closeCursor();
    return $resultat;
}

function insertIntoContient($idImage,$idAnimal){
    $bdd = connexionPDO();
    $req = '
    INSERT INTO contient values(:idImage, :idAnimal)
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idImage",$idImage,PDO::PARAM_INT);
    $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor();
}

function insertIntoDispose($caractere,$idAnimal){
    $bdd = connexionPDO();
    $req = '
    INSERT INTO dispose values(:idcaractere, :idAnimal)
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idcaractere",$caractere,PDO::PARAM_INT);
    $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor();
}

function getAnimauxFromTypeAndStatut($idStatut,$type){
    $bdd = connexionPDO();
    $req = '
    SELECT * 
    FROM animal 
    where id_statut = :idStatut and type_animal = :type';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idStatut",$idStatut,PDO::PARAM_INT);
    $stmt->bindValue(":type",$type,PDO::PARAM_STR);
    $stmt->execute();
    $animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $animaux;
}

function getAnimalCaracteresBD($idAnimal){
    $bdd = connexionPDO();
    $req = '
    SELECT * 
    FROM dispose 
    where id_animal = :idAnimal';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
    $stmt->execute();
    $animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $animaux;
}

function updateAnimalIntoBD($idAnimal,$nom,$puce,$dateN,$typeSaisie,$sexe,$statut,$amiChien,$amiChat,$amiEnfant,$description, $adoptionDesc, $localisation, $engagement){
    $bdd = connexionPDO();
    $req = '
    update animal
    set nom_animal = :nom, type_animal = :type, puce=:puce, sexe=:sexe, date_naissance_animal=:dateN,
    ami_chien = :amiChien, ami_chat = :amiChat,ami_enfant = :amiEnfant, description_animal = :description,
    adoption_desc_animal = :adoptionDesc, localisation_animal= :localisation,
    engagement_animal = :engagement, id_statut = :statut
    where id_animal = :idAnimal
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
    $stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
    $stmt->bindValue(":type",$typeSaisie,PDO::PARAM_STR);
    $stmt->bindValue(":puce",$puce,PDO::PARAM_STR);
    $stmt->bindValue(":sexe",$sexe,PDO::PARAM_INT);
    $stmt->bindValue(":dateN",$dateN,PDO::PARAM_STR);
    $stmt->bindValue(":amiChien",$amiChien,PDO::PARAM_STR);
    $stmt->bindValue(":amiChat",$amiChat,PDO::PARAM_STR);
    $stmt->bindValue(":amiEnfant",$amiEnfant,PDO::PARAM_STR);
    $stmt->bindValue(":description",$description,PDO::PARAM_STR);
    $stmt->bindValue(":adoptionDesc",$adoptionDesc,PDO::PARAM_STR);
    $stmt->bindValue(":localisation",$localisation,PDO::PARAM_STR);
    $stmt->bindValue(":engagement",$engagement,PDO::PARAM_STR);
    $stmt->bindValue(":statut",$statut,PDO::PARAM_INT);
    $resultat = $stmt->execute();
    $stmt->closeCursor();
    if($resultat > 0) return true;
    return false;
}

function deleteCaractereFromAnimalBD($idAnimal){
    $bdd = connexionPDO();
    $req = '
    delete FROM dispose 
    where id_animal = :idAnimal';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor();
}

function deleteAnimalFromBD($idAnimal){
    $bdd = connexionPDO();
    $req = '
    delete FROM animal 
    where id_animal = :idAnimal';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
    $resultat = $stmt->execute();
    $stmt->closeCursor();
    return $resultat;
}