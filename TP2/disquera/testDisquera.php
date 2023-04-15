<?php

/**Crear un script Test_Disquera que cree un objeto Disquera e invoque a cada uno de los métodos
implementados. */
include_once 'classDisquera.php';
include_once 'classPersona.php';

function CargarDueño()
{
    echo "Nombre: ";
    $nombre = trim(fgets(STDIN));
    echo "Apellido:  ";
    $apellido = trim(fgets(STDIN));
    echo "Tipo: ";
    $tipo = trim(fgets(STDIN));
    echo "Numero de documento: ";
    $numDoc = trim(fgets(STDIN));
    $persona = new Persona($nombre, $apellido, $tipo, $numDoc);
    return $persona;
}
function CrearDisquera()
{
    echo "INFORMACION DEL DUEÑO:  \n";
    $dueño = CargarDueño();
    echo "Hora de apertura: ";
    $hora_desde = trim(fgets(STDIN));
    echo "\nHora de cierre: ";
    $hora_hasta = trim(fgets(STDIN));
    echo "\nDireccion de la disquera: ";
    $direccion = trim(fgets(STDIN));
    $estado = "Abierto";
    $disquera = new Disquera ($hora_desde, $hora_hasta, $estado, $direccion, $dueño);
    return $disquera;
}
$objDis = CrearDisquera();
echo "---------------------------------------";

echo "---------------------------------------";
echo "Hora: ";
$hora = trim(fgets(STDIN));
$objDis -> AbrirDisquera($hora);
$objDis -> CerrarDisquera($hora);
echo $objDis -> __toString();
echo "---------------------------------------";
echo "INGRESE LA HORA QUE NOS DESEA VISITAR: " ;
$hora = trim (fgets(STDIN));

if ($objDis->DentroHorarioAtencion($hora)) {
    echo "Estamos atendiendo.";
} else {
    echo "Ya cerramos.";
}
