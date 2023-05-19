<?php
/* En la clase Viaje:
1. Se registra la siguiente información: destino, hora de partida, hora de llegada, 
número, monto base,fecha, cantidad de asientos totales, cantidad de asientos disponibles,
y una referencia a la personaresponsable del viaje. */

class Viaje
{
    private $destino;
    private $horaPartida;
    private $horaLlegada;
    private $numViaje;
    private $montoBasico;
    private $fecha;
    private $cantAsientosTotales;
    private $cantAsientosDisponibles;
    private $objResponsable;
    /* 2. Método constructor que recibe como parámetros los valores iniciales para los 
    atributos definidos en la clase. */
    public function __construct($destino, $horaPartida, $horaLlegada, $numViaje, $montoBasico, $fecha, $cantAsientosTotales, $cantAsientosDisponibles, $objResponsable)
    {
        $this->destino = $destino;
        $this->horaPartida = $horaPartida;
        $this->horaLlegada = $horaLlegada;
        $this->numViaje = $numViaje;
        $this->montoBasico = $montoBasico;
        $this->fecha = $fecha;
        $this->cantAsientosTotales = $cantAsientosTotales;
        $this->cantAsientosDisponibles = $cantAsientosDisponibles;
        $this->objResponsable = $objResponsable;
    }
    /*  3. Los métodos de acceso de cada uno de los atributos de la clase. */
    public function getDestino()
    {
        return $this->destino;
    }


    public function setDestino($destino)
    {
        $this->destino = $destino;
    }

    public function getHoraPartida()
    {
        return $this->horaPartida;
    }

    public function setHoraPartida($horaPartida)
    {
        $this->horaPartida = $horaPartida;
    }

    public function getHoraLlegada()
    {
        return $this->horaLlegada;
    }

    public function setHoraLlegada($horaLlegada)
    {
        $this->horaLlegada = $horaLlegada;
    }

    public function getNumViaje()
    {
        return $this->numViaje;
    }


    public function setNumViaje($numViaje)
    {
        $this->numViaje = $numViaje;
    }

    public function getMontoBasico()
    {
        return $this->montoBasico;
    }

    public function setMontoBasico($montoBasico)
    {
        $this->montoBasico = $montoBasico;
    }


    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }


    public function getCantAsientosTotales()
    {
        return $this->cantAsientosTotales;
    }


    public function setCantAsientosTotales($cantAsientosTotales)
    {
        $this->cantAsientosTotales = $cantAsientosTotales;
    }

    public function getCantAsientosDisponibles()
    {
        return $this->cantAsientosDisponibles;
    }

    public function setCantAsientosDisponibles($cantAsientosDisponibles)
    {
        $this->cantAsientosDisponibles = $cantAsientosDisponibles;
    }

    public function getObjResponsable()
    {
        return $this->objResponsable;
    }
    public function setObjResponsable($objResponsable)
    {
        $this->objResponsable = $objResponsable;
    }
    /*  4. Redefinir el método _toString para que retorne la información 
   de los atributos de la clase. */

    public function __toString()
    {
        $string = 
            "\n\n\nViaje numero " . $this->numViaje .
            "\nDESTINO " . $this->getDestino() . "\nFecha: " . $this->getFecha() .
            "\nPartida: " . $this->getHoraPartida() .
            "\nLlegada: " . $this->gethoraLlegada() .
            "\nValor basico del viaje $" . $this->getMontoBasico() .
            "\nCantidad de asientos totales: " . $this->getCantAsientosTotales() .
            "\nCantidad de asientos disponibles: " . $this->getCantAsientosDisponibles() .
            "\n\n " . $this->getObjResponsable();
            return $string;
    }
    /* 5. Implementar la jerarquía de herencia que corresponda para implementar 
   los viajes Nacionales e Internacionales. */
    /* 6. Implementar el método calcularImporteViaje() que se calcula en base al monto 
    base del viaje, la cantidad de asientos disponibles y la cantidad total de asientos. 
    El cálculo que se realiza es el siguiente:importe = monto base + 
    (monto base * asientosVendidos /asientos totales) */

    public function calcularImporteViaje(){
        $montoBasico = $this->getMontoBasico();
        $cantAsientosDisponibles = $this->getCantAsientosDisponibles();
        $cantAsientosTotales = $this->getCantAsientosTotales();
        $vendidos= $cantAsientosTotales - $cantAsientosDisponibles;
        $importe = $montoBasico + ($montoBasico*$vendidos/$cantAsientosTotales);
        return $importe;
    }
    
}
