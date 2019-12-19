<?php ob_start();  ?>

<?= styleTitreNiveau2("Ajout d'un animal", COLOR_ASSO) ?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group row no-gutters align-items-center col-4">
            <label for="nom" class="col-12 cold-md-auto pr-2">Nom : </label>
            <input type="text" class="col form-control" id="nom" name="nom" required>
        </div>
        <div class="form-group row no-gutters align-items-center col-4">
            <label for="puce" class="col-12 cold-md-auto pr-2">Puce : </label>
            <input type="text" class="col form-control" id="puce" name="puce">
        </div>
        <div class="form-group row no-gutters align-items-center col-4">
            <label for="dateN" class="col-12 cold-md-auto pr-2">Né : </label>
            <input type="date" class="col form-control" id="dateN" name="dateN" required>
        </div>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr class="text-center">
                <th>Type</th>
                <th>Sexe</th>
                <th>Statut</th>
                <th>Ami Chien</th>
                <th>Ami Chat</th>
                <th>Ami Enfant</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td>
                    <select name="type">
                        <option value="chat">Chat</option>
                        <option value="chien">Chien</option>
                    </select>
                </td>
                <td>
                    <select name="sexe">
                        <option value="1">Mâle</option>
                        <option value="0">Femelle</option>
                    </select>
                </td>
                <td>
                    <select name="statut">
                        <?php foreach($statuts as $statut) : ?>
                            <option value="<?= $statut['id_statut'] ?>"><?= $statut['libelle_statut'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select name="amiChien">
                        <option value="Non">Non</option>
                        <option value="Oui">Oui</option>
                        <option value="N/A">N/A</option>
                    </select>
                </td>
                <td>
                    <select name="amiChat">
                        <option value="Non">Non</option>
                        <option value="Oui">Oui</option>
                        <option value="N/A">N/A</option>
                    </select>
                </td>
                <td>
                    <select name="amiEnfant">
                        <option value="Non">Non</option>
                        <option value="Oui">Oui</option>
                        <option value="N/A">N/A</option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table">
        <thead class="thead-dark">
            <tr class="text-center">
                <th>Caractere 1</th>
                <th>Caractere 2</th>
                <th>Caractere 3</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td>
                    <select name="caractere1">
                        <?php foreach($caracteres as $caractere) : ?>
                            <option value="<?= $caractere['id_caractere'] ?>"><?= $caractere['libelle_caractere_m'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select name="caractere2">
                        <?php foreach($caracteres as $caractere) : ?>
                            <option value="<?= $caractere['id_caractere'] ?>"><?= $caractere['libelle_caractere_m'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select name="caractere3">
                        <?php foreach($caracteres as $caractere) : ?>
                            <option value="<?= $caractere['id_caractere'] ?>"><?= $caractere['libelle_caractere_m'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="5"></textarea>
    </div>
    <div class="form-group">
        <label for="adoptionDesc">Adoption description</label>
        <textarea class="form-control" id="adoptionDesc" name="adoptionDesc" rows="5"></textarea>
    </div>
    <div class="form-group">
        <label for="localisation">Localisation</label>
        <textarea class="form-control" id="localisation" name="localisation" rows="5"></textarea>
    </div>
    <div class="form-group">
        <label for="engagement">Engagement</label>
        <textarea class="form-control" id="engagement" name="engagement" rows="5"></textarea>
    </div>
    <div class="form-group">
        <label for="imageActu">Image : </label>
        <input type="file" class="form-control-file" name="imageActu" id="imageActu">
    </div>
    <div class="row no-gutters">
        <button type="submit" class="col btn btn-primary">Valider</button>
    </div>
</form>

<?php
$contentAdminAction = ob_get_clean();
?>

            
      