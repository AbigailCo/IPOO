<?php
/* los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono. */

class Pasajero {
    private $nomPasajero;
    private $apePasajero;
    private $dniPasajero;
    private $telPasajero;

    public function __construct($nomPasajero, $apePasajero, $dniPasajero, $telPasajero){
        $this->nomPasajero = $nomPasajero;
        $this->apePasajero = $apePasajero;
        $this->dniPasajero = $dniPasajero;
        $this->telPasajero = $telPasajero;
    }

    public function getNomPasajero () {
        return $this->nomPasajero;
    }
    public function setNomPasajero($nomPasajero) {
        $this-> $nomPasajero = $nomPasajero;
    }

    public function getApePasajero() {
        return $this->apePasajero;
    }
    public function setApePasajero($apePasajero) {
        $this-> $apePasajero = $apePasajero;
    }

    public function getDniPasajero() {
        return $this->dniPasajero;
    }
    public function setDniPasajero($dniPasajero){
        $this->dniPasajero = $dniPasajero;
    }

    public function getTelPasajero(){
        return $this->telPasajero;
    }
    public function setTelPasajero($telPasajero){
        $this->telPasajero = $telPasajero;
    }
}