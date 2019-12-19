<?php

function insertImageIntoBD($nomImage,$url){
    $bdd = connexionPDO();
    $req = '
    INSERT INTO image (libelle_image, url_image, description_image)
    values (:nomImage, :url, :description)
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":nomImage",$nomImage,PDO::PARAM_STR);
    $stmt->bindValue(":url",$url,PDO::PARAM_STR);
    $stmt->bindValue(":description",$nomImage,PDO::PARAM_STR);
    $stmt->execute();
    $resultat = $bdd->lastInsertId();
    $stmt->closeCursor();
    return $resultat;
}