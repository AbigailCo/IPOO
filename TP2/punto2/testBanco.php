<?php
/* 14.g. Crear un script Test_CuentaBancaria que cree un objeto CuentaBancaria e invoque a cada 
uno de los métodos implementados. */
include_once 'banco.php';

echo "Numero de cuenta: ";
$numCuenta = trim(fgets(STDIN));
echo "CLIENTE\n";
$persona = CargarCliente();
echo "Saldo actual: ";
$saldoActual = trim(fgets(STDIN));
echo "Interes anual: ";
$interesAnual = trim(fgets(STDIN));

function CargarCliente (){
    echo "Nombre: ";
    $nombre = trim(fgets(STDIN));
    echo "Apellido:  ";
    $apellido = trim(fgets(STDIN));
    echo "Tipo: ";
    $tipo = trim(fgets(STDIN));
    echo "Numero de documento: ";
    $numDoc = trim(fgets(STDIN));
    $persona = new Persona ($nombre, $apellido, $tipo, $numDoc);
    return $persona;
}

$clienteBanco = new CuentaBancaria($numCuenta, $persona, $saldoActual, $interesAnual);
echo $clienteBanco-> __toString();

function Opciones (){
    echo "\n1) Agregar dinero.";
    echo "\n2) Retirar dinero.";
    echo "\n3) Actualizar el interes.";
    echo "\n4) Ver detalles.";
    $opcion = trim(fgets(STDIN));
    return $opcion;
}
$opcion = Opciones();
switch ($opcion) {
    case '1':
        echo "Ingrese el importe a agregar: ";
        $cantidad = trim (fgets(STDIN));
        $clienteBanco -> Depositar($cantidad);
        echo $clienteBanco -> __toString();
        break;
    case '2':
        echo "Ingrese el importe que desea retirar: ";
        $cantidad = trim (fgets(STDIN));
        $clienteBanco -> Retirar($cantidad);
       echo $clienteBanco -> __toString();
        break;
    case '3':
        $clienteBanco -> ActualizarSaldo();
        echo $clienteBanco -> __toString();
        break;
    case '4':
        echo $clienteBanco -> __toString();
        break;
    default:
        echo "Gracias!";
        break;
}

