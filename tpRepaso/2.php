<?php
//Dado un número N retornar verdadero si el número es par y falso en caso contrario.
// int $num 
// bool $respuesta
$num = 0;
$respuesta = false;
echo "Ingrese el numero: ";
$num = trim(fgets(STDIN));

if ($num % 2 == 0) {
    $respuesta = true;
}else{
    echo "El numero es impar.";
}

if ($respuesta) {
    echo "El numero ". $num . " es par.";
}