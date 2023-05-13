<?php


class Viaje
{
    // atributos la clase codigoViaje, destino, cantMaxPasajeros, pasajero (array)

    private $codigoViaje; // $codigoViaje guarda el codigo del viaje
    private $cantMaxPasajeros; // $cantMaxPasajeros la cantidad de pasajeres limite de cont (coleccionPasajeros)
    private $destino; // $destino string del destino
    private $coleccionPasajeros = array(); // $coleccionPasajeros array que guarda otro array de objetos $pasajero
    private $responsableV;
    private $importe;


    public function __construct($codigoViaje, $destino, $cantMaxPasajeros, $coleccionPasajeros, $responsableV,$importe)
    {
        //asignacion de valores a los atributos
        $this->codigoViaje = $codigoViaje;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->destino = $destino;
        $this->coleccionPasajeros = $coleccionPasajeros;
        $this->responsableV = $responsableV;
        $this->importe = $importe;
    }

    public function getCodigo()
    {
        return $this->codigoViaje;
    }
    public function setCodigo($codigoViaje)
    {
        $this->codigoViaje = $codigoViaje;
    }


    public function getCantMaxPasajeros()
    {
        return $this->cantMaxPasajeros;
    }
    public function setCantMaxPasajeros($cantMaxPasajeros)
    {
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }


    public function getDestino()
    {
        return $this->destino;
    }
    public function setDestino($destino)
    {
        $this->destino = $destino;
    }
    public function getResponsableV(){
        return $this->responsableV;
    }
    public function setResponsableV($responsableV){
        $this->responsableV = $responsableV;
    }


    public function getcoleccionPasajeros()
    {
        return $this->coleccionPasajeros;
    }
    public function setcoleccionPasajeros($coleccionPasajeros)
    {
        $this->coleccionPasajeros = $coleccionPasajeros;
    }
    public function getImporte()
    {
        return $this->importe;
    }

    
    public function setImporte($importe)
    {
        $this->importe = $importe;
    }

    public function CargarPasajero($pasajero)
    {
        $coleccionPasajeros= $this->getcoleccionPasajeros();
        array_push($coleccionPasajeros, $pasajero);
        $this->setcoleccionPasajeros($coleccionPasajeros);
    }
    
    public function BuscarDni($dniModificar)
    {
        $encontrado = false;
        for ($i=0; $i < count($this->coleccionPasajeros) && !$encontrado; $i++) {
            $dniEvaluar = $this->coleccionPasajeros[$i]->getNumDoc();
            
            if ($dniEvaluar == $dniModificar){
                $encontrado = true;
                $indice = $i;
            }
        }
        if ($encontrado) {
            return $indice;
        } else {
            $string = "No se encontro el DNI.";
            return $string;
        }
    }


    public function ModificarPasajero($i, $pasajero)
    {
        $this -> coleccionPasajeros[$i]= $pasajero;
    }

    public function BuscarResponsable($numBuscar){
        $numResActual= $this->getResponsableV()->getNumResponsable();
        if ($numResActual == $numBuscar){
            $respuesta = true;
        }else{
            $respuesta = false;
        }
        return $respuesta;
    }

    public function CargarResponsable ($responsable){
        $this-> setResponsableV($responsable);
    }


    public function __toString()
    {
        //retorna string con informacion del DESTINO CODIGO Y MAX DE coleccionPasajeros
        $string =  "\n Destino: " . $this->destino . "\n Codigo: " . $this->codigoViaje . "\nImporte: ".$this->importe."\n MaxPajeros: " . $this->cantMaxPasajeros.
        "\nRESPONSABLE: " . $this->getResponsableV();
        $i = 1;
        for ($i=0; $i < count($this->coleccionPasajeros); $i++) { 
            $datosPasajeros = $this->coleccionPasajeros[$i];
            $string .= "\nPasajero nº ". $i+1 ."\n".get_class($datosPasajeros)."\n" .$datosPasajeros->__toString() ."\n";
        }

        return $string;
    }

    public function hayPasajesDisponibles(){
        $hayLugar= null;
        $cantMaxPasajeros = $this->getCantMaxPasajeros();
        $pasajerosCargados = count($this->getcoleccionPasajeros());
        if ($pasajerosCargados<$cantMaxPasajeros){
            $hayLugar=true;
        }else{
            $hayLugar=false;
        }
        return $hayLugar;
    }
    
    public function  venderPasaje($objPasajero){
        $importe = null;
        $hayLugar= $this->hayPasajesDisponibles();
        if($hayLugar){
            $importe= $this->getImporte();
            $incremento = $objPasajero->darPorcentajeIncremento();
            $importe = $importe * $incremento;
        }
        return $importe;
    }
    
 
    }
