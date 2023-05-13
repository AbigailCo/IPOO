<?php
class CuentaCorriente extends Cuenta{
    private $montoMaxGirar;

    public function __construct($montoMaxGirar, $numCuenta, $cliente, $saldo){
        $this -> montoMaxGirar = $montoMaxGirar;
        parent:: __construct($numCuenta, $cliente, $saldo);
    }
    
    public function getMontoMaxGirar()
    {
        return $this->montoMaxGirar;
    }

    public function setMontoMaxGirar($montoMaxGirar)
    {
        $this->montoMaxGirar = $montoMaxGirar;
    }

    public function __toString()
    {
        $string = "\nMonto max para girar" . $this->montoMaxGirar;
        return $string;
    }
}