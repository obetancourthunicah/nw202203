<?php

function analizarTexto ($texto) {
    $textoAProcesar = strtolower($texto);
    $textoAProcesar = str_replace(
        array("(",")",".",",","-",":", "!", "?", "¿", "¡", ";"),
        "",
        $textoAProcesar
    );
    $palabras = explode(" ", $textoAProcesar);
    $palabrasFreq = array();
    foreach($palabras as $palabra) {
        if(isset($palabrasFreq[$palabra])){
            $palabrasFreq[$palabra] ++;
        } else {
            $palabrasFreq[$palabra] = 1;
        }
    }
    arsort($palabrasFreq);
    print_r($palabrasFreq);
    
}
?>
