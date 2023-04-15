<?php
include_once 'punt1.php';
echo "Nombre: ";
$nombre = trim(fgets(STDIN));
echo "Apellido:  ";
$apellido = trim(fgets(STDIN));
echo "Tipo: ";
$tipo = trim(fgets(STDIN));
echo "Numero de documento: ";
$numDoc = trim(fgets(STDIN));
$persona = new Persona ($nombre, $apellido, $tipo, $numDoc);
echo $persona -> __toString();
