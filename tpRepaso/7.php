<?php
/**Dado 2 arreglos A y B, de N y M elementos respectivamente. Construir un algoritmo que retorne un
arreglocon los elementos de A mas los elementos de B. */

function arrayUnidos ($arrayA, $arrayB) {
    $arrayFinal = array_merge($arrayA, $arrayB);
    return $arrayFinal;
}

//principal
$arregloA = [3, 95, 96, 66];
$arregloB = [88,0, 11, 475];
$arregloFinal = arrayUnidos($arregloA, $arregloB);
print_r($arregloFinal);
