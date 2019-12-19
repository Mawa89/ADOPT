<?php ob_start();  ?>

<?= styleTitreNiveau1("Page d'administration du site", COLOR_ASSO) ?>

<div class="row">
    <div class="col text-center">
        <a href="?page=genererPensionnaireAdmin" class="btn btn-primary">Gestion des pensionnaires </a>
    </div>
    <div class="col text-center">
        <a href="?page=genererNewsAdmin" class="btn btn-primary">Gestion des news </a>
    </div>
    <div class="col text-center">
            <form method="POST" action="">
            <input type='hidden' name='deconnexion' value="true" />
        <input type="submit" class="btn btn-primary" value="se déconnecter" />
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>

            
      