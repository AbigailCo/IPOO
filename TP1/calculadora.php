<?php
//Diseñar e implementar la clase Calculadora que permite realizar las operaciones básicas: + , - , *, /

class Calculadora {
    private $num1;
    private $num2;
    private $operador;

    public function __construct($n1,$n2, $op ){
        $this -> num1 = $n1;
        $this -> num2 = $n2;
        $this   -> operador = $op;
    }
    public function getN1 () { 
        return $this->num1;
    }
    public  function getN2 () {
        return  $this->num2;
    }
    public function getOp () {
        return $this -> operador;
    }
    public function setN1 ($n1) {
        $this -> num1 = $n1;
    }
    public function setN2 ($n2) {
        $this -> num2 = $n2;
    }
    public function setOp ($op) {
    }
    public function suma () {
        $suma = $this -> getN1() + $this -> getN2();
        return $suma;
    }
    public function resta () {
        $resta = $this ->   getN1() - $this -> getN2();
        return  $resta;
    }
    public function multiplicacion () {
        $multi =    $this -> getN1() * $this -> getN2();
        return $multi;
    }
    public function divicion () {
        $divi=  $this -> getN1() / $this -> getN2();
        return $divi;
    }

}
//programa principal

echo "Ingresar un numero: ";
$priNum = trim(fgets(STDIN));
echo "Ingrese la operacion: ";
$hacer = trim(fgets(STDIN));
echo "Ingrese la segundo numero: ";
$segNum = trim(fgets(STDIN));

$cal = new Calculadora($priNum, $segNum,$hacer);
$cal -> setN1($priNum);
$cal -> setN2($segNum);
$cal -> setOp($hacer);

if ($hacer == "+"){
    $resultado = $cal -> suma();
}else if($hacer == "-"){
    $resultado = $cal -> resta();
}else if ($hacer == "*"){
    $resultado = $cal -> multiplicacion();
}else if ($hacer == "/"){
    $resultado = $cal -> divicion();
}

echo $resultado;
