<?php
/**Dada un arreglo de números enteros, determinar los valores máximo y mínimo, y las posiciones en que éstos se
encontraban en el arreglo
*/
//arreglo $lista int $i $max $min
$max = 0;
$min = 1000000000;
$posicionMax= 0;
$posicionMin =0;

$lista = [3,5,8,11,55,7,55,8,0,54,48];

for ($i = 0; $i < count ($lista); $i++){
    if ($lista[$i] > $max){
        $max = $lista[$i];
        $posicionMax = $i + 1;
    }
    if ($lista[$i] < $min){
        $min = $lista[$i];
        $posicionMin = $i+1;
    }
}

echo "\n Numero max del arreglo: " . $max . " en la pasicion " . $posicionMax;
echo "\n Numero min del arreglo: " . $min . " en la pasicion " . $posicionMin;