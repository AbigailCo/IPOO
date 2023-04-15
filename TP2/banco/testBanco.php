<?php
include_once 'classPersona.php';
include_once 'classBanco.php';
include_once 'classMostrador.php';
include_once 'classTramite.php';
/* En un banco existen varios mostradores. Cada mostrador puede atender cierto tipo de trámites y tiene una cola
de clientes, que no puede superar un número determinado para cada cola, de cada cola se conoce el número
actual de personas que hay en ella. Cada cliente concurre al banco para realizar un solo trámite. Un trámite
tiene un horario de creación y un horario de resolución. Implemente los siguientes métodos:
a) Método constructor _ _construct() que recibe como parámetros los valores iniciales para los atributos
de las clases.
b) Los métodos de acceso de cada uno de los atributos de las clases.
c) Redefinir el método _ _toString() para que retorne la información de los atributos de las clases.
d) mostrador–>atiende($unTramite): devuelve true o false indicando si el tramite se puede atender o no
en el mostrador; note que el tipo de trámite correspondiente a unTramite tiene que coincidir con
alguno de los tipos de trámite que atiende el mostrador.
e) banco–>mostradoresQueAtienden($unTramite): retorna la colección de todos los mostradores que
atienden ese trámite.
f) banco–>mejorMostradorPara($unTramite): retorna el mostrador con la cola más corta con espacio
para al menos una persona más y que atienda ese trámite; si ningun mostrador tiene espacio, retorna
null.
g) banco–>atender($unCliente): cuando llega un cliente al banco se lo ubica en el mostrador que atienda
el trámite que el cliente requiere, que tenga espacio y la menor cantidad de clientes esperando; si no
hay lugar en ningún mostrador debe retornar un mensaje que diga al cliente que “será antendido en
cuanto haya lugar en un mostrador” */
$colaClientes = array();
$coleccionMostradores = array();
function CrearCliente()
{
    echo "Nombre: ";
    $nombre = trim(fgets(STDIN));
    echo "Apellido:  ";
    $apellido = trim(fgets(STDIN));
    echo "Numero de documento: ";
    $numDoc = trim(fgets(STDIN));
    $tipoTramite = SolicitudTramite();
    $cliente = new Persona($nombre, $apellido, $numDoc, $tipoTramite);
    return $cliente;
}
function SolicitudTramite (){
    echo "Que tramite quiere hacer:\n";
    $opcionTramite = Opciones();
    switch ($opcionTramite) {
        case '1':
            echo "Usted desea AGREGAR DINERO\n";
            $creacion = 10;
            $resolucion = 13;
            echo "Tramite se puede realizar desde las " . $creacion . ":00 hasta las " . $resolucion. ":00.";
            break;
        case '2':
            echo "Usted desea RETIRAR DINERO\n";
            $creacion = 15;
            $resolucion = 18;
            echo "Tramite se puede realizar desde las " . $creacion . ":00 hasta las " . $resolucion. ":00.";
            break;
        case '3':
            echo "Usted desea ACTUALIZAR INTERES ANUAL\n";
            $creacion = 9;
            $resolucion = 22;
            echo "Tramite se puede realizar desde las " . $creacion . ":00 hasta las " . $resolucion. ":00.";
            break;
        case '4':
            echo "Usted desea VER DETALLES\n";
            $creacion = 7;
            $resolucion = 23;
            echo "Tramite se puede realizar desde las " . $creacion . ":00 hasta las " . $resolucion. ":00.";
            break;

        default:
            echo "Error en elegir una opcion";
            break;
    }
    $tipoTramite = new Tramite($opcionTramite,$creacion, $resolucion);
    return $tipoTramite;
}
/* function CargarCliente ($colaClientes){
    $nuevoCliente = CrearCliente();
    array_push($colaClientes, $nuevoCliente);
    return $colaClientes;
} */
function Opciones (){
    echo "\n1) Agregar dinero.";
    echo "\n2) Retirar dinero.";
    echo "\n3) Actualizar el interes.";
    echo "\n4) Ver detalles.";
    $opcion = trim(fgets(STDIN));
    return $opcion;
}

function CrearMostrador ($colaClientes){
    echo "NUMERO DEL MOSTRADOR: ";
    $numMostrador = trim(fgets(STDIN));
    echo "Tramite que atiede: ";
    $tipoTramite = Opciones();
    echo "\n";
    echo "Limite de clientes: ";
    $limiteCliente = trim(fgets(STDIN));
    $objmostrador = new Mostrador($numMostrador, $tipoTramite, $limiteCliente, $colaClientes);
    return $objmostrador;
}

function CargarMostradores ($coleccionMostradores, $colaClientes)
{
    do {
        echo "Agregar Mostradores? (S/N)";
        $desicion = trim(fgets(STDIN));
        $nuevoMostrador = CrearMostrador($colaClientes);
        array_push($coleccionMostradores, $nuevoMostrador);

    } while ($desicion == "s");
    
    return $coleccionMostradores;
}

function CrearBanco ($colaClientes, $coleccionMostradores){
    echo "BIENVENIDOS AL BANCO!!";
    echo "\nCrear Mostradores->";
    $nuevoMostrador = CargarMostradores($coleccionMostradores, $colaClientes);
    $objBanco = new Banco($nuevoMostrador);
    return $objBanco;
}
$objBanco = CrearBanco($colaClientes, $coleccionMostradores);
$cliente = CrearCliente();


