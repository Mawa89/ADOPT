<?php ob_start();  ?>

<?= styleTitreNiveau2("Modification d'un animal", COLOR_ASSO) ?>
<?= styleTitreNiveau3("Choix : ", COLOR_ASSO) ?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="etape" value="2">
    <label for="statutAnimal">Statut : </label>
    <select name="statutAnimal" id="statutAnimal" class="form-control" onchange="submit()">
        <option></option>
        <?php foreach($statuts as $statut) :?>
            <option value="<?= $statut['id_statut'] ?>"
                <?php if(isset($_POST['statutAnimal']) && $_POST['statutAnimal'] === $statut['id_statut']) echo "selected"?>>
                <?= $statut['libelle_statut'] ?> 
            </option>
        <?php endforeach; ?>
    </select>
</form>

<?php if(isset($_POST['etape']) && (int) $_POST['etape'] >=2) {?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="etape" value="3">
    <input type="hidden" name="statutAnimal" value="<?= $_POST['statutAnimal'] ?>">
    <label for="typeAnimal">Type : </label>
    <select name="typeAnimal" id="typeAnimal" class="form-control" onchange="submit()">
        <option></option>
        <option value="chat" <?php if(isset($_POST['typeAnimal']) && $_POST['typeAnimal'] === "chat") echo "selected"?>>Chats</option>
        <option value="chien" <?php if(isset($_POST['typeAnimal']) && $_POST['typeAnimal'] === "chien") echo "selected"?>>Chiens</option>
    </select>
</form>
<?php }?>

<?php if(isset($_POST['etape']) && (int) $_POST['etape'] >=3) {?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="etape" value="4">
    <input type="hidden" name="statutAnimal" value="<?= $_POST['statutAnimal'] ?>">
    <input type="hidden" name="typeAnimal" value="<?= $_POST['typeAnimal'] ?>">
    <label for="animal">Animal : </label>
    <select name="animal" id="animal" class="form-control" onchange="submit()">
        <option></option>
        <?php foreach($data['animaux'] as $animal) :?>
            <option value="<?= $animal['id_animal'] ?>"
                <?php if(isset($_POST['animal']) && $_POST['animal'] === $animal['id_animal']) echo "selected"?>>
                <?= $animal['id_animal'] ?> - <?= $animal['nom_animal'] ?> 
            </option>
        <?php endforeach; ?>
    </select>
</form>
<?php }?>

<?php if(isset($_POST['etape']) && (int) $_POST['etape'] >=4) {?>
<?= styleTitreNiveau3("Modification de l'animal : ", COLOR_ASSO) ?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="etape" value="5">
    <input type="hidden" name="statutAnimal" value="<?= $_POST['statutAnimal'] ?>">
    <input type="hidden" name="typeAnimal" value="<?= $_POST['typeAnimal'] ?>">
    <input type="hidden" name="animal" value="<?= $_POST['animal'] ?>" id="idAnimal">

    <div class="row">
        <div class="form-group row no-gutters align-items-center col-4">
            <label for="nom" class="col-12 cold-md-auto pr-2">Nom : </label>
            <input type="text" class="col form-control" id="nom" name="nom" value="<?= $data['animal']['nom_animal'] ?>" required>
        </div>
        <div class="form-group row no-gutters align-items-center col-4">
            <label for="puce" class="col-12 cold-md-auto pr-2">Puce : </label>
            <input type="text" class="col form-control" id="puce" name="puce" value="<?= $data['animal']['puce'] ?>">
        </div>
        <div class="form-group row no-gutters align-items-center col-4">
            <label for="dateN" class="col-12 cold-md-auto pr-2">Né : </label>
            <input type="date" class="col form-control" id="dateN" name="dateN" value="<?= $data['animal']['date_naissance_animal'] ?>" required>
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
                        <option value="chat" <?php if($data['animal']['type_animal'] === "Chat") echo "selected"?>>Chat</option>
                        <option value="chien" <?php if($data['animal']['type_animal'] === "Chien") echo "selected"?>>Chien</option>
                    </select>
                </td>
                <td>
                    <select name="sexe">
                        <option value="1" <?php if((int) $data['animal']['sexe'] === 1) echo "selected"?>>Mâle</option>
                        <option value="0" <?php if((int) $data['animal']['sexe'] === 0) echo "selected"?>>Femelle</option>
                    </select>
                </td>
                <td>
                    <select name="statut">
                        <?php foreach($statuts as $statut) : ?>
                            <option value="<?= $statut['id_statut'] ?>"
                            <?php if((int) $data['animal']['id_statut'] === (int) $statut['id_statut']) echo "selected"?>>
                            <?= $statut['libelle_statut'] ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select name="amiChien">
                        <option value="Non" <?php if($data['animal']['ami_chien'] === "non") echo "selected"?>>
                            Non
                        </option>
                        <option value="Oui" <?php if($data['animal']['ami_chien'] === "oui") echo "selected"?>>
                            Oui
                        </option>
                        <option value="N/A" <?php if($data['animal']['ami_chien'] === "N/A") echo "selected"?>>
                            N/A
                        </option>
                    </select>
                </td>
                <td>
                    <select name="amiChat">
                    <option value="Non" <?php if($data['animal']['ami_chat'] === "non") echo "selected"?>>
                            Non
                        </option>
                        <option value="Oui" <?php if($data['animal']['ami_chat'] === "oui") echo "selected"?>>
                            Oui
                        </option>
                        <option value="N/A" <?php if($data['animal']['ami_chat'] === "N/A") echo "selected"?>>
                            N/A
                        </option>
                    </select>
                </td>
                <td>
                    <select name="amiEnfant">
                    <option value="Non" <?php if($data['animal']['ami_enfant'] === "non") echo "selected"?>>
                            Non
                        </option>
                        <option value="Oui" <?php if($data['animal']['ami_enfant'] === "oui") echo "selected"?>>
                            Oui
                        </option>
                        <option value="N/A" <?php if($data['animal']['ami_enfant'] === "N/A") echo "selected"?>>
                            N/A
                        </option>
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
                            <option value="<?= $caractere['id_caractere'] ?>"
                            <?php if(isset($data['animal']['caractere2']) && $data['animal']['caractere1']['id_caractere'] === $caractere['id_caractere'] ) echo "selected"?>>
                                <?= $caractere['libelle_caractere_m'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select name="caractere2">
                        <?php foreach($caracteres as $caractere) : ?>
                            <option value="<?= $caractere['id_caractere'] ?>"
                            <?php if(isset($data['animal']['caractere2']) && $data['animal']['caractere2']['id_caractere'] === $caractere['id_caractere'] ) echo "selected"?>>
                            <?= $caractere['libelle_caractere_m'] ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select name="caractere3">
                        <?php foreach($caracteres as $caractere) : ?>
                            <option value="<?= $caractere['id_caractere'] ?>"
                                <?php if(isset($data['animal']['caractere3']) && $data['animal']['caractere3']['id_caractere'] === $caractere['id_caractere'] ) echo "selected"?>>
                                <?= $caractere['libelle_caractere_m'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="5"><?=  $data['animal']['description_animal'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="adoptionDesc">Adoption description</label>
        <textarea class="form-control" id="adoptionDesc" name="adoptionDesc" rows="5"><?=  $data['animal']['adoption_desc_animal'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="localisation">Localisation</label>
        <textarea class="form-control" id="localisation" name="localisation" rows="5"><?=  $data['animal']['localisation_animal'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="engagement">Engagement</label>
        <textarea class="form-control" id="engagement" name="engagement" rows="5"><?=  $data['animal']['engagement_animal'] ?></textarea>
    </div>
    
    <div class="row no-gutters">
        <button type="submit" class="col btn btn-primary">Valider</button>
        <button id="btnSup" class="btn btn-danger col">Supprimer</button>
    </div>
    <script src="public/js/verificationSuppressionAnimal.js"></script>
<?php }?>

<?php
$contentAdminAction = ob_get_clean();
?>

            
      