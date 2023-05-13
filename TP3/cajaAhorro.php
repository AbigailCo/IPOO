<?php
class CajaAhorro extends Cuenta {
    public function __construct($numCuenta, $cliente, $saldo)
    {
        parent:: __construct($numCuenta, $cliente, $saldo);
    }
}