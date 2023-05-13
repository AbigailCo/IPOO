<?php
/* Defina una clase Banco con las siguiente variables instancias:
1. coleccionCuentaCorriente: variable que contiene una colección de instancias de la clase
Cuentas Corrientes.
2. coleccionCajaAhorro: variable que contiene una colección de instancias de la clase Caja de Ahorro .
3. ultimoValorCuentaAsignado: variable que contiene el ultimo valor asignado a una cuenta del banco.
4. coleccionCliente: variable que contiene una colección de instancias de la clase Cliente */
class Banco {
    private $coleccionCuentasCorrientes;
    private $coleccionCajaAhorro;
    private $ultimoValorCuentaAsignado;
    private $coleccionClientes;

    public function __construct($coleccionCuentasCorrientes, $coleccionCajaAhorro, $ultimoValorCuentaAsignado, $coleccionClientes)
    {
        $this -> coleccionCuentasCorrientes = $coleccionCuentasCorrientes;
        $this -> coleccionClientes = $coleccionClientes;
        $this -> coleccionCajaAhorro = $coleccionCajaAhorro;
        $this -> ultimoValorCuentaAsignado = $ultimoValorCuentaAsignado;
    }
    
    public function getColeccionCuentasCorrientes()
    {
        return $this->coleccionCuentasCorrientes;
    }

    public function setColeccionCuentasCorrientes($coleccionCuentasCorrientes)
    {
        $this->coleccionCuentasCorrientes = $coleccionCuentasCorrientes;
    }

    public function getColeccionCajaAhorro()
    {
        return $this->coleccionCajaAhorro;
    }

    public function setColeccionCajaAhorro($coleccionCajaAhorro)
    {
        $this->coleccionCajaAhorro = $coleccionCajaAhorro;

    }

    public function getUltimoValorCuentaAsignado()
    {
        return $this->ultimoValorCuentaAsignado;
    }

    public function setUltimoValorCuentaAsignado($ultimoValorCuentaAsignado)
    {
        $this->ultimoValorCuentaAsignado = $ultimoValorCuentaAsignado;

        
    }
    public function getColeccionClientes()
    {
        return $this->coleccionClientes;
    }
    public function setColeccionClientes($coleccionClientes)
    {
        $this->coleccionClientes = $coleccionClientes;
    }

    public function __toString()
    {
        $string= "\nCuentas corrientes:\n";
        $coleccionCuentasCorrientes = $this-> getColeccionCuentasCorrientes();
        for ($i = 0; $i < count($coleccionCuentasCorrientes); $i++) {
            $datosCuenta = $coleccionCuentasCorrientes[$i];
            $string .= "\nCuenta Corriente nº " . $i + 1 . "\n" . $datosCuenta->__toString() . "\n";
        }
        $coleccionCajaAhorro = $this-> getColeccionCajaAhorro();
        for ($i = 0; $i < count($coleccionCajaAhorro); $i++) {
            $datosCuenta = $coleccionCajaAhorro[$i];
            $string .= "\nCaja Ahorro nº " . $i + 1 . "\n" . $datosCuenta->__toString() . "\n";
        }
        $coleccionClientes = $this -> getColeccionClientes();
        for ($i = 0; $i < count($coleccionClientes); $i++) {
            $datosCliente = $coleccionClientes[$i];
            $string .= "\nCliente nº " . $i + 1 . "\n" . $datosCliente->__toString() . "\n";
        }

        $string .= "\nUltimo valor asignado " . $this -> ultimoValorCuentaAsignado;
        return $string;
    }
    
   /*      En la clase Banco defina e implemente los siguientes métodos:
    1. incorporarCliente(objCliente): permite agregar un nuevo cliente al Banco*/

    public function incorporarCliente ($objCliente){
        $coleccionClientes = $this-> getColeccionClientes();
        array_push($coleccionClientes,$objCliente);
        $this -> setColeccionClientes($coleccionClientes);
    }
    /* 2. incorporarCuentaCorriente(numeroCliente, montoDescubierto): Agregar una nueva
    Cuenta a la colección de cuentas, verificando que el cliente dueño de la cuenta es cliente
    del Banco. */
    public function incorporarCuentaCorriente ($numCliente, $montoDescubirto){
        $coleccionClientes = $this-> getColeccionClientes();
        $coleccionCuentasCorrientes = $this-> getColeccionCuentasCorrientes();

        $encontrado = false;
        $i = 0;
        while ($i < count($coleccionClientes) && !$encontrado) {
            $clienteEvaluar = $coleccionClientes[$i];
            $numClienteEvaluar = $clienteEvaluar -> getNumCliente();
            if ($numClienteEvaluar == $numCliente) {
                $encontrado = true;
                $nuevaCuenta = new CuentaCorriente($montoDescubirto,count($coleccionCuentasCorrientes),$clienteEvaluar, 0);
                array_push ($coleccionCuentasCorrientes, $nuevaCuenta);
                $this-> setColeccionCuentasCorrientes($coleccionCuentasCorrientes);
            }
            $i++;
        }
    }
    /* 3. incorporarCajaAhorro(numeroCliente):Agregar una nueva Caja de Ahorro a la colección de cajas
    de ahorro, verificando que el cliente dueño de la cuenta es cliente del Banco. */
    public function incorporarCajaAhorra ($numCliente){
        $coleccionClientes = $this-> getColeccionClientes();
        $encontrado = false;
        $i = 0;
        while ($i < count($coleccionClientes) && !$encontrado) {
            $clienteEvaluar = $coleccionClientes[$i];
            $numClienteEvaluar = $clienteEvaluar -> getNumCliente();
            if ($numClienteEvaluar == $numCliente) {
                $encontrado = true;
                $coutColeccion = count($coleccionClientes);
                $nuevaCuenta = new CajaAhorro($coutColeccion, $clienteEvaluar, 0);
                array_push ($coleccionCajaAhorro, $nuevaCuenta);
                $this-> setColeccionCajaAhorro($coleccionCajaAhorro);
            }
            $i++;
        }
    }
   /*  4. realizarDeposito(numCuenta,monto): Dado un número de Cuenta y un monto, realizar depósito. */
   public function realiarDeposito($numCuenta, $monto) {
        $coleccionCajaAhorro = $this-> getColeccionCajaAhorro();
        $coleccionCuentasCorrientes = $this-> getColeccionCuentasCorrientes();
        $cuentas = array_merge($coleccionCajaAhorro,$coleccionCuentasCorrientes);
        $encontrado = false;
        $i = 0;
        while ($i < count($cuentas) && !$encontrado) {
            $cuentaEvaluar = $cuentas[$i];
            $numCuentaEvaluar = $cuentaEvaluar -> getNumCuenta();
            if ($numCuentaEvaluar == $numCuenta) {
                $encontrado = true;
                $cuentaEvaluar -> realizarDeposito($monto);
            }
            $i++;
        }
   }
  /*  5. realizarRetiro(numCuenta,monto): Dado un número de Cuenta y un monto, realizar retiro. */
    public function realizarRetiro ($numCuenta, $monto) {
        $coleccionCajaAhorro = $this-> getColeccionCajaAhorro();
        $coleccionCuentasCorrientes = $this-> getColeccionCuentasCorrientes();
        $cuentas = array_merge($coleccionCajaAhorro,$coleccionCuentasCorrientes);
        $encontrado = false;
        $i = 0;
        while ($i < count($cuentas) && !$encontrado) {
            $cuentaEvaluar = $cuentas[$i];
            $numCuentaEvaluar = $cuentaEvaluar -> getNumCuenta();
            if ($numCuentaEvaluar == $numCuenta) {
                $encontrado = true;
                $cuentaEvaluar -> realizarRetiro($monto);
            }
            $i++;
        }
    }

}