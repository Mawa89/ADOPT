<?= styleTitreNiveau3("Images :", COLOR_ASSO) ?>
<div class="row border border-dark rounded-lg m-2 align-items-center">
    <div class="form-group col">
        <label for="imageActu">Image : </label>
        <input type="file" class="form-control-file" name="imageActu" id="imageActu">
    </div>
    <div class="form-group col row">
        <button id="multimedia" class="btn btn-primary col-3"> Image du site </button>
        <div id="resultat" class="col-auto"></div>
    </div>
</div>

<div id="imageManager" class="d-none border border-success rounded-lg m-2">
    <?= styleTitreNiveau3("Bibliothèque :", COLOR_ASSO) ?>
    <div class="row no-gutters align-items-center">
        <?php foreach($imagesBD as $image): ?>
            <div id="<?= $image['id_image']; ?>" class="col-1 border border-dark rounded-lg text-center p-1 mx-auto my-1">
                <img src="public/sources/images/sites/<?= $image['url_image']; ?>" class="img-fluid" style="max-height:75px" alt="<?= $image['libelle_image']; ?>"/>
            </div>
        <?php endforeach; ?>
        <button id="validationImage" class="btn btn-success col-12">Confirmer l'image selectionné </button>
    </div>
</div>
<script src='public/js/imageManagerNews.js'></script>