<?php
/* En la clase Responsable:
1. Se registra la siguiente información: nombre, apellido, Nro de Documento, dirección, 
mail y teléfono.
2. Método constructor que recibe como parámetros los valores iniciales para los
 atributos definidos en la
clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método toString para que retorne la información de los atributos 
de la clase */

class Responsable {
    private $nomResponsable;
    private $dni;
    private $direccion;
    private $apeResponsable;
    private $mail;
    private $tel;

    public function __construct ( $nomResponsable, $dni, $direccion, $apeResponsable, $mail, $tel ) {
        $this ->nomResponsable = $nomResponsable;
        $this-> dni = $dni;
        $this->direccion = $direccion;
        $this->apeResponsable = $apeResponsable;
        $this ->mail = $mail;
        $this ->tel = $tel;
    }
    public function getNomResponsable () {
        return $this->nomResponsable;
    }
    public function setNomResponsable($nomResponsable) {
        $this->nomResponsable = $nomResponsable;
    }
    public function getDni () {
        return $this->dni;
    }
    public function setDni($dni) {
        $this -> dni = $dni;
    }

    public function getDireccion() {
        return $this->direccion;
    }
    public function setDireccion($direccion) {
        $this-> direccion = $direccion;
    }
    public  function getApeResponsable () {
        return $this->apeResponsable;
    }
    public function setApeResponsable($apeResponsable) {
        $this-> apeResponsable = $apeResponsable;
    }
    public function getMail()
    {
        return $this->mail;
    }
    public function setMail($mail)
    {
        $this->mail = $mail;
    }
    public function getTel()
    {
        return $this->tel;
    }
    public function setTel($tel)
    {
        $this->tel = $tel;
    }
    
    public function __toString()
    {
        $string = "\nRESPONSABLE\nNombre: ". $this->getNomResponsable() . "\nApellido: ". $this->getApeResponsable() .
        "\nNumero de documento: ".$this->getDni(). "\nDireccion: ".$this->getDireccion(). 
        "\nE-mail: ".$this->getMail(). "\nTel" . $this->getTel();
        return $string;
    }
}