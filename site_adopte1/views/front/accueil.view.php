<?php 
ob_start(); 

echo styleTitreNiveau1("Ils ont trouvés une famille d'accueil !",COLOR_ASSO);
?>

<div class="presentation"></div>
 <div class="coucou">
<div class="main">

 <div class="section">
    <img src ='<?= URL ?>public/sources/images/sites/animaux/chat/bougui/bougui.jpg' />
      <div class="descriptions">
          <h1>Bougui</h1>
          <p> 
          description Bougui 
          </p>
          <button>Visiter ma page</button>
      </div>
  </div>
  <div class="section">
      
      <img src ='<?= URL ?>public/sources/images/sites/animaux/chien/samdie/samdie.jpg' />
      <div class="descriptions">
          <h1>Samdie</h1>
          <p>
             description de Samdie</p>
          <button>Visiter ma page</button>
      </div>
  </div>
  <div class="section">
      <img src ='<?= URL ?>public/sources/images/sites/animaux/chat/aidie/aidie.jpg' /> 
         <div class="descriptions">

          <h1>Aidie</h1>
          <p>
              description de Aidie </p>
          <button>Visiter ma page</button>
      </div>
  </div>
</div>
</div>

<?php 

echo styleTitreNiveau1("Ils ont besoin de vous !",COLOR_ASSO);
?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php for ($i = 0; $i < count($animaux); $i++) : ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="<?php echo ($i===0) ? "active" : ""?> bg-dark"></li>
        <?php endfor;?>
    </ol>
    <div class="carousel-inner ">
        <?php foreach($animaux as $key => $animal) : ?>
            <div class="carousel-item <?php echo ($key===0) ? "active" : ""?> ">
                <div class='row no-gutters border rounded overflow-hidden mb-4 perso_bgRose'>
                    <div class='col-12 col-md-auto text-center'>
                        <img src ='public/sources/images/sites/<?= $animal['image']['url_image'] ?>' style='height:250px;' alt='<?= $animal['image']['libelle_image'] ?>' />
                    </div>
                    <div class='col p-4 d-flex flex-column position-static'>
                        <h3 class='perso_ColorRoseMenu perso_policeTitre perso_textShadow'><?= $animal['nom_animal'] ?></h3>
                        <div class='text-muted mb-1'><?= date("d/m/Y", strtotime($animal['date_naissance_animal']))?></div>
                        <p class='mb-auto'>
                            <?= affichageCoupe(nl2br($animal['description_animal']),300) ?>
                        </p>
                        <a href="?page=animal&idAnimal=<?= $animal['id_animal'] ?>" class='btn btn-primary'>Visiter ma page </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class='row'>
    <div class='col-6 mt-3'>
        <?php 
        $txt = "<img src='public/sources/images/Autres/icones/journal.png' alt='logo News'/>Nouvelles des adoptés";
        echo styleTitreNiveau2($txt,COLOR_ACTUS);
        ?>
    </div>
    <div class='col-6 mt-3'>
        <?php 
        $txt = "<img src='public/sources/images/Autres/icones/action.png' alt='logo News'/>Evénements & Actions";
        echo styleTitreNiveau2($txt,COLOR_PENSIONNAIRE);
        ?>
    </div>
</div>
<div class='row'>
    <div class='col-6'>
        <div class='row no-gutters border rounded mb-4'>
            <div class='col-auto d-none d-lg-block'>
                <img src ='public/sources/images/sites/<?= $news['url_image'] ?>' style='height:150px;' alt='<?= $news['libelle_image'] ?>' />
            </div>
            <div class='col p-3 d-flew flex-column position-static perso_bgGreen'>
                <h3 class='mb-0 perso_ColorVertMenu perso_policeTitre perso_textShadow'><?= $news['libelle_actualite'] ?></h3>
                <p class='perso_size12 mt-2'>
                    <?= affichageCoupe(nl2br($news['contenu_actualite']),100) ?>
                </p>
                <a href="<?= URL ?>?page=actus&type=<?= TYPE_NEWS ?>" class='btn btn-primary'>Voir les nouvelles des adoptés </a>
            </div>
        </div>
    </div>
    <div class='col-6'>
        <div class='row no-gutters border rounded mb-4'>
            <div class='col-auto d-none d-lg-block'>
            <img src ='public/sources/images/sites/<?= $action['url_image'] ?>' style='height:150px;' alt='<?= $action['libelle_image'] ?>' />
            </div>
            <div class='col p-3 d-flew flex-column position-static perso_bgOrange'>
                <h3 class='mb-0 perso_ColorOrangeMenu perso_policeTitre perso_textShadow'><?= $action['libelle_actualite'] ?></h3>
                <p class='perso_size12 mt-2'>
                    <?= affichageCoupe(nl2br($action['contenu_actualite']),100) ?>
                </p>
                <a href="<?= URL ?>?page=actus&type=<?= TYPE_EVENTS ?>" class='btn btn-primary'>Les events </a>
                <a href="<?= URL ?>?page=actus&type=<?= TYPE_ACTIONS ?>" class='btn btn-primary'>Les actions </a>
            </div>
        </div>
    </div>
</div>
<?php

echo styleTitreNiveau1("Venez les voir !",COLOR_ASSO);

?>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2623.2486174227474!2d2.2931853156755513!3d48.891598879290754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66f9beb71a183%3A0x93e52aa5423fb04!2s21%20Rue%20d&#39;Alsace%2C%2092300%20Levallois-Perret!5e0!3m2!1sfr!2sfr!4v1573637527211!5m2!1sfr!2sfr" width="100%" height="320px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</div>


<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>
            
      