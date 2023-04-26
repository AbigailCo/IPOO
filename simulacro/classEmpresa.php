<?php
/* 1. Se registra la siguiente información: identificación, nombre y la colección de Viajes que
realiza.*/
class Empresa
{
    private $idEmpresa;
    private $nomEmpresa;
    private $coleccionViajes = array(); //array de obj class Viaje
    /*  2. Método constructor que recibe como parámetros los valores iniciales para los atributos. */
    public function __construct($idEmpresa, $nomEmpresa, $coleccionViajes)
    {
        $this->idEmpresa = $idEmpresa;
        $this->nomEmpresa = $nomEmpresa;
        $this->coleccionViajes = $coleccionViajes;
    }
    /*  3. Los métodos de acceso de cada uno de los atributos de la clase. */
    public function getidEmpresa()
    {
        return $this->idEmpresa;
    }
    public function setidEmpresa($idEmpresa)
    {
        $this->idEmpresa = $idEmpresa;
    }
    public function getnomEmpresa()
    {
        return $this->nomEmpresa;
    }
    public function setnomEmpresa($nomEmpresa)
    {
        $this->nomEmpresa = $nomEmpresa;
    }
    public function getcoleccionViajes()
    {
        return $this->coleccionViajes;
    }
    public function setcoleccionViajes($coleccionViajes)
    {
        $this->coleccionViajes = $coleccionViajes;
    }

    /*  4. Redefinir el método _toString para que retorne la información de los atributos de la clase. */
    public function __toString()
    {
        $string = "\Identificacion de la empresa: " . $this->idEmpresa . "\nNombre de la empresa: " . $this->nomEmpresa;
        for ($i=0; $i < count($this->coleccionViajes); $i++) { 
            $datosViaje = $this->coleccionViajes[$i];
            $string .= "\nViaje nº ". $i+1 ."\n". $datosViaje->__toString() ."\n";
        }
        return $string;
    }

    /* 5. Implementar el método darViajeADestino($elDestino) que recibe por parámetro un
   destino junto a una cantidad de asientos y retorna una colección con todos los viajes
   disponibles a ese destino. */
    public function darViajeADestino($destino, $canAsientos)
    {
        $arrayViajesDisponibles = array();
        for ($i = 0; $i < count($this->coleccionViajes); $i++) {
            $viajeEvaluar = $this->coleccionViajes[$i];
            if ($viajeEvaluar->getDestino() == $destino && $viajeEvaluar->asignarAsientosDisponibles($canAsientos)) {
                array_push($arrayViajesDisponibles, $viajeEvaluar);
            }
        }
        return $arrayViajesDisponibles;
    }

    /* 6. Implementar el método incorporarViaje($objViaje) que recibe como parámetro un viaje,
    verifica que no se encuentre registrado ningún otro viaje al mismo destino, en la misma
    fecha y con el mismo horario de partida. El método retorna verdadero si la incorporación
    del viaje se realizó correctamente y falso en caso contrario. */
    public function incorporarViaje($objViaje)
    {
        $i=0;
        $encontrado=false;
        while ($i < count($this->coleccionViajes) && !$encontrado) {
            $viajeEvaluar = $this->coleccionViajes[$i];
            if ($viajeEvaluar->getDestino() == $objViaje->getDestino()) {
                if ($viajeEvaluar->getfecha() == $objViaje->getfecha()) {
                    if ($viajeEvaluar->gethoraPartida() == $objViaje->gethoraPartida()) {
                        $encontrado = true;
                    }
                }
            }
        }
        return $encontrado;
    }
    /* Implementar el método venderViajeADestino($canAsientos, $destino, $fecha) método que
        recibe por parámetro la cantidad de asientos, el destino, una fecha y se registra la
        asignación del viaje en caso de ser posible. (invocar al método
        asignarAsientosDisponibles). El método retorna la instancia del viaje asignado o null
        en caso contrario.*/

    public function venderViajeADestino($cantAsientos, $destino, $fecha)
    {
        $unViaje = null;
        //USAR UN WHILE
        $coleccionEvaluar= $this->getcoleccionViajes();
        for ($i = 0; $i < count($coleccionEvaluar); $i++) {
            $viajeEvaluar = $coleccionEvaluar[$i];
            if ($viajeEvaluar->getDestino() == $destino && $viajeEvaluar->getfecha() == $fecha) {
                $hayLugar = $viajeEvaluar->asignarAsientosDisponibles($cantAsientos);
                if ($hayLugar) {
                    $unViaje = $viajeEvaluar;
                }
            }
        }
        return $unViaje;
    }
    /* 8. Implementar el método montoRecaudado que retorna el monto recaudado por la
    Empresa. (tener en cuenta los asientos vendidos y el importe del viaje)  */
    public function montoRecaudado() {
        $recaudacionTotal = 0;
        for ($i=0; $i < count($this->coleccionViajes); $i++) { 
            $viajeEvaluar = $this->coleccionViajes[$i];
            $importe = $viajeEvaluar->getimporte();
            $cantAsientosV= $viajeEvaluar->cantAsientosVendidos();

            $recauUnViaje = $importe*$cantAsientosV;
            $recaudacionTotal = $recaudacionTotal + $recauUnViaje;
        }
        return $recaudacionTotal;

    }

}
