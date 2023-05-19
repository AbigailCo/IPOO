<?php
/* 5. Implementar la jerarquía de herencia que corresponda para implementar los viajes 
Nacionales e Internacionales. 
Si el viaje es Nacional se
almacena porcentaje de descuento que puede ser aplicado al monto del viaje (por defecto el descuento
aplicado es del 10%).
*/
include_once 'viaje.php';

class ViajesNacionales extends Viaje
{
    private $impuesto;

    public function __construct($destino, $horaPartida, $horaLlegada, $numViaje, $montoBasico, $fecha, $cantAsientosTotales, $cantAsientosDisponibles, $objResponsable, $impuesto)
    {
        parent::__construct($destino, $horaPartida, $horaLlegada, $numViaje, $montoBasico, $fecha, $cantAsientosTotales, $cantAsientosDisponibles, $objResponsable);
        $this->impuesto = $impuesto;
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
        $importeViaje = parent:: calcularImporteViaje();
        $costoFinal = $importeViaje - ($importeViaje* $impuesto / 100);
        
        return $costoFinal;
    }

    public function __toString()
    {
        $string = parent::__toString();
        $string.= "\n\n\nVIAJE NACIONAL\nPorcentaje de descuento: " . $this->getImpuesto()."%".
        "\nMonto final: " . $this->darCostoFinal();
        return $string;

    }
    
}