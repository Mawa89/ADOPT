<?php

class Securite {
    public static function secureHTML($string){
        return htmlentities($string);
    }
}