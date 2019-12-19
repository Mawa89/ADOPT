<?php ob_start();  ?>

<?= styleTitreNiveau1("Page de gestion des news", COLOR_ASSO) ?>

<a href="?page=genererNewsAdminAjout" class="btn btn-primary">Ajouter</a>
<a href="?page=genererNewsAdminModif" class="btn btn-primary">Modifier</a>

<?= $contentAdminAction ?>

<?php if($alert !== ""){ 
    echo afficherAlert($alert,$alertType);
 } ?>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>

            
      