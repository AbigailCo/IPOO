<?php

class Cliente {
    private $nombre;
    private $apellido;
    private $numDoc;
    private $tipoTramite;

    public function __construct ($nombre, $apellido, $numDoc, $tipoTramite){
        $this->nombre = $nombre;
        $this ->apellido = $apellido;
        $this ->tipoTramite = $tipoTramite;
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

    public function getNumDoc ($numDoc){
        return $this->numDoc = $numDoc;
    }
    public function setNumDoc($numDoc) {
        $this ->numDoc = $numDoc;
    }

    public function getTipo(){
        return $this->tipoTramite;
    }
    public function setTipo($tipoTramite) {
        $this ->tipoTramite = $tipoTramite;
    }

    public function __toString()
    {
        $string = "Nombre " . $this ->nombre . " Apellido " . $this ->apellido . "\nNumero de DNI: " . $this -> numDoc.

        "\nTipo de Tramite: " . $this ->tipoTramite;
        
        return $string;
    }
}