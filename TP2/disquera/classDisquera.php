<?php
/* 2. Implementar una clase Disquera con los atributos: hora_desde y hora_hasta (que indican el horario de
atención de la tienda), estado (abierta o cerrada), dirección y dueño. El atributo dueño debe referenciar a un
objeto de la clase Persona implementada en el punto 1.*/



class Disquera {
    private $hora_desde;
    private $hora_hasta;
    private $estado;
    private $direccion;
    private $dueño;
    /*  a) Método constructor _ _construct () que recibe como parámetros los valores iniciales para los atributos
    de la clase. */
    public function __construct($hora_desde, $hora_hasta, $estado, $direccion, $dueño){
        $this -> hora_desde = $hora_desde;
        $this -> hora_hasta = $hora_hasta;
        $this -> estado = $estado;
        $this -> direccion = $direccion;
        $this -> dueño = $dueño;
    }
    /*  b) Los métodos de acceso de cada uno de los atributos de la clase. */
    public function getHora_Desde () {
        return $this -> hora_desde;
    }
    public function setHora_Desde ($hora_desde) {
        $this -> hora_desde = $hora_desde;
    }

    public function getHora_Hasta () {
        return $this -> hora_hasta;
    }
    public function setHora_Hasta ($hora_hasta){
        $this -> hora_hasta = $hora_hasta;
    }

    public function getEstado (){
        return $this -> estado;
    }
    public function setEstado ($estado){
        $this -> estado = $estado;
    }

    public function getDireccion (){
        return $this -> direccion;
    }
    public function setDireccion ($direccion){
        $this -> direccion = $direccion;
    }

    public function getDueño (){
        return $this -> dueño;
    }
    public function setDueño ($dueño) {
        $this -> dueño = $dueño;
    }
   /*  c) dentroHorarioAtencion($hora,$minutos): que dada una hora y minutos retorna true si la tienda debe
    encontrarse abierta en ese horario y false en caso contrario. */
    public function DentroHorarioAtencion ($hora){
        if ($hora >= $this -> hora_desde && $hora <= $this -> hora_hasta) {
            $abierto = true;
        }else{
            $abierto = false;
        }
        return $abierto;
    }
   /*  d) abrirDisquera($hora,$minutos): que dada una hora y minutos corrobora que se encuentra dentro del
    horario de atención y cambia el estado de la disquera solo si es un horario válido para su apertura. */
    public function AbrirDisquera ($hora){
        if ($hora >= $this-> hora_desde && $hora <= $this-> hora_hasta) {
            $estado = "Abierto";
            $this -> setEstado($estado);
            return $this -> estado;
        }
    }
    /* e) cerrarDisquera($hora,$minutos): que dada una hora y minutos corrobora que se encuentra fuera del
    horario de atención y cambia el estado de la disquera solo si es un horario válido para su cierre. */
    public function CerrarDisquera ($hora){
        if ($hora <= $this->hora_desde || $hora >= $this->hora_hasta){
            $estado = "Cerrado";
            $this -> setEstado($estado);
            return $this -> estado;
        }

    }
   /*  f) Redefinir el método _ _toString() para que retorne la información de los atributos de la clase. */
   public function __toString()
   {
    $string = "DISQUERA \nAbierto desde: ". $this->hora_desde . " hasta: ". $this->hora_hasta . "\n".
    "Se encuenta: ". $this->estado . "\n DIRECCION: ". $this->direccion. "\n". "DUEÑOS: " . $this->dueño;
    return $string;
   }
}