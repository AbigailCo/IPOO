<?php

class Pasajero {
    private $nombre;
    private $apellido;
    private $numDoc;
    private $numTel;

    public function __construct ($nombre, $apellido, $numDoc, $numTel){
        $this->nombre = $nombre;
        $this ->apellido = $apellido;
        $this ->numDoc = $numDoc;
        $this ->numTel = $numTel;
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

    public function getNumDoc (){
        return $this->numDoc;
    }
    public function setNumDoc($numDoc) {
        $this ->numDoc = $numDoc;
    }

    public function getTel(){
        return $this->numTel;
    }
    public function setTel($numTel) {
        $this ->numTel = $numTel;
    }

    public function __toString()
    {
        $string = "\nNombre " . $this ->nombre . " Apellido " . $this ->apellido . "\nNumero de DNI: " . $this -> numDoc.

        "\nNumero de telefono: " . $this ->numTel;
        
        return $string;
    }
}