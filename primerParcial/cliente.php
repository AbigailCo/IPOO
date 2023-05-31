<?php
/* En la clase Cliente:
Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de documento.
 Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
Método constructor que recibe como parámetros los valores iniciales para los atributos.
Los métodos de acceso de cada uno de los atributos de la clase.
Redefinir el método _toString  para que retorne la información de los atributos de la clase.*/


class Cliente {
    private $nomCliente;
    private $apeCliente;
    private $baja;
    private $tipoDoc;
    private $numDoc;

    public function __construct($nomCliente, $apeCliente, $baja, $tipoDoc, $numDoc){
        $this->nomCliente = $nomCliente;
        $this->apeCliente = $apeCliente;
        $this->baja = $baja;
        $this->tipoDoc = $tipoDoc;
        $this->numDoc = $numDoc;
    }
    public function getNomCliente() {
        return $this->nomCliente;
    }
        
    public function setNomCliente($nomCliente) {    
        $this->nomCliente = $nomCliente;
    }
    public function getApeCliente() {    
        return $this->apeCliente;
    }
    public function setApeCliente($apeCliente) { 
        $this->apeCliente = $apeCliente;
    }
    
    public function getBaja() {    
        return $this->baja;
    }
    
    public function setBaja($baja) {
        $this->baja = $baja;
    }
    public function getTipoDoc() {      
        return $this->tipoDoc;
    }
 
    public function setTipoDoc($tipoDoc) {  
        $this->tipoDoc = $tipoDoc;
        }
 
    public function getNumDoc() {
                return $this->numDoc;
        }
 
        public function setNumDoc($numDoc) {
        
        $this->numDoc = $numDoc;
        }
      
    public function __toString()
    {
        $string= "\nNombre de Cliente: ". $this->getNomCliente() . "\nApellido de Cliente: ". $this->getApeCliente()
     . "\nTipo y numero de Documento: ". $this->getTipoDoc() . "\n". $this->getNumDoc();
     if($this->getBaja()){
        $string.= "\nEstado de baja: Activado";
     }else{
        $string .= "\nEstado de bajo: Desactivado";
     }
    return $string;
    }

    /* Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja. */
        
}