<?php
/* Se registra la siguiente información: denominación, dirección y la colección empresas
registradas en la terminal.*/
class Terminal
{
    private $denominacion;
    private $direccion;
    private $coleccionEmpresas;
    /*  2. Método constructor que recibe como parámetros los valores iniciales para los atributos
    de la clase. */
    public function __construct($denominacion, $direccion, $coleccionEmpresas)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->coleccionEmpresas = $coleccionEmpresas;
    }
    /*     3. Los métodos de acceso para cada una de las variables instancias de la clase.
    4. Redefinir el método _toString para que retorne la información de los atributos de la
    clase. */
    public function getDenominacion()
    {
        return $this->denominacion;
    }
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getColeccionEmpresas()
    {
        return $this->coleccionEmpresas;
    }

    public  function setColeccionEmpresas($coleccionEmpresas)
    {
        $this->coleccionEmpresas = $coleccionEmpresas;
    }

    public function __toString()
    {
        $string = "\nEMPRESA\nDenominacion: " . $this->denominacion . "\nDireccion: " . $this->direccion;
        $i = 0;
        for ($i = 0; $i < $this->getColeccionEmpresas(); $i++) {
            $empresaEvaluar = $this->coleccionEmpresas[$i];

            $string .= "\nEMPRESA: " . $empresaEvaluar->getnomEmpresa() .  "\nIdentificacion: " . $empresaEvaluar->getidEmpresa() . "\nDireccion: " . $empresaEvaluar->getdireccionEmpresa();
        }
        return $string;
    }


    /*     5. Implementar el método ventaAutomatica($cantAsientos, $fecha, $destino, $empresa) que
    recibe por parámetro la cantidad de asientos que se requieren, una fecha, un destino y
    la empresa con la que se desea viajar. Automáticamente se registra la venta del viaje. (Para
    la implementación de este método debe utilizarse uno de los métodos implementados en laclase Viaje). */

    public function ventaAutomatica($cantAsientos, $fecha, $destino, $empresa)
    {
        $viajeVendido = $empresa->venderViajeADestino($cantAsientos, $destino, $fecha);
        return $viajeVendido;
    }

    /*  6. Implementar el método empresaMayorRecaudacion retorna un objeto de la clase
    empresa que se co- rresponde con la de mayor recaudación.*/

    public function EmpresaMayorRecaudacion()
    {
        $montoMayor = 0;
        for ($i = 0; $i < count($this->coleccionEmpresas); $i++) {
            $empresaEvaluar = $this->coleccionEmpresas[$i];
            $monto = $empresaEvaluar->montoRecaudado();
            if ($montoMayor < $monto) {
                $montoMayor = $monto;
                $empresaMayorRecaudacion = $empresaEvaluar;
            }
        }
        return $empresaMayorRecaudacion;
    }

    /*  7. Implementar el método responsableViaje($numeroViaje) 
    que recibe por parámetro un numero de viaje y retorna al responsable del viaje.  */

    public function responsableViaje($numeroViaje)
    {
        $responsable = null;
        $i = 0;
        $encontrado = false;
        while ($i < count($this->coleccionEmpresas) && !$encontrado) {
            $empresaEvaluar = $this->coleccionEmpresas[$i];
            $coleccionViajes = $empresaEvaluar->getcoleccionViajes();
            $j = 0;
            while ($j < count($coleccionViajes) && !$encontrado) {
                $viajeEvaluar = $coleccionViajes[$i];
                if ($viajeEvaluar->getnumViaje() == $numeroViaje) {
                    $encontrado= true;
                    $responsable = $viajeEvaluar->getresponsable();
                }
            }
        }
        
        return $responsable;
    }
}
