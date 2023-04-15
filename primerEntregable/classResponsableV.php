<?php
/* clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido. */

class ResponsableV {
    private $numEmpleado;
    private $numLicencia;
    private $nomEmpleado;
    private $apeEmpleado;

    public function __construct ( $numEmpleado, $numLicencia, $nomEmpleado, $apeEmpleado){
        $this -> numEmpleado = $numEmpleado;
        $this-> numLicencia = $numLicencia;
        $this->nomEmpleado = $nomEmpleado;
        $this->apeEmpleado = $apeEmpleado;
    }
    public function getNumEmpleado () {
        return $this->numEmpleado;
    }
    public function setNumEmpleado($numEmpleado) {
        $this->numEmpleado = $numEmpleado;
    }
    public function getNumLicencia () {
        return $this->numLicencia;
    }
    public function setNumLicencia($numLicencia) {
        $this -> numLicencia = $numLicencia;
    }

    public function getNomEmpleado() {
        return $this->nomEmpleado;
    }
    public function setNomEmpleado($nomEmpleado) {
        $this-> nomEmpleado = $nomEmpleado;
    }
    public  function getApeEmpleado () {
        return $this->apeEmpleado;
    }
    public function setApeEmpleado($apeEmpleado) {
        $this-> apeEmpleado = $apeEmpleado;
    }
    
    
}