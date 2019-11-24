<?php ob_start();  ?>


<?= styleTitreNiveau1("Contact", COLOR_CONTACT) ?>

<?= styleTitreNiveau3("Suivez-nous :", COLOR_CONTACT);?>
<p class="pl-5">
    <a href="https://www.facebook.com/bouare.awa/" target=_blank><img src="../../sources/images/Autres/icones/facebook.png" width="30px" alt="Facebook"/></a>
    Suivez-nous sur facebook et participez à l'aventure de ADOPT : 
    <a href="https://www.facebook.com/bouare.awa/" target=_blank><span class="badge badge-pill badge-primary">Notre facebook</span></a>
</p>

<?= styleTitreNiveau3("Contactez-nous :", COLOR_CONTACT) ?>
<div class="pl-5">
    <p>
        <img src="../../sources/images/Autres/icones/courrier.png" width="30px" alt="courrier"/>
        Par courrier : 2 Rue Maurice Ravel - 92300 Levallois Perret, France
    </p>
    <p>
        <img src="../../sources/images/Autres/icones/mail.png" width="30px" alt="mail"/>
        Par mail : <a href="mailto:bouareawa111@gmail.com">bouareawa111@gmail.com</a>
    </p>
    <p>
        <img src="../../sources/images/Autres/icones/tel.png" width="30px" alt="tel"/>
        Par téléphone : 06 52 45 66 72
    </p>
    <p>
        <span class="badge badge-pill badge-danger">Ou</span> par notre <span class="badge badge-pill badge-warning">formulaire</span> de contact :
    </p>
</div>

<?= styleTitreNiveau3("Formulaire de contact :", COLOR_CONTACT) ?>
<?php 
if(isset($_POST['nom']) && !empty($_POST['nom']) && 
isset($_POST['mail']) && !empty($_POST['mail']) &&
isset($_POST['objet']) && !empty($_POST['objet']) &&
isset($_POST['message']) && !empty($_POST['message']) &&
isset($_POST['captcha']) && !empty($_POST['captcha'])
){
    $captcha = (int) $_POST['captcha'];
    if($captcha === 8){
        $nom = htmlentities($_POST['nom']);
        $mail = htmlentities($_POST['mail']);
        $objet = htmlentities($_POST['objet']);
        $message = htmlentities($_POST['message']);
        $destinataire = "bouareawa111@gmail.com";
        mail($destinataire, $objet. " - " . $nom, "Mail : ". $mail. " Message : " . $message);
        echo '<div class="alert alert-success" role="alert">';
            echo 'Message envoyé';
        echo '</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo 'Erreur de Captcha, recommencer';
        echo '</div>';
    }
}
?>
<form method="POST" action="#" class="pl-5">
    <div class="form-group row no-gutters align-items-center">
        <label for="nom" class="col-auto pr-3">Nom :</label>
        <input type="text" name="nom" id="nom" class="form-control col" Placeholder = "nom" required/>
    </div>
    <div class="form-group row no-gutters align-items-center">
        <label for="mail" class="col-auto pr-3">Email :</label>
        <input type="email" name="mail" id="mail" class="form-control col" Placeholder = "nom@exemple.com" required/>
    </div>
    <div class="form-group row no-gutters align-items-center">
        <label for="objet" class="col-auto pr-3">Objet :</label>
        <select class='form-control col' id="objet" name="objet">
            <option value="question">Question</option>
            <option value="adoption">Adoption</option>
            <option value="donnation">Donnation</option>
            <option value="autre">Autre</option>
        </select>
    </div>
    <div class="form-group">
        <label for="message">Message :</label>
        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
    </div>
    <div class="form-group row no-gutters align-items-center">
        <label for="captcha" class="col-auto pr-3">Combien font 3+5 :</label>
        <input type="number" name="captcha" id="captcha" class="form-control col" required/>
    </div>
    <input type="submit" class="btn btn-primary mx-auto d-block" value="Valider" />
</form>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>
            