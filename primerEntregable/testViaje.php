<?php
include_once 'Viaje.php';
/**Funcion muestra el menu principal 
 * return int $opcion para seleccionar la opcion
 */
function MenuPrincipal()
{
    echo "\nMenu:  \n
    1) Cargar informacion del viaje.\n
    2) Modificar informacion del viaje.\n
    3) Ver detalles del viaje.\n";
    echo "Ingrese el numero de la opcion para seleccionarla.\n
    Para salir precione ( . )\n";
    $opcion = trim(fgets(STDIN));
    return $opcion;
}


/**Funcion para la opcion 1 crea el viaje y permite agregar pasajeros
 * @param objet $reserva 
 * $reserva es una objeto de clase viaje */
function Opcion1($reserva)
{
    echo "Ingrese el codigo del viaje: \n";
    $codiViaje = trim(fgets(STDIN));
    $reserva->setCodigo($codiViaje); //con el set modificamos los atributos del objeto
    echo "Destino del viaje: \n";
    $destinoViaje = trim(fgets(STDIN));
    $reserva->setDestino($destinoViaje); //con el set modificamos los atributos del objeto
    echo "Cantidad maxima de pasajeros: \n";
    $maximoDePasajeros = trim(fgets(STDIN));
    $reserva->setCantidad($maximoDePasajeros); //con el set modificamos los atributos del objeto
    $cierre = true;
    while ($maximoDePasajeros > 0 && $cierre) { 
        echo "Quiere agregar un pasajero: (S/N) \n";
        $desicion = trim(fgets(STDIN));
            if ($desicion == "s") {
                $reserva = CargarPasajeros($reserva);
                $maximoDePasajeros = $maximoDePasajeros - 1;
            }elseif($desicion == "n") {
                echo "\nGracias! su viaje se cargo con exito";
                $cierre = false;
            }
    }
    if ($maximoDePasajeros == 0) {
        echo "No quedaron mas lugares!";
    }
    return $reserva;
}


/**Funcion para la guardar un pasajero en el atributo coleccionPasajeros de $reserva 
 * @param objet $reserva 
 * $reserva es una objeto de clase viaje */
function CargarPasajeros($reserva)
{
    $nuevoPasajero = CrearPasajero();
    $reserva->CargarPasajero($nuevoPasajero);

    return $reserva;
}
/**Funcion para crear un array pasajero
 * return array $pasajero donde guarda los datos de los pasajeros */
function CrearPasajero()
{
    echo "Nombre de pasajero: \n";
    $nomPasajero = trim(fgets(STDIN));
    echo "\nApellido de pasajero: \n";
    $apePasajero = trim(fgets(STDIN));
    echo "\nNumero de documento de pasajero: \n";
    $numDni = trim(fgets(STDIN));
    $pasajero = [
        "nombre" => $nomPasajero,
        "apellido" => $apePasajero,
        "dni" => $numDni,
    ];
    return $pasajero;
}



function MenuOp2()
{
    echo "MODIFICAR: \n
    1) Destino: \n
    2) Codigo: \n
    3) Cantidad maxima de pasajeros: \n
    4) Coleccion pasajeros: \n";
    $desicion = trim(fgets(STDIN));
    return $desicion;
}

function Opcion2($reserva)
{
    $menu2 = MenuOp2();
    switch ($menu2):
        case '1':
            echo "Destino anterior " . $reserva->getDestino() . ".\n";
            echo "Ingrese el nuevo destino: ";
            $destino = trim(fgets(STDIN));
            $reserva->setDestino($destino);
            echo "\nSu cambio se guardo con exito";
            break;
        case "2":
            echo "Codigo anterior " . $reserva->getCodigo() . ".\n";
            echo "Ingrese el nuevo codigo: ";
            $codigo = trim(fgets(STDIN));
            $reserva->setDestino($codigo);
            echo "\nSu cambio se guardo con exito";

            break;
        case "3":
            echo "Cantidad maxima anterio " . $reserva->getCantidad() . ".\n";
            echo "Ingrese la nueva cantidad: ";
            $cantidad = trim(fgets(STDIN));
            $reserva->setCantidad($cantidad);
            echo "\nSu cambio se guardo con exito";

            break;
        case "4":
            echo "Ingrese el DNI del pasajero: ";
            $dniModificar = trim(fgets(STDIN));
            $indice = $reserva->BuscarDni($dniModificar);
            if (is_numeric($indice)){
                $nuevoPasajero = CrearPasajero();
                $reserva->ModificarPasajero($indice, $nuevoPasajero);
            }
            break;
        default:
            echo "\n No ingreso una opcion correcta.";
    endswitch;
    return $reserva;
}

//principal 
//Declaracion variables necesarias
$codiViaje = 001;
$destino = "nqn";
$maximoDePasajeros = 50;
$coleccionPasajeros = array();
$reserva = new Viaje($codiViaje, $destino, $maximoDePasajeros, $coleccionPasajeros);


do {
    $opcion = MenuPrincipal();
    switch ($opcion) {
        case '1':
            $reserva = Opcion1($reserva);

            break;
        case '2':
            $reserva = Opcion2($reserva);
            break;
        case '3':
            echo $reserva;
        break;
    }
} while ($opcion != ".");