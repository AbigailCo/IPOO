<?php
/* Se registra la siguiente información: destino, hora de partida, hora de llegada, número,
importe, fecha, cantidad de asientos totales, cantidad de asientos disponibles, y una
referencia a la persona responsable del viaje.*/
class Viaje
{
    private $destino;
    private $horaPartida;
    private $horaLlegada;
    private $numViaje;
    private $importe;
    private $fecha;
    private $cantAsientosTotales;
    private $cantAsientosDisponibles;
    private $responsable; //Obj de clase responsable
    /*     2. Método constructor que recibe como parámetros los valores iniciales para los atributos
    definidos en la clase. */
    public function __construct($destino, $horaPartida, $horaLlegada, $numViaje, $importe, $fecha, $cantAsientosTotales, $cantAsientosDisponibles, $responsable)
    {
        $this->destino = $destino;
        $this->horaPartida = $horaPartida;
        $this->horaLlegada = $horaLlegada;
        $this->numViaje = $numViaje;
        $this->importe = $importe;
        $this->fecha = $fecha;
        $this->cantAsientosTotales = $cantAsientosTotales;
        $this->cantAsientosDisponibles = $cantAsientosDisponibles;
        $this->responsable = $responsable;
    }
    /* 3. Los métodos de acceso de cada uno de los atributos de la clase. */
    public function getDestino()
    {
        return $this->destino;
    }
    public function setDestino($destino)
    {
        $this->destino = $destino;
    }
    public function gethoraPartida()
    {
        return $this->horaPartida;
    }
    public function sethoraPartida($horaPartida)
    {
        $this->horaPartida = $horaPartida;
    }
    public function gethoraLlegada()
    {
        return $this->horaLlegada;
    }
    public function sethoraLlegada($horaLlegada)
    {
        $this->horaLlegada = $horaLlegada;
    }
    public function getnumViaje()
    {
        return  $this->numViaje;
    }
    public function setnumViaje($numViaje)
    {
        $this->numViaje = $numViaje;
    }
    public function getimporte()
    {
        return $this->importe;
    }
    public function setimporte($importe)
    {
        $this->importe = $importe;
    }

    public function getfecha()
    {
        return  $this->fecha;
    }
    public function setfecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function getcantTotal()
    {
        return $this->cantAsientosTotales;
    }
    public function setcantTotal($cantAsientosTotales)
    {
        $this->cantAsientosTotales = $cantAsientosTotales;
    }
    public function getcantDisponible()
    {
        return $this->cantAsientosDisponibles;
    }
    public function setcantDisponible($cantAsientosDisponibles)
    {
        $this->cantAsientosDisponibles = $cantAsientosDisponibles;
    }
    public function getresponsable()
    {
        return $this->responsable;
    }
    public function setresponsable($responsable)
    {
        $this->responsable = $responsable;
    }

    /*  Redefinir el método _toString para que retorne la información de los atributos de la
    clase. */
    public function __toString()
    {
        $strig = "\nINFORMACION DEL VIAJE: " . "\nDestino: " . $this->destino . "\nHora de partida:" . $this->horaPartida .
            "\nHora de llegada: " . $this->horaLlegada . "\nNumero de vieje: " . $this->numViaje . "\nIMPORTE: " . $this->importe .
            "\nFecha de partida: " . $this->fecha . "\nCantidad de Asientos Totales: " . $this->cantAsientosTotales .
            "\nCantidad de Asientos Disponibles: " . $this->cantAsientosDisponibles . "\nResponsable del viaje: " . $this->responsable;

        return $strig;
    }


    /*     5. Implementar el método asignarAsientosDisponibles($catAsientos) que recibe por
    parámetros la canti- dad de asientos que desean asignarse. El método retorna
    verdadero en caso que la asignación pueda concretarse y falso en caso contrario. */

    public function asignarAsientosDisponibles($cantAsientos){
        if($cantAsientos<= $this->cantAsientosDisponibles){
            $respuesta= true;
        }else{
            $respuesta = false;
        }
        return $respuesta;
    }

    
    public function cantAsientosVendidos(){
        $asientosVendidos = $this->cantAsientosTotales - $this->cantAsientosDisponibles;
        return $asientosVendidos;
    }
    public function venderAsientos($cantAsientos){
        
        $cantAsientosDisponibles = $this-> cantAsientosDisponibles - $cantAsientos;
        $this->setcantDisponible($cantAsientosDisponibles);
    }
}
