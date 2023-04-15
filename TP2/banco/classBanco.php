<?php 

class Banco {
    private $mostradores = array();

    public function __construct($mostradores)
    {
        $this -> mostradores = $mostradores;
    }

    public function getMostradores (){
        return $this->mostradores;
    }

    public function setMostradores ($mostradores){
        $this -> mostradores = $mostradores;
    }

    public function MostradoresQueAtienden ($unTramite) 
    {
        $corte = false;
        for ($i=0; $i < count($this->mostradores); $i++) {
            $tramiteEvaluar = $this->mostradores[$i]-> tipoTramite; 
            if ($tramiteEvaluar == $unTramite){
                $corte = true;
                array_push($mostradoresAtienden, $this->mostradores [$i]);
            }
        }
        if ($corte) {
            return print_r($mostradoresAtienden);
        } elseif ($corte== false) {
            $string = "No se encontro el TRAMITE.";
            return $string;
        }
    }

    public function MejorMostradorPara ($unTramite)
    {
        $corte = false;
        $cantClientesCola = 0;
        for ($i=0; $i < count($this->mostradores); $i++) {
            $tramiteEvaluar = $this->mostradores[$i]-> tipoTramite;
            $colaEvaluar = $this->mostradores[$i]-> CantidadLugar();
            if ($tramiteEvaluar == $unTramite){
                
                if ($cantClientesCola < $colaEvaluar)
                {
                    $cantClientesCola = $colaEvaluar;
                    $mostradorConLugar = $this->mostradores [$i];
                    $corte = true;

                }
                
            }
        }
        if ($corte) {
            return $mostradorConLugar;
        } elseif ($corte== false) {
            $string = "Será antendido en cuanto haya lugar en un mostrador";
            return $string;
        }


    }
  /*   g) banco–>atender($unCliente): cuando llega un cliente al banco se lo ubica en el mostrador que atienda
el trámite que el cliente requiere, que tenga espacio y la menor cantidad de clientes esperando; si no
hay lugar en ningún mostrador debe retornar un mensaje que diga al cliente que “será antendido en
cuanto haya lugar en un mostrador” */
    public function Atender ($unCliente){
        $cliente = $this->MejorMostradorPara ($unCliente['tipoTramite']);
        return $cliente;
    }

    }