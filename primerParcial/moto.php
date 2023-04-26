<?php
/* En la clase Moto:
Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje incremento anual, 
activa .
*/

class Moto
{
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $incrementoAnual;
    private $activa; //(atributo que va a contener un valor true,  si la moto está  disponible para la venta  y false en caso contrario)
    /* Método constructor que recibe como parámetros los valores iniciales para los atributos  definidos en la clase.
        Los métodos de acceso de cada uno de los atributos de la clase. */
    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $incrementoAnual, $activa)
    {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->incrementoAnual = $incrementoAnual;
        $this->activa = $activa;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getCosto()
    {
        return $this->costo;
    }
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }
    public function getAnioFabricacion()
    {
        return $this->anioFabricacion;
    }
    public function setAnioFabricacion($anioFabricacion)
    {
        $this->anioFabricacion = $anioFabricacion;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getIncrementoAnual()
    {
        return $this->incrementoAnual;
    }
    public function setIncrementoAnual($incrementoAnual)
    {
        $this->incrementoAnual = $incrementoAnual;
    }

    public function getActiva()
    {
        return $this->activa;
    }
    public function setActiva($activa)
    {
        $this->activa = $activa;
    }

    public function __toString()
    {
        $string = "Moto: Código=" . $this->codigo . ", Costo=" . $this->costo . ", Año de Fabricación=" . $this->anioFabricacion . ", Descripción=" . $this->descripcion . ", Porcentaje de Incremento Anual=" . $this->incrementoAnual;
        return $string;
    }

        /* Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto. 
    Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible 
    para la venta, el método realiza el siguiente cálculo: 
    $_venta = $_compra + $_compra * (anio * por_inc_anual) 
    donde  $_compra:  es el costo de la moto.
    anio: cantidad de años transcurridos desde que se fabricó  la moto.
    por_inc_anual:  porcentaje de incremento anual de la moto. */

    public function darPrecioVenta() {
        $disponible = $this->activa;
        
        if ($disponible)
        {
            $_compra = $this->getCosto();
            $anio = 2023 - $this->getAnioFabricacion();
            $por_inc_anual = $this->getIncrementoAnual();
            $_venta = $_compra + $_compra * ($anio * $por_inc_anual);
            $resultado = $_venta;
        }else{
            $resultado = -1;
        }
        return $resultado;
    }
}
