<?php 
/* En la clase Responsable:
1. Se registra la siguiente información: nombre, apellido, Nro de Documento, direccion,
mail y telefono.
2. Método constructor que recibe como parámetros los valores iniciales para los atributos
definidos en la clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método toString para que retorne la información de los
atributos de la clase. */
class Responsable {
    private $nomResponsable;
    private $apeResponsable;
    private $numDocResponsable;
    private $direcResponsable;
    private $mailResponsable;
    private $telResponsable;

    public function __construct($nomResponsable, $apeResponsable, $numDocResponsable,$direcResponsable, $mailResponsable, $telResponsable){
        $this -> nomResponsable = $nomResponsable;
        $this -> apeResponsable = $apeResponsable;
        $this -> numDocResponsable = $numDocResponsable;
        $this -> direcResponsable = $direcResponsable;
        $this -> mailResponsable = $mailResponsable;
        $this -> telResponsable = $telResponsable;
    }

    public function getnomResponsable () {
        return $this -> nomResponsable;
    }
    public function setnomResponsable ($nomResponsable) {
        $this-> $nomResponsable = $nomResponsable;
    }
    
    public function getapeResponsable () {
        return $this->apeResponsable;
    }
    public function setapeResponsable ($apeResponsable) {
        $this->apeResponsable = $apeResponsable;
    }
    public function getnumDocResponsable () {
        return $this->numDocResponsable;
    }

    public function setnumDocResponsable ($numDocResponsable) {
        $this-> numDocResponsable = $numDocResponsable;
    }

    public function getdirecResponsable () {
        return $this->direcResponsable;
    }
    public function setdirecResponsable ($direcResponsable){
        $this-> direcResponsable = $direcResponsable;
    }

    public function gettelResponsable (){
        return $this->telResponsable;
    }
    public function settelResponsable ($telResponsable){
        $this->telResponsable = $telResponsable;
    }

    public function __toString()
    {
        $string = "\nResponsable: \nNombre: " . $this->nomResponsable . "\nApellido: " . $this->apeResponsable.
        "\nNumero de DNI: " . $this->numDocResponsable . "\nMail: " . $this->mailResponsable. "\nDireccion: " . $this->direcResponsable.
        "\nTelefono: " . $this->telResponsable;
        return $string;
    }
}