<?php ob_start();  ?>


<div class="row no-gutters align-items-center">
        <div class="col-12 col-md-5 p-2" >
            <img class="img-fluid img-thumbnail" src="<?= URL ?>public/sources/images/sites/articles/imageEduc.jpg" alt='educateur'/>
        </div>
        <div class="col-12 col-md-7 p-2" >
            <?= styleTitreNiveau1("Education canine", COLOR_CONSEILS) ?>
            <div class="mt-5">
                Nous connaissons des éducateurs canin employant l'éducation positive. <br />
                Nous <a href="?page=contact"><button type="button" class="btn btn-primary">Contacter ! &raquo;</button></a> via notre formulaire  !
            </div>
        </div>
    </div>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>       
      