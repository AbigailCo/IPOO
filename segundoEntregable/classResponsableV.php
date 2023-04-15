<?php
/* clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido. */

class ResponsableV {
    private $numResponsable;
    private $numLicencia;
    private $nomResponsable;
    private $apeResponsable;

    public function __construct ( $numResponsable, $numLicencia, $nomResponsable, $apeResponsable){
        $this -> numResponsable = $numResponsable;
        $this-> numLicencia = $numLicencia;
        $this->nomResponsable = $nomResponsable;
        $this->apeResponsable = $apeResponsable;
    }
    public function getNumResponsable () {
        return $this->numResponsable;
    }
    public function setNumResponsable($numResponsable) {
        $this->numResponsable = $numResponsable;
    }
    public function getNumLicencia () {
        return $this->numLicencia;
    }
    public function setNumLicencia($numLicencia) {
        $this -> numLicencia = $numLicencia;
    }

    public function getNomResponsable() {
        return $this->nomResponsable;
    }
    public function setNomResponsable($nomResponsable) {
        $this-> nomResponsable = $nomResponsable;
    }
    public  function getApeEmpleado () {
        return $this->apeResponsable;
    }
    public function setApeEmpleado($apeResponsable) {
        $this-> apeResponsable = $apeResponsable;
    }

    public function __toString()
    {
        $string = "\nNumero de Responsable: ". $this->numResponsable . "\n". 
        "Numero de licencia: ".$this->numLicencia. "\nNombre de Responsable: ".$this->nomResponsable.
        "\nApellido Responsable: ". $this->apeResponsable;
        return $string;
    }
    
    
}