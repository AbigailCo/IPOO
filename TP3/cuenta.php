<?php
class Cuenta {
    private $numCuenta;
    private $cliente;
    private $saldoCuenta;

    public function __construct($numCuenta, $cliente, $saldoCuenta) {
        $this -> numCuenta  = $numCuenta;
        $this -> cliente = $cliente;
        $this -> saldoCuenta = $saldoCuenta;
    }
    

  
    public function getNumCuenta()
    {
        return $this->numCuenta;
    }

  
    public function setNumCuenta($numCuenta)
    {
        $this->numCuenta = $numCuenta;
    }

   
    public function getCliente()
    {
        return $this->cliente;
    }

    
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    public function getSaldoCuenta()
    {
        return $this->saldoCuenta;
    }

    public function setSaldoCuenta($saldoCuenta)
    {
        $this->saldoCuenta = $saldoCuenta;
    }

    public function saldoCuenta (){
        $saldoCuenta = $this->getSaldoCuenta();
        return $saldoCuenta;
    }

    public function realizarDeposito ($monto){
        $saldoCuenta = $this->getSaldoCuenta();
        $saldoCuenta = $saldoCuenta + $monto;
        $this ->setSaldoCuenta($saldoCuenta);
    }

    public function realizarRetiro ($monto){
        $saldoCuenta = $this->getSaldoCuenta();
        if ($saldoCuenta >= $monto){
            $saldoCuenta = $saldoCuenta - $monto;
            $this ->setSaldoCuenta($saldoCuenta);
        }else{
            echo "No posee ese dinero en la cuenta";
        }
    }

}