<?php
/* Implementar un script TestTerminal en el cual:
1. Se crea una colección con un mínimo de 2 empresas, ejemplo Flecha Bus y Via Bariloche.
2. A cada empresa se le incorporan 2 instancias de la clase viaje Nacionales y 3 instancias 
de la claseViaje Internacionales.
3. Se crea un objeto Terminal con la colección de empresas creadas en el punto 1.
4. Invocar y visualizar el resultado obtenido de invocar al método darViajeMenorValor() 
a partir de la instancia Terminal creada en el punto 3. */
include_once 'responsable.php';
include_once 'viaje.php';
include_once 'viajeNacion.php';
include_once 'viajesInternacion.php';
include_once 'empresa.php';
include_once 'terminal.php';

$objResponsable= new Responsable("Abigail", 41738816, "Av Argentina 200", "Corrales", "abigail@gmail.com", 3772449944);

$nac1 = new ViajesNacionales("Ruta 40", "20:00", "8:00", 001, 5000, "02/8/2023", 50, 50, $objResponsable, 10);
$nac2= new ViajesNacionales("Corrientes", "17:00", "22:00", 055, 60000, "05/08/1999", 100, 100, $objResponsable, 10);

$inter1= new ViajesInternacionales("Brasil", "22:00", "07:00", 003, 50000, "22/07/2023", 200, 200, $objResponsable, true, 45 );
$inter2= new ViajesInternacionales("Epaña", "19:00", "05:00",005, 70000, "14/10/2023", 50, 50, $objResponsable, false, 45);
$inter3= new ViajesInternacionales("Colombia", "16:00", "20:00", 144, 1000, "14/10/2023", 50, 50, $objResponsable, false, 45);

$coleViajesFlecha= array($nac1, $inter1, $inter2);
$coleViaBari= array ($nac2, $inter1, $inter2, $inter3);

$flechaBus = new Empresa("fle-999", "Flecha Bus", $coleViajesFlecha);
$viaBariloche = new Empresa("via-222", "Via Bariloche", $coleViaBari);

$coleEmpresaNeu = array($flechaBus, $viaBariloche);

$terminalNeuquen = new Terminal("Neu-001", "Aconcagua 2000", $coleEmpresaNeu);

/* $viajesMenorPrecio = $terminalNeuquen->darViajeMenorValor();
echo $viajesMenorPrecio; */


$viajesBaratos = $terminalNeuquen->darViajesMenorValor();
for ($i = 0; $i < count($viajesBaratos); $i++) {
    $viajeMostrar = $viajesBaratos[$i];
    $viajeMostrar -> __toString();
}


