<?php
include_once 'pasajero.php';
class PasajeroEstandar extends Pasajero
{

    public function __construct(
        $nombre,
        $apellido,
        $numDoc,
        $numAsiento,
        $numTicket,
    ) 
    {
        parent::__construct($nombre, $apellido, $numDoc, $numAsiento, $numTicket);
    }

    public function __toString()
    {
        $string = parent::__toString();
        return $string;
    }
    public function darPorcentajeIncremento(){
        $incremento = 1.10;
        return $incremento;
    }
}
