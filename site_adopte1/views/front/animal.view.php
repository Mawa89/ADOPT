<?php ob_start();  ?>

<?= styleTitreNiveau1($animal['nom_animal'], COLOR_PENSIONNAIRE) ?>
<div class='row border border-dark rounded-lg m-2 align-items-center <?= ($animal['sexe']) ? "perso_bgGreen" : "perso_bgRose" ?>'>
    <div class="col p-2 text-center">
        <img src='<?= URL ?>public/sources/images/sites/<?= $images[0]['url_image'] ?>' class="img-thumbnail" style="max-height:180px;" alt="<?= $image[0]['libelle_image'] ?>" />
    </div>
    <?php 
        $iconeChien = "";
        if($animal['ami_chien'] === "oui") $iconeChien = "ChienOk";
        else if($animal['ami_chien'] === "non") $iconeChien = "ChienBar";
        else if($animal['ami_chien'] === "N/A") $iconeChien = "ChienQuest";
        $iconeChat = "";
        if($animal['ami_chat'] === "oui") $iconeChat = "ChatOk";
        else if($animal['ami_chat'] === "non") $iconeChat = "ChatBar";
        else if($animal['ami_chat'] === "N/A") $iconeChat = "ChatQuest";
        $inconeEnfant = "";
        if($animal['ami_enfant'] === "oui") $inconeEnfant = "babyOk";
        else if($animal['ami_enfant'] === "non") $inconeEnfant = "babyBar";
        else if($animal['ami_enfant'] === "N/A") $inconeEnfant = "babyQuest";
    ?>
    <div class="col-2 col-md-1 border-left border-right border-dark text-center">
        <img src='<?= URL ?>public/sources/images/Autres/icones/<?= $iconeChien  ?>.png' class="img-fluid m-1" style="width:50px;" alt="chienOk" />
        <img src='<?= URL ?>public/sources/images/Autres/icones/<?= $iconeChat  ?>.png' class="img-fluid m-1" style="width:50px;" alt="chatOk" />
        <img src='<?= URL ?>public/sources/images/Autres/icones/<?= $inconeEnfant  ?>.png' class="img-fluid m-1" style="width:50px;" alt="bayOk" />
    </div>
    <div class="col-6 col-md-4 text-center">
        <div class="mb-2">Puce : <?= $animal['puce'] ?></div>
        <div class="mb-2">Né : <?= date("d/m/Y", strtotime($animal['date_naissance_animal']))?></div>
        
        <div class="my-3">
            <?php foreach ($caracteres as $caractere) {?>
            <span class="badge badge-warning m-1 p-2 d-none d-sm-inline"> <?= ($animal['sexe']) ? $caractere['libelle_caractere_m'] : $caractere['libelle_caractere_f'] ?></span>
            
            <?php } ?>
        </div>
    </div>
    <div class="col-12 col-md-4">
        Frais d'adoption : 60€<br />
        Vaccins : 35€ (à la demande de l'adoptant)<br />
        Stérilisation : caution de 200 € vous sera demandée (rendue après réception du certificat)
    </div>
</div>

<div class="row no-gutters align-items-center">
    <div class="col-12 col-lg-6">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php foreach($images as $key => $image) : ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?= $key ?>" class="<?php echo ($key === 0) ? "active" : "" ?> bg-dark"></li>
            <?php endforeach; ?>
        </ol>
        <div class="carousel-inner text-center">
            <?php foreach($images as $key => $image) : ?>
                <div class="carousel-item <?php echo ($key === 0) ? "active" : "" ?>">
                    <img src="<?= URL ?>public/sources/images/sites/<?= $image['url_image']?>" class="img-thumbnail" style="height:500px" alt="<?= $image['libelle_image']?>">
                </div>
            <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <div>  
            <?= styleTitreNiveau2("Qui suis-je ?", COLOR_PENSIONNAIRE) ?>
            <?= $animal['description_animal']?>
        </div>
        <hr />
        <div>
            <img src="<?= URL ?>public/sources/images/Autres/icones/IconeAdopt.png" alt="" width="50" height="50" class="d-block mx-auto">
            <?= $animal['adoption_desc_animal']?>
        </div>
        <hr />
        <div>
            <img src="<?= URL ?>public/sources/images/Autres/icones/oeil.jpg" alt="" width="50" height="50" class="d-block mx-auto">
            <?= $animal['localisation_animal']?>
        </div>
        <hr />
        <div>
            <img src="<?= URL ?>public/sources/images/Autres/icones/iconeContrat.png" alt="" width="50" height="50" class="d-block mx-auto">
            <?= $animal['engagement_animal']?>
        </div>
    </div>
</div>
            
<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>
            