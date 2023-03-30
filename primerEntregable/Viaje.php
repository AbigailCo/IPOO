<?php


class Viaje
{
    // atributos la clase codigoAtributo, destinoAtributo, cantidadAtributo, pasajero (array)

    private $codigoAtributo; // $codigoAtributo guarda el codigo del viaje
    private $cantidadAtributo; // $cantidadAtributo la cantidad de pasajeres limite de cont (coleccionPasajeros)
    private $destinoAtributo; // $destinoAtributo string del destinoAtributo
    private $coleccionPasajeros = array(); // $coleccionPasajeros array que guarda otro array de objetos $pasajero



    public function __construct($codigoAtributo, $destinoAtributo, $cantidadAtributo, $coleccionPasajeros)
    {
        //asignacion de valores a los atributos
        $this->codigoAtributo = $codigoAtributo;
        $this->cantidadAtributo = $cantidadAtributo;
        $this->destinoAtributo = $destinoAtributo;
        $this->coleccionPasajeros = $coleccionPasajeros;
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
        $corte = false;
        for ($i=0; $i < count($this->coleccionPasajeros); $i++) {
            $dniEvaluar = $this->coleccionPasajeros[$i]['dni']; 
            if ($dniEvaluar == $dniModificar){
                $corte = true;
                $indice = $i;
            }
        }
        if ($corte) {
            return $indice;
        } elseif ($corte== false) {
            $string = "No se encontro el DNI.";
            return $string;
        }
    }

    public function ModificarPasajero($i, $pasajero)
    {
        $this -> coleccionPasajeros[$i]= $pasajero;
    }


    public function __toString()
    {
        //retorna string con informacion del DESTINO CODIGO Y MAX DE coleccionPasajeros
        $string =  "\n Destino: " . $this->destinoAtributo . "\n Codigo: " . $this->codigoAtributo . "\n MaxPajeros: " . $this->cantidadAtributo;
        $i = 1;
        foreach ($this->coleccionPasajeros as $pasajero) {

            $string .= "\nPasajero " . $i . "\nNombre: " . $pasajero['nombre'] . "\nApellido: " .
                $pasajero['apellido'] . "\nNumero de documento: " . $pasajero['dni'];
            $i++;
        }

        return $string;
    }

    
   
    }
    
