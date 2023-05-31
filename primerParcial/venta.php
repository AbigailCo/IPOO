<?php
/* En la clase Venta:
Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de Motos y el precio final. */

class Venta {
    private $numero;
    private $fecha;
    private $cliente;
    private $coleccionMotos;
    private $precioFinal;
    /* Método constructor  que recibe como parámetros cada uno de los valores a ser 
    asignados a cada atributo de la clase. */
    public function __construct($numero, $fecha, $cliente, $coleccionMotos, $precioFinal) {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->cliente = $cliente;
        $this->coleccionMotos = $coleccionMotos;
        $this->precioFinal = $precioFinal;
    }
    /* Los métodos de acceso de cada uno de los atributos de la clase. */
    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function getColeccionMotos() {
        return $this->coleccionMotos;
    }

    public function setColeccionMotos($coleccionMotos) {
        $this->coleccionMotos = $coleccionMotos;
    }

    public function getPrecioFinal() {
        return $this->precioFinal;
    }

    public function setPrecioFinal($precioFinal) {
        $this->precioFinal = $precioFinal;
    }
    
/* Redefinir el método _toString  para que retorne la información de los atributos de la clase. */
    public function __toString()
    {
        $cliente = $this->getCliente();
        $string = "\nNumero: " . $this->getNumero() . "\nFecha: " . $this->getFecha() . "\nCliente= " . $cliente->__toString();
        $coleccionMotos = $this-> getColeccionMotos();
        for ($i=0; $i < count($coleccionMotos); $i++) { 
            $datosMotos = $coleccionMotos[$i];
            $string .= "\nMoto nº ". $i+1 ."\n". $datosMotos->__toString() ."\n";
        }
        $string .= "\nPRECIO FINAL=". $this->getPrecioFinal();
        return $string;
    }

    /* Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y 
    lo incorpora a la colección de coleccionMotos de la venta, siempre y cuando sea posible la venta. 
    El método cada vez que incorpora una  moto a la venta, debe actualizar la variable instancia 
    precio final de la venta. 
    Utilizar el método que calcula el precio de venta de la moto  donde crea necesario.*/


    public function incorporarMoto ($objMoto){
        $precio = $objMoto->darPrecioVenta();
        $colMotos = $this->getColeccionMotos();
        $precioVentaActual = $this ->getPrecioFinal();
        if($precio>=0){
            $precioVentaActual= $precioVentaActual + $precio;
            array_push($colMotos,$objMoto);
            $this->setColeccionMotos($colMotos);
            $this->setPrecioFinal($precioVentaActual);
        }
    }
}