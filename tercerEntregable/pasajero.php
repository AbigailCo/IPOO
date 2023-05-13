<?php

class Pasajero
{
    private $nombre;
    private $apellido;
    private $numDoc;
    private $numAsiento;
    private $numTicket;

    public function __construct($nombre, $apellido, $numDoc, $numAsiento, $numTicket)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numDoc = $numDoc;
        $this->numAsiento = $numAsiento;
        $this->numTicket = $numTicket;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getNumDoc()
    {
        return $this->numDoc;
    }
    public function setNumDoc($numDoc)
    {
        $this->numDoc = $numDoc;
    }

    public function getNumAsiento()
    {
        return $this->numAsiento;
    }
    public function setNumAsiento($numAsiento)
    {
        $this->numAsiento = $numAsiento;
    }
    public function getNumTicket()
    {
        return $this->numTicket;
    }
    public function setNumTicket($numTicket)
    {
        $this->numTicket = $numTicket;
    }

    public function __toString()
    {
        $string = "\nNombre " . $this->nombre . 
            "\nApellido " . $this->apellido . 
            "\nNumero de DNI: " . $this->numDoc .
            "\nNumero de asiento: " . $this->numAsiento.
            "\nNumero de ticket: " . $this->numTicket;

        return $string;
    }

    public function darPorcentajeIncremento(){
        return 0;
    }
    
}
