<?php

class Mostrador
{   
    private $numMostrador;
    private $tipoTramite;
    private $limiteClientes;
    private $colaClientes = array();
    
    /*  a) Método constructor _ _construct() que recibe como parámetros los valores iniciales para los atributos
    de las clases. */
    public function __construct($numMostrador,$tipoTramite, $limiteClientes, $colaClientes = array())
    {
        $this->numMostrador = $numMostrador;
        $this->tipoTramite = $tipoTramite;
        $this->colaClientes = $colaClientes;
        $this->limiteClientes = $limiteClientes;

    }
    /* b) Los métodos de acceso de cada uno de los atributos de las clases. */
    public function getTipoTramite()
    {
        return $this->tipoTramite;
    }
    public function setTipoTramite($tipoTramite)
    {
        $this->tipoTramite = $tipoTramite;
    }

    public function getColaClientes()
    {
        return $this->colaClientes;
    }
    public function setColaClientes($colaClientes)
    {
        $this->colaClientes = $colaClientes;
    }

    public function getLimiteClientes()
    {
        return $this->limiteClientes;
    }
    public function setLimiteClientes($limiteClientes)
    {
        $this->limiteClientes = $limiteClientes;
    }

    public function getNumMostrador()
    {
        return $this->numMostrador;
    }
    public function setNumActualClientes($numMostrador)
    {
        $this->numMostrador = $numMostrador;
    }
    /* c) Redefinir el método _ _toString() para que retorne la información de los atributos de las clases. */
    public function __toString()
    {
        $string = "MOSTRADOR NUMERO: ". $this->numMostrador. 
        "\nTramite de tipo: " . $this->tipoTramite . "\nCliente: " . $this->colaClientes . "\nLugares totales: " .
            $this->limiteClientes;
        return $string;
    }

    /* d) mostrador–>atiende($unTramite): devuelve true o false indicando si el tramite se puede atender o no
    en el mostrador; note que el tipo de trámite correspondiente a unTramite tiene que coincidir con
    alguno de los tipos de trámite que atiende el mostrador. */
    public function Atiende($unTramite)
    {
        if ($unTramite == $this-> tipoTramite) {
            $solicitud = true;
        }else {
            $solicitud = false;
        }
        return $solicitud;
    }

    public function CantidadLugar() {
        $lugarDisponible = $this->limiteClientes - count($this-> colaClientes);
        return $lugarDisponible;
    }

    public function CargarClientes($cliente){
        array_push($this->colaClientes, $cliente);
    }
}

