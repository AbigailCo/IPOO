<?php
/**Dado un número que se corresponde a un año calendario, retornar un arreglo con todos los años bisiestos
menores al año ingresado. */

function bisiestosMenores ($año) {
    // array $añosMenores
    
    for ($i = 0; $i < $año; $i++) {
        if ($año % 4 == 0 || $año % 400 == 0) {
            $añosMenores [$i] = $año;
            $año = $año - 4;
        }elseif ($año % 4 != 0 || $año % 400 != 0) {
            $año = $año - 1;
        }
        
    }
    return $añosMenores;
}

//Principal array $añoPrin
echo "Ingrese el año: \n";
$añoPrin = trim(fgets(STDIN));
$arregloPrin = bisiestosMenores($añoPrin);
print_r($arregloPrin);
