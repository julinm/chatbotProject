<?php

function cleanStr($string)
{
    $string = strtolower($string);

    if(strstr($string, '!')){
        $string = str_replace('!', '', $string);
    }
    if(strstr($string, '¡')){
        $string = str_replace('¡', '', $string);
    }
    if(strstr($string, '?')){
        $string = str_replace('?', '', $string);
    }
    if(strstr($string, '¿')){
        $string = str_replace('¿', '', $string);
    }
    if(strstr($string, '.')){
        $string = str_replace('.', '', $string);
    }

    return $string;
}

?>