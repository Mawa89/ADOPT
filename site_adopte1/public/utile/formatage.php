<?php 

function styleTitreNiveau1($text, $color){
    $txt = "<h1 class='text-center my-3 ".$color." perso_policeTitre perso_textShadow'>";
    $txt .= $text;
    $txt .= "</h1>";
    return $txt;
}

function styleTitreNiveau2($text, $color){
    $txt = "<h2 class='text-center my-3 ".$color." perso_policeTitre perso_textShadow'>";
    $txt .= $text;
    $txt .= "</h2>";
    return $txt;
}

function styleTitreNiveau3($text, $color){
    $txt = "<h2 class='my-3 ".$color." perso_policeTitre perso_textShadow perso_size26'>";
    $txt .= $text;
    $txt .= "</h2>";
    return $txt;
}

function styleTitrePost($text){
    $txt = "<h2 class='my-3 perso_policeTitre perso_textShadow border-bottom border-dark'>";
    $txt .= $text;
    $txt .= "</h2>";
    return $txt;
}

function affichageCoupe($str,$taille){
    $desc = "";
    if(strlen($str) >$taille/2){
        if(strpos($str, '<br />', ($taille/2)) < $taille){
            $desc = substr($str, 0, strpos($str, '<br />', ($taille/2)));
        } else if(strpos($str, '.', ($taille/2)) < $taille){
            $desc = substr($str, 0, strpos($str, '.', ($taille/2)));
        } else if(strpos($str, '<br />', 0) <= ($taille/2)){
            $desc = substr($str, 0, strpos($str, '<br />', 0));
        } else if(strpos($str, '.', 0) <= ($taille/2)){
            $desc = substr($str, 0, strpos($str, '.', 0));
        } else {
            $desc = substr($str, 0, strpos($str, ' ', ($taille/3)));
        }
    } else {
        $desc = $str;
    }
    $desc .= "<b class='text-primary'>[...]</b>";
    return $desc;
}
?>