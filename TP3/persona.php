<?php 
class Persona{
    private $dni;
    private $nombre;
    private $apellido;

    public function __construct ($dni, $nombre, $apellido){
        $this -> dni = $dni;
        $this -> nombre = $nombre;
        $this ->apellido = $apellido;
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;

        
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

    }

    public function __toString()
    {
        $string = "\nDni: " . $this->dni . "\Nombre: " . $this->nombre . "\nApellido: " . $this ->apellido;
        return $string;
    }
}