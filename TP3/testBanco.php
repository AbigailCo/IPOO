<?php
include_once 'cliente.php';
include_once 'cuenta.php';
include_once 'cajaAhorro.php';
include_once 'cuentaCorriente.php';
include_once 'banco.php';
/*Implemente una clase TestBanco que realice las siguientes operaciones:
1. Crear un objeto de la clase Banco.
2. Crear dos nuevos clientes Cliente1 y Cliente2, y agregarlos al banco.
3. Crear dos Cuentas Corrientes, una asociada al cliente A y otra al cliente B, y agregarlas al Banco .
Departamento de Programación
Facultad de Informática
Universidad Nacional del Comahue
4. Crear tres Cajas de Ahorro, dos asociadas al cliente A y una asociada al cliente B, y agregarlas al Banco .
5. Depositar $300 en cada una de las Cajas de Ahorro.
6. Transferir $150 de la Cuenta Corriente de Cliente1, a la Caja de Ahorro de Cliente2.
7. Mostrar los datos de todas las cuentas. */

$arrayClientes = array();
$arrayCuentasCorrientes = array();
$arrayCajaAhorros = array();
$ultimoValor= 0;
$banco = new Banco($arrayCuentasCorrientes,$arrayCajaAhorros,$ultimoValor,$arrayClientes);
$cliente1 = new Cliente(count($arrayClientes),41738816, "Abigail", "Corrales");
$cliente2 = new Cliente(count($arrayClientes),17979860, "Isabel", "Gutierres");
$banco -> incorporarCliente($cliente1);
$banco -> incorporarCliente($cliente2);
$cuentaCorriente1= new CuentaCorriente(2000, 0, $cliente1, 0);
$cuentaCorriente2= new CuentaCorriente(4000, 0, $cliente2, 0);
$banco -> incorporarCuentaCorriente($cuentaCorriente1->getCliente()->getNumCliente(), $cuentaCorriente1->getMontoMaxGirar());
$banco -> incorporarCuentaCorriente($cuentaCorriente2->getCliente()->getNumCliente(), $cuentaCorriente2->getMontoMaxGirar());
echo $banco;


