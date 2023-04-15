<?php
//Dado dos números N y M retornar verdadero si el número N es divisible por M y falso en caso contrario.


/**modulo 
 * @param int $num
 * @param int $mul
 * @return boolean 
 */
function esDivisible ($num, $mul) {
    // boolean $esDiv

    if ($num % $mul == 0) {
        $esDiv = true;
    }else{
        $esDiv = false;
    }
    
    return $esDiv;
}
// int $n $m
// bool $respuesta
$n = 0;
$m = 0;

echo "Ingrese un nuemero: ";
$n = trim(fgets(STDIN));

echo "Ingrese un nuemero para saber si es devisible por el primero: ";
$m = trim(fgets(STDIN));
$respuesta = esDivisible($n,$m);

if ($respuesta){
    echo $n . " es multiplo de " . $m;
}else{
    echo $n . " no es multiplo de " . $m;
}
