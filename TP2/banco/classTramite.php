<?php
/* Un trámite tiene un horario de creación y un horario de resolución. */
class Tramite
{
    private $tipoTramite;
    private $creacion;
    private $resolucion;

    public function __construct ($tipoTramite, $creacion, $resolucion){
        $this->tipoTramite = $tipoTramite;
        $this->creacion = $creacion;
        $this->resolucion = $resolucion;
    }
    
    public function getTipoTramite () {
        return $this->tipoTramite;
    }
    public function setTipoTramite  ($tipoTramite) {
        $this -> tipoTramite = $tipoTramite;
    }

    public function getCreacion (){
        return $this->creacion;
    }
    public function setCreacion ($creacion) {
        $this->creacion = $creacion;
    }

    public function getResolucion (){
        return $this->resolucion;
    }
    public function setResolucion ($resolucion) {
        $this-> resolucion = $resolucion;
    }
}