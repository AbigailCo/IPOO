<?php
/* En la clase Empresa:
1. Se registra la siguiente información: identificación, nombre y la colección de Viajes 
que realiza.
*/

class Empresa {
    private $identificacion;   
    private $nombre;
    private $coleccionViajes;
    /* 2. Método constructor que recibe como parámetros los valores iniciales para los atributos. */
    public function __construct($identificacion, $nombre, $coleccionViajes){
        $this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->coleccionViajes = $coleccionViajes;
    }
    /* 3. Los métodos de acceso de cada uno de los atributos de la clase. */
    public function getIdentificacion()
    {
        return $this->identificacion;
    }
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;
    }
    public function getNombre()
    {
        return $this->nombre;
    } 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    } 
    public function getColeccionViajes()
    {
        return $this->coleccionViajes;
    }
    public function setColeccionViajes($coleccionViajes)
    {
        $this->coleccionViajes = $coleccionViajes;
    }
    /* 4. Redefinir el método _toString para que retorne la información de los atributos de la clase. */
    public function __toString()
    {
        $string = "\nEmpresa: " .$this->getNombre() .
        "\nID: " .$this->getIdentificacion() .
        $i = 1;
        $coleccionViajes= $this->getColeccionViajes();
        for ($i=0; $i < count($coleccionViajes); $i++) { 
            $datosViaje = $coleccionViajes[$i];
            $string .= "\nViaje nº ". $i+1 ."\n". get_class($datosViaje).
            $datosViaje->__toString() ."\n";
        }
        return $string;
    }
    /* 5. Implementar el método buscarViaje(codViaje) que dado un código de viaje que 
    se recibe por parámetro, retorna el objeto viaje correspondiente a ese código. */
    public function buscarViaje($numViaje){
        $coleccionViajes = $this->getColeccionViajes();
        $i=0;
        $encontrado= false;
        $viajeSolicitado = null;
        while ($i < count($coleccionViajes) && !$encontrado) {
            $viajeEvaluar = $coleccionViajes[$i];
            $numEvaluar = $viajeEvaluar->getNumViaje();
            if ($numEvaluar == $numViaje) {
                $viajeSolicitado = $viajeEvaluar;
                $encontrado = true;
            }
            $i++;
        }
        return $viajeSolicitado;
    }
   /*  6. Implementar el método darCostoViaje(codViaje) que dado un código de viaje retorna el 
    importe correspondiente a ese viaje.  */
    public function darCostoViaje($codViaje){
        $viaje = $this->buscarViaje($codViaje);
        $importe = $viaje->calcularImporteViaje();
        return $importe;
    }
    public function viajeMenorValor(){
        $coleccionViajes = $this->getColeccionViajes();
        $viajeMenorValor = null;
        $importeMenor=99999999;
        for ($i=0; $i < count($coleccionViajes); $i++) { 
            $viajeEvaluar = $coleccionViajes[$i];
            $importeEvaluar = $viajeEvaluar->calcularImporteViaje();
            if ($importeEvaluar < $importeMenor) {
                $importeMenor = $importeEvaluar;
                $viajeMenorValor = $viajeEvaluar;
            }
        }
        echo $viajeMenorValor;
        return $viajeMenorValor;
    }
}    

