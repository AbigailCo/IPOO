<?php


include_once 'cliente.php';
include_once 'moto.php';
include_once 'venta.php';
include_once 'empresa.php';

/* Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2. */
$objCliente1 = new Cliente ("Abigail", "Corrales", false, "DNI", 41738816);
$objCliente2 = new Cliente ("Isabel", "Gutierrez", true, "DNI", 17979860);
/* Cree 3 objetos Motos con la  información visualizada en la tabla: código, costo, año fabricación, 
descripción, porcentaje incremento anual, activo */
$objMoto1= new Moto(11, 2230000, 2022 ,"Benelli Imperiale 400", 85, true);
$objMoto2= new Moto(12, 584000, 2021,"Zanella Zr 150 Ohc",70, true);
$objMoto3= new Moto (13, 999900,2023, "Zanella Patagonian Eagle 250", 55,false);
/* Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, 
dirección= “Av Argenetina 123”,  colección de motos= [$obMoto1, $obMoto2, $obMoto3] , 
colección de clientes = [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[]. */
$coleccionDeMotos = array (
    0=> $objMoto1,
    1=> $objMoto2,
    2=> $objMoto3,
);
$coleccionDeClientes = array (
    0=> $objCliente1,
    1=> $objCliente2,
);
$ventasRealizadas = array ();
$empresa = new Empresa("Alta Gama", "Av Argenetina 123", $coleccionDeClientes, $coleccionDeMotos, $ventasRealizadas);
echo "\n----------\n";
echo $empresa->retornarMoto(11);
/* Invocar al método  registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el $objCliente 
es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) 
y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido. */
$coleccionCodigosMotos1 = array(
    0=> 11,
    1=> 12,
    2=> 13,
);
echo $empresa->registrarVenta($coleccionCodigosMotos1, $objCliente2);
echo "\n----------\n";
/* Invocar al método  registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente 
es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la 
colección de códigos de motos es la siguiente [0].  Visualizar el resultado obtenido. */
$coleccionCodigosMotos2 = array(
    0=> 0,
);

echo $empresa->registrarVenta($coleccionCodigosMotos2, $objCliente2);
echo "\n----------\n";
/* Invocar al método  registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el 
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) 
y la colección de códigos de motos es la siguiente [2].  Visualizar el resultado obtenido. */

$coleccionCodigosMotos3 = array(
    0=> 2,
);
echo $empresa->registrarVenta($coleccionCodigosMotos3, $objCliente2);
echo "\n----------\n";
/* Invocar al método retornarVentasXCliente($tipo,$numDoc)  donde el tipo y número de documento 
se corresponden con el tipo y número de documento del $objCliente1. */
$venta1= $empresa -> retornarVentasXCliente("DNI", 41738816);
if (count($venta1)>=0){
    print_r($venta1);
}else{
    echo "\n No hay ventas para este cliente";
}
echo "\n----------\n";
/* Invocar al método retornarVentasXCliente($tipo,$numDoc)  donde el tipo y número de documento 
se corresponden con  el tipo y número de documento del $objCliente2 */
$venta2 = $empresa -> retornarVentasXCliente("DNI", 17979860);
if (count($venta2)>=0){
    print_r($venta2);
}else{
    echo "\n No hay ventas para este cliente";
}
echo "\n----------\n";
echo $empresa;









