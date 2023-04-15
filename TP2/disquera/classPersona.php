<?php
/**1. Implementar una clase Persona con los atributos: nombre, apellido, tipo y número de documento.
a) Defina en la clase los siguientes métodos:
1. Método constructor _ _construct() que recibe como parámetros los valores iniciales para los
atributos de la clase.
2. Los métodos de acceso de cada uno de los atributos de la clase.
3. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
4. Crear un script Test_Persona que cree un objeto Persona e invoque a cada uno de los
métodos implementados.*/

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