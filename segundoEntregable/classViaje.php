<?php


class Viaje
{
    // atributos la clase codigoAtributo, destinoAtributo, cantidadAtributo, pasajero (array)

    private $codigoAtributo; // $codigoAtributo guarda el codigo del viaje
    private $cantidadAtributo; // $cantidadAtributo la cantidad de pasajeres limite de cont (coleccionPasajeros)
    private $destinoAtributo; // $destinoAtributo string del destinoAtributo
    private $coleccionPasajeros = array(); // $coleccionPasajeros array que guarda otro array de objetos $pasajero
    private $responsableV;


    public function __construct($codigoAtributo, $destinoAtributo, $cantidadAtributo, $coleccionPasajeros, $responsableV)
    {
        //asignacion de valores a los atributos
        $this->codigoAtributo = $codigoAtributo;
        $this->cantidadAtributo = $cantidadAtributo;
        $this->destinoAtributo = $destinoAtributo;
        $this->coleccionPasajeros = $coleccionPasajeros;
        $this->responsableV = $responsableV;
    }

    public function getCodigo()
    {
        return $this->codigoAtributo;
    }
    public function setCodigo($codigoAtributo)
    {
        $this->codigoAtributo = $codigoAtributo;
    }


    public function getCantidad()
    {
        return $this->cantidadAtributo;
    }
    public function setCantidad($cantidadAtributo)
    {
        $this->cantidadAtributo = $cantidadAtributo;
    }


    public function getDestino()
    {
        return $this->destinoAtributo;
    }
    public function setDestino($destinoAtributo)
    {
        $this->destinoAtributo = $destinoAtributo;
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
    public function CargarPasajero($pasajero)
    {
        array_push($this->coleccionPasajeros, $pasajero);
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
        $string =  "\n Destino: " . $this->destinoAtributo . "\n Codigo: " . $this->codigoAtributo . "\n MaxPajeros: " . $this->cantidadAtributo.
        "\nRESPONSABLE: " . $this->getResponsableV();
        $i = 1;
        for ($i=0; $i < count($this->coleccionPasajeros); $i++) { 
            $datosPasajeros = $this->coleccionPasajeros[$i];
            $string .= "\nPasajero nº ". $i+1 ."\n". $datosPasajeros->__toString() ."\n";
        }

        return $string;
    }



    }
