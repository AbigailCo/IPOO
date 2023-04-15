<?php
/** Dada una cadena de caracteres terminada en punto retornar la cantidad de letras que contiene la cadena. */
function cadenaDeCaracteres ($cade){
    $i =0;
    $cantidad =0;
    while ($i< strlen ($cade) && $cade[$i] != "."){
        $cantidad = $cantidad +1;
        $i ++;
    }
    return $cantidad;
}

//principal 
echo "Ingrese la cadena de caracteres, al finalizar agrege un punto. \n";
$cadena = trim(fgets(STDIN));
$canCarac= cadenaDeCaracteres($cadena);
echo $canCarac;
