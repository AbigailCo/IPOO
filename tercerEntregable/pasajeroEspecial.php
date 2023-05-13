<?php
/* 
La clase Pasajeros con necesidades especiales se refiere a pasajeros que pueden 
requerir servicios especiales como sillas de ruedas, asistencia para el asistencia o desasistencia, 
o comidas especiales para personas con alergias o restricciones alimentarias.
 */
include_once 'pasajero.php';
class PasajeroEspecial extends Pasajero
{
    private $sillaDeRuedas;
    private $asistencia;
    private $comidaEspecial;

    public function __construct(
        $nombre,
        $apellido,
        $numDoc,
        $numAsiento,
        $numTicket,
        $sillaDeRuedas,
        $comidaEspecial,
        $asistencia
    ) 
    {
        parent::__construct($nombre, $apellido, $numDoc, $numAsiento, $numTicket);
        $this->sillaDeRuedas = $sillaDeRuedas;
        $this->asistencia = $asistencia;
        $this->comidaEspecial = $comidaEspecial;
        
    }




    public function getSillaDeRuedas()
    {
        return $this->sillaDeRuedas;
    }

    public function setSillaDeRuedas($sillaDeRuedas)
    {
        $this->sillaDeRuedas = $sillaDeRuedas;
    }

    public function getAsistencia()
    {
        return $this->asistencia;
    }


    public function setAsistencia($asistencia)
    {
        $this->asistencia = $asistencia;
    }


    public function getComidaEspecial()
    {
        return $this->comidaEspecial;
    }

    public function setComidaEspecial($comidaEspecial)
    {
        $this->comidaEspecial = $comidaEspecial;
    }

    public function __toString()
    {
        $string = parent::__toString();
        $string .= "\nSilla de ruedas: " . $this->sillaDeRuedas . 
        "\nAsistencia: ". $this->asistencia. "\nComida especial: ". $this -> comidaEspecial;
        return $string;
    }

    public function darPorcentajeIncremento(){
        $silla = $this->getSillaDeRuedas();
        $asistencia = $this->getAsistencia();
        $comida = $this->getComidaEspecial();
        if ($silla && $asistencia && $comida) {
            $incrememto = 1.30;
        }elseif($silla||$asistencia||$comida){
            $incrememto = 1.15;
        }
        return $incrememto;
    }
   
}


