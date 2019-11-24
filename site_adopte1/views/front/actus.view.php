<?php ob_start();  ?>

<?= styleTitreNiveau1("Actus", COLOR_ACTUS) ; ?>

<?php foreach($actualites as $actualite) : 
    echo styleTitrePost("<span class='".COLOR_ACTUS."'>".$actualite['libelle_actualite']."</span> - Posté le : <span class='".COLOR_ACTUS."'>". date("d/m/Y", strtotime($actualite['date_publication_actualite']))." </span>");
    ?>

    <div class='row no-gutters align-items-center' style="min-height:300px;">
        <div class="col-12 col-lg-3 text-center">
            <img src="<?= URL ?>public/sources/images/sites/<?= $actualite['image']['url_image']?>" alt="<?= $actualite['image']['libelle_image']?>" style="max-height:280px" class="img-fluid p-1"/>
        </div>
        <div class="col-12 col-lg-9">
            <?= $actualite['contenu_actualite'] ?>
        </div>
    </div>

<?php endforeach; ?>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>
            