<?php 
    const COLOR_ASSO = "perso_ColorRoseMenu";
    const COLOR_PENSIONNAIRE = "perso_ColorOrangeMenu";
    const COLOR_ACTUS = "perso_ColorVertMenu";
    const COLOR_CONSEILS = "perso_ColorOrangeMenu";
    const COLOR_CONTACT = "perso_ColorOrangeMenu";

    const ID_STATUT_A_L_ADOPTION = 1;
    const ID_STATUT_ADOPTE = 2;
    const ID_STATUT_FALD = 3;
    const ID_STATUT_MORT = 4;

    const TYPE_NEWS = "News";
    const TYPE_ACTIONS = "Actions";
    const TYPE_EVENTS = "Events";

    define("URL",str_replace("index.php","", (isset($_SERVER["HTTPS"])? "https" : "http"). "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
?>