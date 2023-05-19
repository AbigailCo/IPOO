<?php
/* En la clase Terminal:
1. Se registra la siguiente información: denominación, dirección y la colección de coleccionEmpresas 
registradas en la terminal.*/

class Terminal {
    private $denominacion;
    private $direccion;
    private $coleccionEmpresas;
    /* 2. Método constructor que recibe como parámetros los valores iniciales para los atributos de 
la clase. */
    public function __construct($denominacion, $direccion, $coleccionEmpresas) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->coleccionEmpresas = $coleccionEmpresas;
    }
    /* 3. Los métodos de acceso para cada una de las variables instancias de la clase. */
    public function getDenominacion() {
        return $this->denominacion;
    }
    public function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }

    public function getDireccion() {
        return $this->direccion;
    }
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getColeccionEmpresas() {
        return $this->coleccionEmpresas;
    }
    public function setColeccionEmpresas($coleccionEmpresas){
        $this->coleccionEmpresas = $coleccionEmpresas;
    }
   /*  4. Redefinir el método _toString para que retorne la información de los atributos de la clase.  */
    public function __toString() {
        $coleccionEmpresas = $this->getColeccionEmpresas();
        $string= "Denominación: " . $this->getDenominacion() . "\n" .
               "Dirección: " . $this->getDireccion() . "\n" .
               "Empresas registradas: ";
            for ($i=0; $i < count($coleccionEmpresas); $i++) { 
                $datosViaje = $coleccionEmpresas[$i];
                $string .= "\nViaje nº ". $i+1 ."\n". $datosViaje->__toString() ."\n";
            }
        return $string;
    }
   /*  5. Implementar el método darViajeMenorValor() recorre cada una de las coleccionEmpresas 
   vinculadas a  la terminal y retorna una colección de objetos de viaje. 
Cada viaje es el de menor valor dentro de la colección de viajes de esa empresa.  */

    public function darViajesMenorValor(){
        $coleccionEmpresas = $this->getColeccionEmpresas();
        $coleccionMenorValor = array();
        for ($i=0; $i < count($coleccionEmpresas); $i++) { 
            $empresaEvaluar = $coleccionEmpresas [$i];
            $viajeMenorValor = $empresaEvaluar->viajeMenorValor();
            array_push($coleccionMenorValor, $viajeMenorValor);
        }
        return $coleccionMenorValor;
    }
}

