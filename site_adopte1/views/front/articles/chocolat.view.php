<?php ob_start();  ?>

<div class="p-2 text-center" >
    <?PHP 
    $txt = 'Attention le chocolat est extrémement <span class="badge badge-danger">dangereux</span> pour les chients et chats !';
    echo styleTitreNiveau1($txt, COLOR_CONSEILS) 
    ?>
    <img class="img-fluid img-thumbnail" src="<?= URL ?>public/sources/images/sites/articles/Chocolat.jpg" alt='chocolat'/>
</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>     
  