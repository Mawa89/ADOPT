<?php
require_once "public/utile/formatage.php"; 
require_once "public/utile/gestionImage.php"; 
require_once "models/animal.dao.php";
require_once "models/actualite.dao.php";
require_once "models/image.dao.php";
require_once "models/admin.dao.php";
require_once "config/config.php";

function getPageLogin(){
    $title = "Page de login du site";
    $description = "Page de login";

    if(Securite::verificationAccess()){
        header ("Location: admin");
    }
    $alert = "";
    if(isset($_POST['login']) && !empty($_POST['login']) &&
    isset($_POST['password']) && !empty($_POST['password'])){
        $login = Securite::secureHTML($_POST['login']);
        $password = Securite::secureHTML($_POST['password']);
        if(isConnexionValid($login,$password)){
            $_SESSION['acces'] = "admin";
            Securite::genereCookiePassword();
            header ("Location: admin");
        } else {
            $alert = "Mot de passe invalide";
        }
    }

    require_once "views/back/login.view.php";
}

function getPageAdmin(){
    if(isset($_POST['deconnexion']) && $_POST['deconnexion'] === "true"){
        session_destroy();
        header("Location: accueil");
    }

    if(Securite::verificationAccess()){
        Securite::genereCookiePassword();
        $title = "Page d'administration du site";
        $description = "Page d'administration du site";

        require_once "views/back/adminAccueil.view.php";
    } else {
        throw new Exception("Vous n'avez pas le droit d'accéder à cette page");
    }
}

function getPagePensionnaireAdmin($require ="", $alert="",$alertType="",$data=""){
    if(Securite::verificationAccess()){
        Securite::genereCookiePassword();
        $title = "Page de gestion des pensionnaires";
        $description = "Page de gestion des pensionnaires";

        $statuts = getStatutsAnimal();
        $caracteres = getListeCaracteresAnimal();

        $contentAdminAction="";
        if($require !=="") require_once $require;
        require_once "views/back/adminPensionnaire.view.php";
    } else {
        throw new Exception("Vous n'avez pas le droit d'accéder à cette page");
    }
}

function getPagePensionnaireAdminAjout(){
    $alert = "" ;
    $alertType = 0;

    if(isset($_POST['nom']) && !empty($_POST['nom']) &&
    isset($_POST['dateN']) && !empty($_POST['dateN'])
    ) {
        $nom = Securite::secureHTML($_POST['nom']);
        $puce = Securite::secureHTML($_POST['puce']);
        $dateN = Securite::secureHTML($_POST['dateN']);
        $type = Securite::secureHTML($_POST['type']);
        $sexe = Securite::secureHTML($_POST['sexe']);
        $statut = Securite::secureHTML($_POST['statut']);
        $amiChien = Securite::secureHTML($_POST['amiChien']);
        $amiChat = Securite::secureHTML($_POST['amiChat']);
        $amiEnfant = Securite::secureHTML($_POST['amiEnfant']);
        $description = Securite::secureHTML($_POST['description']);
        $adoptionDesc = Securite::secureHTML($_POST['adoptionDesc']);
        $localisation = Securite::secureHTML($_POST['localisation']);
        $engagement = Securite::secureHTML($_POST['engagement']);
        $caractere1 = Securite::secureHTML($_POST['caractere1']);
        $caractere2 = Securite::secureHTML($_POST['caractere2']);
        $caractere3 = Securite::secureHTML($_POST['caractere3']);
        
        $fileImage = $_FILES['imageActu'];
        $repertoire = "public/sources/images/sites/animaux/".$type."/".strtolower($nom)."/";

        try{
            $nomImage = ajoutImage($fileImage, $repertoire, $nom);
            $idImage = insertImageIntoBD($nomImage, "animaux/".$type."/".strtolower($nom)."/".$nomImage);
            $idAnimal = insertAnimalIntoBD($nom,$puce,$dateN,$type,$sexe,$statut,$amiChien,$amiChat,$amiEnfant,$description,$adoptionDesc,$localisation,$engagement);
            if($idAnimal >0){
                insertIntoContient($idImage,$idAnimal);
                insertIntoDispose($caractere1,$idAnimal);
                if($caractere2 !== $caractere1){
                    insertIntoDispose($caractere2,$idAnimal);
                }
                if($caractere3 !== $caractere2 && $caractere3 !== $caractere1){
                    insertIntoDispose($caractere3,$idAnimal);
                }
                $alert = "La création de l'animal est effectuée";
                $alertType = ALERT_SUCCESS;
            } else {
               throw new Exception("L'insertion en BD n'a pas fonctionné");
            }
        } catch(Exception $e){
            $alert = "La création de l'animal n'a pas fonctionnée <br />". $e->getMessage();
            $alertType = ALERT_DANGER;
        }
    }
  
    getPagePensionnaireAdmin("views/back/adminPensionnaireAjout.view.php",$alert,$alertType);
}

function getPagePensionnaireAdminModif(){
    $alert = "";
    $alertType="";
    $data = [];

    if(isset($_POST['etape']) && (int)$_POST['etape']>=3){
        $idStatut = Securite::secureHTML($_POST['statutAnimal']);
        $type = Securite::secureHTML($_POST['typeAnimal']);
        $data['animaux'] = getAnimauxFromTypeAndStatut($idStatut,$type);
    }
    if(isset($_POST['etape']) && (int)$_POST['etape']>=4){
        $idAnimal = Securite::secureHTML($_POST['animal']);
        $data['animal'] = getAnimalFromIdAnimalBD((int) $idAnimal);
        $caracteres = getAnimalCaracteresBD((int) $idAnimal);
        if(count($caracteres)>0) $data['animal']['caractere1'] = $caracteres[0];
        if(count($caracteres)>1) $data['animal']['caractere2'] = $caracteres[1];
        if(count($caracteres)>2) $data['animal']['caractere3'] = $caracteres[2];
    }
    if(isset($_POST['etape']) && (int)$_POST['etape']>=5){
        $idAnimal= $data['animal']['id_animal'];
        $nom = Securite::secureHTML($_POST['nom']);
        $puce = Securite::secureHTML($_POST['puce']);
        $dateN = Securite::secureHTML($_POST['dateN']);
        $typeSaisie = Securite::secureHTML($_POST['type']);
        $sexe = Securite::secureHTML($_POST['sexe']);
        $statut = Securite::secureHTML($_POST['statut']);
        $amiChien = Securite::secureHTML($_POST['amiChien']);
        $amiChat = Securite::secureHTML($_POST['amiChat']);
        $amiEnfant = Securite::secureHTML($_POST['amiEnfant']);
        $description = Securite::secureHTML($_POST['description']);
        $adoptionDesc = Securite::secureHTML($_POST['adoptionDesc']);
        $localisation = Securite::secureHTML($_POST['localisation']);
        $engagement = Securite::secureHTML($_POST['engagement']);
        $caractere1 = Securite::secureHTML($_POST['caractere1']);
        $caractere2 = Securite::secureHTML($_POST['caractere2']);
        $caractere3 = Securite::secureHTML($_POST['caractere3']);

        try{
            if(updateAnimalIntoBD($idAnimal,$nom,$puce,$dateN,$typeSaisie,$sexe,$statut,$amiChien,$amiChat,$amiEnfant,$description, $adoptionDesc, $localisation, $engagement)){
                deleteCaractereFromAnimalBD($idAnimal);
                insertIntoDispose($caractere1,$idAnimal);
                if($caractere2 !== $caractere1){
                    insertIntoDispose($caractere2,$idAnimal);
                }
                if($caractere3 !== $caractere2 && $caractere3 !== $caractere1){
                    insertIntoDispose($caractere3,$idAnimal);
                }
                $alert = "La modification de l'actualité est effectuée";
                $alertType = ALERT_SUCCESS;
            } else {
               throw new Exception("La modification en BD n'a pas fonctionné");
            }
        } catch(Exception $e){
            $alert = "La modification de l'actualité n'a pas fonctionnée <br />". $e->getMessage();
            $alertType = ALERT_DANGER;
        }
        $data['animal'] = getAnimalFromIdAnimalBD((int) $idAnimal);
        $caracteres = getAnimalCaracteresBD((int) $idAnimal);
        if(count($caracteres)>0) $data['animal']['caractere1'] = $caracteres[0];
        if(count($caracteres)>1) $data['animal']['caractere2'] = $caracteres[1];
        if(count($caracteres)>2) $data['animal']['caractere3'] = $caracteres[2];
    }
   
    getPagePensionnaireAdmin("views/back/adminPensionnaireModif.view.php",$alert,$alertType,$data);
}

function getPagePensionnaireAdminSup(){
    $alert = "";
    $alertType="";

    if(isset($_GET['sup'])){
        try{
            if(deleteAnimalFromBD(Securite::secureHTML($_GET['sup']))<1){
                throw new Exception ("la suppressio n'a pas fonctionné en BD");
            }
            $alert = "La suppression de l'animal a fonctionnée";
            $alertType = ALERT_SUCCESS;
        } catch(Exception $e){
            $alert = "La suppression de l'animal n'a pas fonctionnée";
            $alertType = ALERT_DANGER;
        }
    }
   
    getPagePensionnaireAdmin("",$alert,$alertType);
}


function getPageNewsAdmin($require ="", $alert="",$alertType="",$data=""){
    if(Securite::verificationAccess()){
        Securite::genereCookiePassword();
        $title = "Page de gestion des news";
        $description = "Page de gestion des news";

        $typeActualites = getTypesActualite();

        $contentAdminAction="";
        if($require !=="") require_once $require;
        require_once "views/back/adminNews.view.php";
    } else {
        throw new Exception("Vous n'avez pas le droit d'accéder à cette page");
    }
}

function getPageNewsAdminAjout(){
    $alert = "" ;
    $alertType="";
    if(isset($_POST['titreActu']) && !empty($_POST['titreActu']) &&
    isset($_POST['typeActu']) && !empty($_POST['typeActu']) &&
    isset($_POST['contenuActu']) && !empty($_POST['contenuActu'])
    ) {
        $alertType = 0;
        $titreActu = Securite::secureHTML($_POST['titreActu']);
        $typeActu = Securite::secureHTML($_POST['typeActu']);
        $contenuActu = Securite::secureHTML($_POST['contenuActu']);
        $fileImage = $_FILES['imageActu'];
        $repertoire = "public/sources/images/sites/news/";
        $date = date("Y-m-d H:i:s", time());
        try{
            $nomImage = ajoutImage($fileImage, $repertoire, $titreActu);
            $idImage=insertImageIntoBD($nomImage, "news/".$nomImage);

            if(insertActualiteIntoBD($titreActu,$typeActu,$contenuActu,$date,$idImage)){
                $alert = "La création de l'actualité est effectuée";
                $alertType = ALERT_SUCCESS;
            } else {
               throw new Exception("L'insertion en BD n'a pas fonctionné");
            }
        } catch(Exception $e){
            $alert = "La création de l'actualité n'a pas fonctionnée <br />". $e->getMessage();
            $alertType = ALERT_DANGER;
        }
    }
    getPageNewsAdmin("views/back/adminNewsAjout.view.php",$alert,$alertType);
}

function getPageNewsAdminModif(){
    $alert = "";
    $alertType="";
    $data = [];
    if(isset($_POST['etape']) && (int)$_POST['etape']>=2){
        $typeActu = Securite::secureHTML($_POST['typeActu']);
        $data['actualites'] = getActualitesFromBD((int) $typeActu);
    }
    if(isset($_POST['etape']) && (int)$_POST['etape']>=3){
        $actualite = Securite::secureHTML($_POST['actualites']);
        $data['actualite'] = getActualiteFromBD($actualite);
    }
    if(isset($_POST['etape']) && (int)$_POST['etape']>=4){
        $titreActu = Securite::secureHTML($_POST['titreActu']);
        $typeActu = Securite::secureHTML($_POST['typeActu']);
        $contenuActu = Securite::secureHTML($_POST['contenuActu']);
        $idImage = $data['actualite']['id_image'];
        $idActualite = $data['actualite']['id_actualite'];
        try{
            if($_FILES['imageActu']['size'] > 0){
                $fileImage = $_FILES['imageActu'];
                $repertoire = "public/sources/images/sites/news/";
                $nomImage = ajoutImage($fileImage, $repertoire, $titreActu);
                $idImage=insertImageIntoBD($nomImage, "news/".$nomImage);
            }
            if(updateActualiteIntoBD($idActualite,$titreActu,$typeActu,$contenuActu,$idImage)){
                $alert = "La modification de l'actualité est effectuée";
                $alertType = ALERT_SUCCESS;
            } else {
               throw new Exception("La modification en BD n'a pas fonctionné");
            }
        } catch(Exception $e){
            $alert = "La modification de l'actualité n'a pas fonctionnée <br />". $e->getMessage();
            $alertType = ALERT_DANGER;
        }
        $data['actualites'] = getActualitesFromBD((int) $typeActu);
        $data['actualite'] = getActualiteFromBD($actualite);
    }
    getPageNewsAdmin("views/back/adminNewsModif.view.php",$alert,$alertType,$data);
}

function getPageNewsAdminSup(){
    $alert = "";
    $alertType="";
    if(isset($_GET['sup'])){
        try{
            deleteActuFromBD(Securite::secureHTML($_GET['sup']));
            $alert = "La suppression de l'actualité a fonctionnée";
            $alertType = ALERT_SUCCESS;
        } catch(Exception $e){
            $alert = "La suppression de l'actualité n'a pas fonctionnée";
            $alertType = ALERT_DANGER;
        }
    }
    getPageNewsAdmin("",$alert,$alertType);
}
