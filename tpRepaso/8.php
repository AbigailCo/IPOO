<?php
/**Dado 2 arreglos A y B, de N y M elementos respectivamente. Construir un algoritmo que retorne un
arreglo con los elementos de A que no estan en B. */
function compararArray ($arrayA, $arrayB) {
    $arrayFinal = array_diff($arrayA, $arrayB);
    return $arrayFinal;
}

//principal
$arregloA = [3, 95, 96, 66];
$arregloB = [66,0, 95, 475];
$arregloFinal = compararArray($arregloA, $arregloB);
print_r($arregloFinal);
