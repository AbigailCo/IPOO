<?php 
/**Crea una clase CuentaBancaria con los siguientes atributos: número de cuenta, el DNI del cliente, el
saldo actual y el interés anual que se aplica a la cuenta. Define en la clase los siguientes métodos:
 */

 class CuentaBancaria {
    private $numCuenta;
    private $persona;
    private $saldoActual;
    private $interesAnual;
   /*  14.a. Método constructor _ _construct() que recibe como parámetros los valores iniciales para los
    atributos de la clase. */
    public function __construct ($numCuenta, $persona, $saldoActual, $interesAnual){
        $this -> numCuenta = $numCuenta;
        $this -> persona = $persona;
        $this -> saldoActual = $saldoActual;
        $this -> interesAnual = $interesAnual;
    }
   /*  14.b. Los método de acceso de cada uno de los atributos de la clase. */
    public function getNumCuenta() {
        return $this -> numCuenta;
    }
    public function setNumCuenta ($numCuenta){
        $this -> numCuenta = $numCuenta;
    }

    public function getDniCliente () {
        return  $this -> persona;
    }
    public function setDniCliente ($persona) {
        $this -> persona = $persona;
    }

    public function getSaldoActual () {
        return $this -> saldoActual;
    }
    public function setSaldoActual ($saldoActual) {
        $this -> saldoActual = $saldoActual;
    }

    public function getInteresAnual () {
        return $this -> interesAnual;
    }
    public function setInteresAnual ($interesAnual){
        $this -> interesAnual = $interesAnual;
    }
    /* 14.c. actualizarSaldo(): actualizará el saldo de la cuenta aplicándole el interés diario (interés anual
    dividido entre 365 aplicado al saldo actual). */
    public function ActualizarSaldo(){
        $interesDiario = $this -> interesAnual / 365;
        $this -> saldoActual = $this -> saldoActual + $interesDiario;
        return $this -> saldoActual;
    }
   /* 14.d. depositar($cant): permitirá ingresar una cantidad de dinero en la cuenta. */
    
   public function Depositar ($cantidad){
    $this -> saldoActual = $this -> saldoActual + $cantidad;
    return $this -> saldoActual;
   }

   /* 14.e. retirar($cant): permitirá sacar una cantidad de dinero de la cuenta (si hay saldo). */
   public function Retirar($cantidad){
    if ($this -> saldoActual >= $cantidad) {
        $this -> saldoActual = $this -> saldoActual - $cantidad;
        return $this -> saldoActual;
    }else {
        $string = "No hay saldo suficiente.";
        return $string;
    }

   }
   /* 14.f. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase. */

   public function __toString()
   {
    $string = "Cuenta Bancaria: " . $this-> numCuenta . "\nCLIENTE: \n " . $this-> persona .
    "\nSaldo actual: " . $this-> saldoActual . "\nInteres Anual: " . $this-> interesAnual;
    return $string;
   }

 }

 class Persona {
    private $nombre;
    private $apellido;
    private $tipo;
    private $numDoc;

    public function __construct ($nombre, $apellido, $tipo, $numDoc){
        $this->nombre = $nombre;
        $this ->apellido = $apellido;
        $this ->tipo = $tipo;
        $this ->numDoc = $numDoc;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this -> nombre = $nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido) {
        $this ->apellido = $apellido;
    }

    public function getTipo(){
        return $this->tipo;
    }
    public function setTipo($tipo) {
        $this ->tipo = $tipo;
    }

    public function getNumDoc ($numDoc){
        return $this->numDoc = $numDoc;
    }
    public function setNumDoc($numDoc) {
        $this ->numDoc = $numDoc;
    }

    public function __toString()
    {
        $string = "Nombre " . $this ->nombre . " Apellido " . $this ->apellido . " tipo: " . $this ->tipo .
        " numero " . $this -> numDoc;

        return $string;
    }
}