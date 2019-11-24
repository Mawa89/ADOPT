<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?= $description?>">
    <title><?= $title?></title>
    <link href="<?= URL ?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= URL ?>public/css/main.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Copse" rel="stylesheet">
    
</head>
<body>
    <div class='container p-0 mt-2 rounded perso_shadow'>
        <!-- Header du site -->
        <header class='bg-dark text-white rounded-top perso_policeTitre'>
            <div class='row align-items-center m-0'>
                <div class='col-2 p-2 text-center'>
                    <a href='?page=accueil'>
                        <img src='<?= URL ?>public/sources/images/Autres/logoNANA2.jpg' class='rounded-circle img-fluid perso_logoSize' alt='logo du site' />
                    </a>
                </div>

                <div class='col-6 col-lg-8 m-0 p-0'>
                    <?php include("views/commons/menu.php") ?>

                </div>
                <div class='col-4 col-lg-2 text-right pt-1 pr-4 perso_ColorRouge'>
                    ADOPT <br /> LEVALLOIS (92300)   </div>
            </div>
        </header>
        <!-- Contenu du site -->
        <div class='border p-1 perso_minCorpSize px-5'>
            <?= $content ?>
        </div>
        <!-- footer du site -->
        <footer class='bg-dark text-center text-white rounded-bottom'>
            <p class='p-2'>&copy; Association Adopt 2018-2019 </p>      
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src='<?= URL ?>public/bootstrap/js/bootstrap.js'> </script>
</body>
</html>