<?php ob_start();  ?>

<?= styleTitreNiveau1("Login", COLOR_ASSO) ?>

<div class='m-5'>
    <form action="" method="POST">
        <div class="form-group row no-gutters align-items-center">
            <label for="login" class="col-6 col-md-3 col-lg-2 text-right pr-5">Login : </label>
            <input type="text" class="col-6 cold-md-9 col-lg-10 form-control" id="login" name="login" required/>
        </div>
        <div class="form-group row no-gutters align-items-center">
            <label for="password" class="col-6 col-md-3 col-lg-2 text-right pr-5">Password : </label>
            <input type="password" class="col-6 cold-md-9 col-lg-10 form-control" id="password" name="password" required/>
        </div>
        <div class="row no-gutters">
            <input type="submit" value="Valider" class="col btn btn-primary">
        </div>
    </form>
</div>

<?php if($alert !== ""){ 
    echo afficherAlert($alert, ALERT_DANGER);
} 
?>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>

            
      