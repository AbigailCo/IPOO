<?php
/* 5. Implementar la jerarquía de herencia que corresponda para implementar los viajes 
Nacionales e Internacionales.
el viaje es internacional se debe almacenar si
requiere o no documentación adicional y el porcentaje correspondiente a 
impuestos que deben ser aplicados al costo del viaje (por defecto el valor aplicado es del 45%).  */

include_once 'viaje.php';
class ViajesInternacionales extends Viaje
{
    private $docAdicional;
    private $impuesto;

    public function __construct($destino, $horaPartida, $horaLlegada, $numViaje, $montoBasico, $fecha, $cantAsientosTotales, $cantAsientosDisponibles, $objResponsable, $docAdicional, $impuesto)
    {
        parent::__construct($destino, $horaPartida, $horaLlegada, $numViaje, $montoBasico, $fecha, $cantAsientosTotales, $cantAsientosDisponibles, $objResponsable);
        $this->docAdicional = $docAdicional;
        $this->impuesto = $impuesto;
    }

    public function getDocAdicional()
    {
        return $this->docAdicional;
    }

    public function setDocAdicional($docAdicional)
    {
        $this->docAdicional = $docAdicional;
    }

    public function getImpuesto()
    {
        return $this->impuesto;
    }

    public function setImpuesto($impuesto)
    {
        $this->impuesto = $impuesto;
    }
    /* 7. Redefinir el método que permite calcular el importe de un viaje según corresponda. */
    public function darCostoFinal (){
        $impuesto = $this->getImpuesto();
        $importeViaje = $this->calcularImporteViaje();
        $costoFinal = $importeViaje + ($importeViaje* $impuesto / 100);
        return $costoFinal;
    }

    public function __toString()
    {
    
        $string = parent::__toString();

        $string.= "\n\nVIAJE INTERNACIONAL\nImpuesto: " . $this->impuesto."%"."\n:Costo final: " . $this->darCostoFinal();
        $infoAd = $this->docAdicional;
        if ($infoAd == 1){
            $string.= "\nNecesita acercar documentacion a la hora del embarque";
        }else{
            $string.= "\nNo necesita acercar documentacion a la hora del embarque";
        }
        
        return $string;

    }
}
