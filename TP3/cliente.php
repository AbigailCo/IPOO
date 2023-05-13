<?php
include_once 'persona.php';
class Cliente extends Persona {
    private $numCliente;

    public function __construct ($numCliente, $dni, $nombre, $apellido){
        parent::__construct($dni, $nombre, $apellido);
        $this -> numCliente = $numCliente;
    }
    public function getNumCliente()
    {
        return $this->numCliente;
    }
    public function setNumCliente($numCliente)
    {
        $this->numCliente = $numCliente;

        return $this;
    }

    public function __toString()
    {
        $string = "\nNumero de cliente: " . $this->numCliente;
        return $string;
    }
}