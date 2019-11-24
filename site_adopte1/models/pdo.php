<?php

require "config.models.php";

function connexionPDO(){
    $bdd = new PDO("mysql:host=".HOST_NAME.";dbname=".DATABASE_NAME.";charset=utf8",USER_NAME,PASSWORD);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    return $bdd;
}