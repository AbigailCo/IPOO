<?php
/* 
La clase Pasajeros con necesidades especiales se refiere a pasajeros que pueden 
requerir servicios especiales como sillas de ruedas, asistencia para el embarque o desembarque, 
o comidas especiales para personas con alergias o restricciones alimentarias.
 */
include_once 'pasajero.php';
class PasajeroVip extends Pasajero
{
    private $numPasajeroFrecuente;
    private $cantMillas;
    

    public function __construct(
        $nombre,
        $apellido,
        $numDoc,
        $numAsiento,
        $numTicket,
        $numPasajeroFrecuente,
        $cantMillas,
    ) 
    {
        parent::__construct($nombre, $apellido, $numDoc, $numAsiento, $numTicket);
        $this->numPasajeroFrecuente = $numPasajeroFrecuente;
        $this->cantMillas = $cantMillas;
    }




    public function getNumPasajeroFrecuente()
    {
        return $this->numPasajeroFrecuente;
    }

    public function setNumPasajeroFrecuente($numPasajeroFrecuente)
    {
        $this->numPasajeroFrecuente = $numPasajeroFrecuente;
    }

    public function getCantMillas()
    {
        return $this->cantMillas;
    }


    public function setCantMillas($cantMillas)
    {
        $this->cantMillas = $cantMillas;
    }
    public function __toString()
    {
        $string = parent::__toString();
        $string .= "\nNumero pasajero Frecuente: " . $this->numPasajeroFrecuente . "\nCantidad de millas: ". $this->cantMillas;
        return $string;
    }

    public function darPorcentajeIncremento(){
        $incremento = 1.35;
        $millas = $this->getCantMillas();
        if($millas > 300){
            $millas = $millas*1.30;
            $this->setCantMillas($millas);
            echo $this->getCantMillas();
        }
        return $incremento;
    }
}
