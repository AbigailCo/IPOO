<?php
include_once 'classViaje.php';
include_once 'classEmpresa.php';
include_once 'classResponsable.php';
include_once 'classTerminal.php';
/* Implementar un script TestTermial en el cual: */

/* 2. A cada empresa se le incorporan 2 instancias de la clase viaje. */
//creamos los responsables
$resLaAngostura = new Responsable("Carlos", "Lopez", 11411145, "Santa Fe 221", "carlosLopes@gmail.com", "337744");
$resVillaT = new Responsable("Maria", "Mar", 17979860, "America 223", "MariaItati@gmail.com", "37724499");
$resSanCarlos= new Responsable("Paz", "Caos", 41738816, "Las Heras 888", "pazcaos@gmail.com", "6669955");

$villaTraful = new Viaje("Villa Traful", "22:00", "00:00", 207, 3000, "05/08/23", 50, 50, $resVillaT);
$sanCarlos = new Viaje("San Carlos", "16:00", "00:00", 212, 1000, "05/05/23", 100, 50, $resSanCarlos);
$laAngostura = new Viaje("Villa la Angostura", "09:00", "14:00", 204, 4000, "25/05/23", 500, 200, $resLaAngostura);

$coleccionviaBariloche = array (
    0 => $villaTraful,
    1 => $sanCarlos,
    2=> $laAngostura,
);
$coleccionflechaBus = array (
    0=>$villaTraful,
    1 =>$laAngostura,
);


/* 1. Se crea una colección con un mínimo de 2 empresas, ejemplo Flecha Bus y Via Bariloche. */
$viaBariloche = new Empresa(999, "Via Bariloche", $coleccionviaBariloche);
$flechaBus = new Empresa(555, "Flecha Bus", $coleccionflechaBus);

$coleccionEmpresas = array(
    0 => $viaBariloche,
    1=> $flechaBus,
);

/* 3. Se crea un objeto Terminal con la colección de empresas creadas en el pnto1. */
$terminalNeuquen = new Terminal("22-5", "Nordel 000220", $coleccionEmpresas);

/* 4. Invocar y visualizar el resultado del método ventaAutomatica con cantidad de asientos 3 y como destino alguno de los destinos de viaje creados en 2. */
echo "\n" .$terminalNeuquen->ventaAutomatica(3, "25/05/23", "Villa la Angostura", $viaBariloche);
echo "--------------------";
echo "\n";
/* 5. Invocar y visualizar el resultado del método empresaMayorRecaudacion. */
$mayorMonto=$terminalNeuquen->EmpresaMayorRecaudacion();

echo $mayorMonto;

/* 6. Invocar y visualizar el resultado del método responsableViaje correspondiente a uno de los
números de viajes del punto 2.*/
echo "--------------------";
echo "\n";
echo "\n".$terminalNeuquen->responsableViaje(207);