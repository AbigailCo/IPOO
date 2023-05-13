<?php
include_once 'viaje.php';
include_once 'pasajero.php';
include_once 'pasajeroEstandar.php';
include_once 'pasajeroVip.php';
include_once 'pasajeroEspecial.php';
include_once 'responsableV.php';

/**Funcion muestra el menu principal 
 * return int $opcion para seleccionar la opcion
 */
function MenuPrincipal()
{
    echo "\nMenu:  \n
    1) Cargar informacion del viaje.\n
    2) Modificar informacion del viaje.\n
    3) Ver detalles del viaje.\n
    4) Vender un pasaje.\n";

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
    $reserva->setCantMaxPasajeros($maximoDePasajeros); //con el set modificamos los atributos del objeto
    echo "Importe del viaje: ";
    $importe = trim(fgets(STDIN));
    $reserva ->setImporte($importe);
    echo "Responsable del viaje: \n";
    echo "Ingrese el numero de responsable: \n";
    $numResponsable = trim(fgets(STDIN));
    $respuesta = $reserva->BuscarResponsable($numResponsable);
    if ($respuesta) {
        echo "\nResponsable ya registrado.";
    } else {
        $reserva = CargarResponsable($reserva, $numResponsable);
    }
    $hayLugar = $reserva->hayPasajesDisponibles();
    $cierre = true;
    while ($hayLugar && $cierre) {
        echo "\nQuiere agregar un pasajero: (S/N) \n";
        $desicion = trim(fgets(STDIN));
        if ($desicion == "s") {
            echo "Ingrese el DNI: ";
            $numDni = trim(fgets(STDIN));
            $respuesta = $reserva->BuscarDni($numDni);
            if (!is_numeric($respuesta)) {
                $reserva = CargarPasajeros($reserva, $numDni);
                
                $maximoDePasajeros = $maximoDePasajeros - 1;
            } else {
                echo "Pasajero ya cargado.\n";
            }
        } elseif ($desicion == "n") {
            echo "\nGracias! su viaje se cargo con exito";
            $cierre = false;
        }
    }
    if (!$hayLugar) {
        echo "No quedaron mas lugares!";
    }
    return $reserva;
}

function CrearResponsable($numResponsable)
{

    echo "\nNumero de Licencia: ";
    $numLicencia = trim(fgets(STDIN));
    echo "\nNombre de Responsable: ";
    $nomResponsable = trim(fgets(STDIN));
    echo "\nApellido Responsable: ";
    $apeResponsable = trim(fgets(STDIN));
    $responsable = new ResponsableV($numResponsable, $numLicencia, $nomResponsable, $apeResponsable);
    return $responsable;
}
function CargarResponsable($reserva, $numResponsable)
{
    $nuevoResponsable = CrearResponsable($numResponsable);
    $reserva->CargarResponsable($nuevoResponsable);

    return $reserva;
}
/**Funcion para la guardar un pasajero en el atributo coleccionPasajeros de $reserva 
 * @param objet $reserva 
 * $reserva es una objeto de clase viaje */
function CargarPasajeros($reserva, $numDni)
{   
    $coleccionPasajeros= $reserva-> getColeccionPasajeros();
    $numAsiento= count($coleccionPasajeros);
    $numTicket = $numAsiento * 100;
    $nuevoPasajero = CrearPasajero($numDni, $numAsiento, $numTicket);
    $reserva->CargarPasajero($nuevoPasajero);
    $importe = $reserva->venderPasaje($nuevoPasajero);
    echo "\nPasaje vendido: " . $nuevoPasajero-> __toString() . 
    "\nPrecio final con tasas y servicios: " . $importe;

    return $reserva;
}
/**Funcion para crear un array pasajero
 * return array $pasajero donde guarda los datos de los pasajeros */
function CrearPasajero($numDni, $numAsiento, $numTicket)
{
    echo "Nombre de pasajero: \n";
    $nomPasajero = trim(fgets(STDIN));
    echo "\nApellido de pasajero: \n";
    $apePasajero = trim(fgets(STDIN));
    $pasajero = eleccionPasajero($nomPasajero, $apePasajero, $numDni, $numAsiento, $numTicket);
    return $pasajero;
}
function crearVip ($nomPasajero, $apePasajero, $numDni, $numAsiento, $numTicket) {
    $numFrecuente = $numTicket * 100;
    echo "\nCuantas millas adquiere: ";
    $cantMillas = trim(fgets(STDIN));
    $pasajero = new PasajeroVip($nomPasajero, $apePasajero, $numDni, $numAsiento, $numTicket,$numFrecuente, $cantMillas);
    return $pasajero;
}
function crearEspecial ($nomPasajero, $apePasajero, $numDni, $numAsiento, $numTicket) {
    echo "Usa silla de ruedas: (s/n)";
    $silla = trim(fgets(STDIN));
    $usaSilla= false;
    if ($silla == "s"){
        $usaSilla= true;
    };
    echo "Necesita asistencia para embarque o desembarque: ";
    $asistencia = trim(fgets(STDIN));
    $usaAsistencia= false;
    if ($asistencia == "s"){
        $usaAsistencia= true;
    };
    echo "Comida especial: ";
    $comida = trim(fgets(STDIN));
    $usaComida= false;
    if ($comida == "s"){
        $usaComida= true;
    };
    $pasajero = new PasajeroEspecial($nomPasajero, $apePasajero,$numDni, $numAsiento, $numTicket, $usaSilla, $usaComida, $usaAsistencia);
    return $pasajero;
}
function crearEstandar ($nomPasajero, $apePasajero, $numDni, $numAsiento, $numTicket) {
    $pasajero = new PasajeroEstandar($nomPasajero, $apePasajero, $numDni, $numAsiento, $numTicket);
    return $pasajero;
}
function eleccionPasajero($nomPasajero, $apePasajero, $numDni, $numAsiento, $numTicket){
    echo "Es pasajero: \n
    1) VIP\n
    2) ESPECIAL\n
    3) ESTANDAR\n
    Ingrese la opcion deseada. ";
    $opcion = trim(fgets(STDIN));
    switch ($opcion) {
        case '1':
            $pasajero = crearVip($nomPasajero, $apePasajero, $numDni, $numAsiento, $numTicket);
            break;
        case '2':
            $pasajero = crearEspecial($nomPasajero, $apePasajero, $numDni, $numAsiento, $numTicket);
            break;
        case '3':
            $pasajero = crearEstandar($nomPasajero, $apePasajero, $numDni, $numAsiento, $numTicket);
            break;        
        default:
            echo "Error no ingreso una opcion correcta";
            break;
    }
    return $pasajero;
}

function MenuOp2()
{
    echo "MODIFICAR: \n
    1) Destino: \n
    2) Codigo: \n
    3) Cantidad maxima de pasajeros: \n
    4) Coleccion pasajeros: \n
    5) Responsable del viaje: \n";
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
            $reserva->setCodigo($codigo);
            echo "\nSu cambio se guardo con exito";

            break;
        case "3":
            echo "Cantidad maxima anterio " . $reserva->getCantMaxPasajeros() . ".\n";
            echo "Ingrese la nueva cantidad: ";
            $cantidad = trim(fgets(STDIN));
            $reserva->setCantMaxPasajeros($cantidad);
            echo "\nSu cambio se guardo con exito";

            break;
        case "4":
            echo "Ingrese el DNI del pasajero: ";
            $dniModificar = trim(fgets(STDIN));
            $indice = $reserva->BuscarDni($dniModificar);
            
            if (is_numeric($indice)) {
                echo $reserva->getcoleccionPasajeros()[$indice];
                echo "\n\nIngrese el nuevo DNI: ";
                $dniModificar = trim(fgets(STDIN));
                $nuevoPasajero = CrearPasajero($dniModificar);
                $reserva->ModificarPasajero($indice, $nuevoPasajero);
            } else {
                echo "Error el dni ingresado no esta cargado.\n";
            }
            break;
        case '5':
            echo "MODIFICAR RESPONSABLE\n";
            echo $reserva->getResponsableV();
            echo "\nIngrese el numero de el nuevo responsable\n";
            $numResponsable = trim(fgets(STDIN));
            $respuesta = $reserva->BuscarResponsable($numResponsable);
            if ($respuesta) {
                echo "\nResponsable ya registrado.";
            } else {
                $reserva = CargarResponsable($reserva, $numResponsable);
                echo "Responsable fue cambiado con exito!\n";
                $reserva->getResponsableV();
            }
           

        default:
            echo "\n No ingreso una opcion correcta.";
    endswitch;
    return $reserva;
}
function Opcion4($reserva){
    $hayLugar = $reserva->hayPasajesDisponibles();
    if($hayLugar){
        echo "\nVENDER UN PASAJE\n";
        echo "Ingrese el DNI: ";
            $numDni = trim(fgets(STDIN));
            $respuesta = $reserva->BuscarDni($numDni);
            if (!is_numeric($respuesta)) {
                $reserva = CargarPasajeros($reserva, $numDni);
            } else {
                echo "Pasajero ya cargado.\n";
            }
    }else {
            echo"No hay mas lugares disponibles";
    }
    return $reserva;
}

//principal 
//Declaracion variables necesarias
$codiViaje = 001;
$destino = "nqn";
$maximoDePasajeros = 50;
$pasajero = new PasajeroEstandar("mati", "inf", 999, 0, 0);
$coleccionPasajeros = array();
$coleccionPasajeros[0] = $pasajero;
$responsableV = new ResponsableV("123", "444", "Abigail", "Corrales");
$reserva = new Viaje($codiViaje, $destino, $maximoDePasajeros, $coleccionPasajeros, $responsableV, 2000);


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
            echo $reserva->__toString();
            break;
        case '4':
            $reserva = Opcion4 ($reserva);
            break;
    }
} while ($opcion != ".");
