<?php

/**Diseñar e implementar la clase Fecha.
 * 

 * Implementar una función incremento, que reciba como parámetros un entero y una fecha, 
 * que retorne una nueva fecha, resultado de incrementar la fecha recibida por parámetro en el numero 
 * de días definido por el parámetro entero.
Nota 1: Son años bisiestos los múltiplos de cuatro que no lo son de cien, salvo que lo sean de
cuatrocientos, en cuyo caso si son bisiestos.
Nota 2: Para la solución de este problema puede ser útil definir un método incrementa_un_dia.
 */
 
 //clase Fecha 
class Fecha {
    //atributos para almacenar el día, el mes y el año
    private $dia;
    private $mes;
    private $año;

    public function __construct ($dia, $mes, $año){
        $this ->dia = $dia;
        $this ->mes = $mes;
        $this ->año = $año;
    }
    public function getDia(){
        return $this->dia;
    }
    public function setDia($dia){
        $this ->dia = $dia;
    }
    public  function getMes(){
        return $this->mes;
    }
    public function setMes($mes){
        $this ->mes = $mes;
    }
    public function getAño () {
       return $this->año;
    }
    public function setAño($año){
        $this ->año = $año;
    }

    public function __toString() {
        //devuelve String en forma abreviada (16/02/2000) y extendida (16 de febrero de 2000) . 
            $mes = $this -> getMes;
            echo "Forma abreviada: " . $this->getDia()."/" . $this->getMes()."/".$this->getAño;
            if ($mes == 01 ) {
                $this -> setMes("Enero");
            }else if ($mes == 02 ) {
                $this -> setMes("Febrero");
            }else if ($mes == 03 ) {
                $this -> setMes("Marzo");
            }else if ($mes == 04 ) {
                $this -> setMes("Abril");
            }else if ($mes == 05 ) {
                $this -> setMes("Mayo");
            }else if ($mes == 06 ) {
                $this -> setMes("Junio");
            }
        echo "Forma extendida: ". $this -> getDia(). " de ". $this -> getMes(). " de ". $this -> getAño();
    }
   
}

