<?php
/* En la clase Empresa:
Se registra la siguiente información: denominación, dirección, la coleccionClientes, 
colección de coleccionMotos y la colección de coleccionVentas$coleccionVentas realizadas.  */

class Empresa
{
    private $denominacion;
    private $direccion;
    private $coleccionClientes;
    private $coleccionMotos;
    private $coleccionVentas;
    /* Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.  */
    public function __construct($denominacion, $direccion, $coleccionClientes, $coleccionMotos, $coleccionVentas)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->coleccionClientes = $coleccionClientes;
        $this->coleccionMotos = $coleccionMotos;
        $this->coleccionVentas = $coleccionVentas;
    }
    /* Los métodos de acceso para  cada una de las variables instancias de la clase. */
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getColeccionClientes()
    {
        return $this->coleccionClientes;
    }

    public function setColeccionClientes($coleccionClientes)
    {
        $this->coleccionClientes = $coleccionClientes;
    }

    public function getColeccionMotos()
    {
        return $this->coleccionMotos;
    }

    public function setColeccionMotos($coleccionMotos)
    {
        $this->coleccionMotos = $coleccionMotos;
    }

    public function getColeccionVentas()
    {
        return $this->coleccionVentas;
    }

    public function setColeccionVentas($coleccionVentas)
    {
        $this->coleccionVentas = $coleccionVentas;
    }
    /* Redefinir el método _toString  para que retorne la información de los atributos de la clase. */
    public function __toString()
    {
        $string =  "\nEMPRESA\n Denominación:" . $this->getDenominacion() . "\nDirección:" . $this->getDireccion() .
            $this->descripcionDeColecciones();
        return $string;
    }

    public function descripcionDeColecciones()
    {
        $string = "";
        $coleccionClientes = $this->getColeccionClientes();
        for ($i = 0; $i < count($coleccionClientes); $i++) {
            $datosCliente = $coleccionClientes[$i];
            $string .= "\nCliente nº " . $i + 1 . "\n" . $datosCliente->__toString() . "\n";
        }
        $coleccionMotos = $this->getColeccionMotos();
        for ($i = 0; $i < count($coleccionMotos); $i++) {
            $datosMotos = $coleccionMotos[$i];
            $string .= "\nMoto nº " . $i + 1 . "\n" . $datosMotos->__toString() . "\n";
        }
        $coleccionVentas = $this->getColeccionVentas();
        for ($i = 0; $i < count($coleccionVentas); $i++) {
            $datosVenta = $coleccionVentas[$i];
            $string .= "\nVenta nº " . $i + 1 . "\n" . $datosVenta->__toString() . "\n";
        }
        return $string;
    }

    /* Implementar el método retornarMoto($codigoMoto) que recorre la colección de coleccionMotos de la Empresa y 
    retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.  */

    public function retornarMoto($codigoMoto)
    {

        $coleccionMotos = $this->getcoleccionMotos();
        $motoMostrar = null;
        $i = 0;
        $encontrado = false;
        while ($i < count($coleccionMotos) && !$encontrado) {

            $motoEvaluar = $coleccionMotos[$i];
            $codigoMotoEvaluar = $motoEvaluar->getCodigo();
            if ($codigoMotoEvaluar == $codigoMoto) {
                $motoMostrar = $motoEvaluar;
                $encontrado = true;
            }
            $i++;
        }
        return $motoMostrar;
    }

    /* Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por parámetro una 
    colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección se busca el objeto 
    moto correspondiente al código y  se incorpora a la colección de motos de la instancia Venta que debe ser 
    creada. Recordar que no todos los clientes ni todas las motos, están disponibles para registrar una venta 
    en un momento determinado.El método debe setear los variables instancias de venta que corresponda y retornar 
    el importe final de la venta. */

    public function registrarVenta($colCodigosMoto, $objCliente)
    {
        $precio = 0;
        $coleccionVentas = $this->getColeccionVentas();
        $clienteBaja = $objCliente->getBaja();

        if (!$clienteBaja) {
            $nuevaVenta = new Venta(count($coleccionVentas), "05/08/2023", $objCliente, array(), 0);
            for ($i = 0; $i < count($colCodigosMoto); $i++) {
                $codigo = $colCodigosMoto[$i];
                $motoAVender = $this->retornarMoto($codigo);

                if ($motoAVender != null) {
                    $nuevaVenta->incorporarMoto($motoAVender);
                }
            }
            $precio = $nuevaVenta->getPrecioFinal();
            if ($precio > 0) {
                array_push($coleccionVentas, $nuevaVenta);
                $this->setColeccionVentas($coleccionVentas);
                $nuevaVenta->__toString();
            }
        }
        return $precio;
    }


    /* Implementar  el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y número de 
    documento de un Cliente y retorna una colección  con las ventas realizadas al cliente. */

    public function retornarVentasXCliente($tipo, $numDoc)
    {

        $coleccionVentas = $this->getColeccionVentas();
        $coleccionRetorno = array();
        for ($i = 0; $i < count($coleccionVentas); $i++) {
            $ventaEvaluar = $coleccionVentas[$i];
            echo $ventaEvaluar;
            $clienteEvaluar = $ventaEvaluar->getCliente();
            $tipoEvaluar = $clienteEvaluar->getTipoDoc();
            $dniEvaluar = $clienteEvaluar->getNumDoc();
            if ($tipoEvaluar == $tipo && $dniEvaluar == $numDoc) {
                array_push($coleccionRetorno, $ventaEvaluar);
            }
        }
        return $coleccionRetorno;
    }
}
