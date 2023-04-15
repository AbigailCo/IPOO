<?php
/**Dado un texto terminado en / y un caracter, determinar cuántas veces aparece ese caracter en la cadena */
function cadenaDeCaracteres ($cade){
    $i =0;
    $cantidad =0;
    while ($i< strlen ($cade) && $cade[$i] != "/"){
        $i ++;
    }
    $caracter = $cade [$i+1];
    for ($i=0; $i< strlen ($cade); $i++){
        if ($cade[$i] == $caracter){
            $cantidad = $cantidad +1;
        }
    }
    return $cantidad;
}

//principal 
echo "Ingrese la cadena de caracteres, al finalizar agrege un punto. \n";
$cadena = trim(fgets(STDIN));
$canCarac= cadenaDeCaracteres($cadena);
echo $canCarac;