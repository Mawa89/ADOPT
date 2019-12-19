<?php
session_start();
require_once "controllers/backend.controller.php";
require_once "controllers/frontend.controller.php";
require_once "config/Securite.class.php";

try {
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $page = Securite::secureHTML($_GET['page']);
        switch ($page){
            case "accueil": getPageAccueil();
            break;
            case "pensionnaires": getPagePensionnaires();
            break;
            case "partenaires": getPagePartenaires();
            break;
            case "association": getPageAssociation();
            break;
            case "temperatures": getPageTemperatures();
            break;
            case "chocolat": getPageChocolat();
            break;
            case "plantes": getPagePlantes();
            break;
            case "sterilisation": getPageSterilisation();
            break;
            case "educateur": getPageEducateur();
            break;
            case "contact": getPageContact();
            break;
            case "don": getPageDon();
            break;
            case "mentions": getPageMentions();
            break;
            case "actus": getPageActus();
            break;
            case "animal": getPageAnimal();
            break;
            case "login": getPageLogin();
            break;
            case "admin": getPageAdmin();
            break;
            case "genererPensionnaireAdmin": getPagePensionnaireAdmin();
            break;
            case "genererPensionnaireAdminAjout": getPagePensionnaireAdminAjout();
            break;
            case "genererPensionnaireAdminModif": getPagePensionnaireAdminModif();
            break;
            case "genererPensionnaireAdminSup": getPagePensionnaireAdminSup();
            break;
            case "genererNewsAdmin": getPageNewsAdmin();
            break;
            case "genererNewsAdminAjout": getPageNewsAdminAjout();
            break;
            case "genererNewsAdminModif": getPageNewsAdminModif();
            break;
            case "genererNewsAdminSup": getPageNewsAdminSup();
            break;
            case "error301": 
            case "error302": 
            case "error400": 
            case "error401": 
            case "error402": 
            case "error405": 
            case "error500": 
            case "error505": throw new Exception("Error de type : "+$page);
            break;
            case "error403": throw new Exception("vous n'avez pas le droit d'accéder à ce dossier");
            break;
            case "error404":
            default: throw new Exception("La page n'existe pas");
        }
    } else {
        getPageAccueil();
    }
} catch(Exception $e){
    $title = "Error";
    $description = "Page de gestion des erreurs";
    $errorMessage = $e->getMessage();
    require "views/commons/erreur.view.php";
}


