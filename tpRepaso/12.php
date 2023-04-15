<?php
/** Dada una cadena retornar su longitud sin utilizar la función count de PHP */
echo "Escriba una cadena de caracteres ";
$cadena = trim(fgets(STDIN));
$totalCarac = strlen ($cadena);
echo "total de caracteres ". $totalCarac;