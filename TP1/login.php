<?php

use PgSql\Lob;

/**Implementar una clase Login que almacene el nombreUsuario, contraseña, frase que permite 
recordar la contraseña ingresada y las ultimas 4 contraseñas utilizadas. Implementar un método que 
permita validar una contraseña con la almacenada y un método para cambiar la contraseña actual por otra 
nueva, el sistema deja cambiar la contraseña siempre y cuando esta no haya sido usada recientemente (es
decir no se encuentra dentro de las cuatro almacenadas). Implementar el método recordar que dado el 
usuario, muestra la frase que permite recordar su contraseña. */

class Login {
    private $nomUsuario;
    private $contrasena;
    private $frase;
    private $baul;


    public function __construct( $nomUsuario, $contrasena, $frase, $baul ) {
        $this->nomUsuario = $nomUsuario;
        $this -> contrasena = $contrasena;
        $this -> baul = $baul;
        $this -> frase = $frase;
    }

    public function getNomUsuario (){
        return $this->nomUsuario;
    }

    public function setNomUsuario ($nomUsuario) {
        return $this->nomUsuario = $nomUsuario;
    }

    public function getContrasena () {
        return $this->contrasena;
    }

    public function setContrasena ($contrasena) {
        $this ->contrasena = $contrasena;
    }
    public  function getFrase () {
        return $this->frase;
    }
    public function setFrase ($frase){
        $this ->frase = $frase;
    }
    public function getBaul () {
        return $this->baul;
    }
    public function setBaul ($baul) {
        $this ->baul = $baul;
    }
    public function __toString()
    {
        return $this-> baul;
    }

    public function Evalua (){
        $encontrada = false;
        for ($i =0; $i <= count($this -> getContrasena()) ; $i++) {
            if ($this -> getContrasena() == $this -> getBaul()[$i]) {
                $encontrada = true;
            }
        }
        return $encontrada;

    }

}

/**
 * principal
 */
$nomUsuario = "Abigail";
$contrasena = "1234";
$frase = "din";
$baul = array(
    [0] => "1234",
    [1] => "55",
    [2] => "845",
    [3] => "456",
);

$primerUsuario = new Login($nomUsuario, $contrasena, $frase , $baul);
echo    $primerUsuario;
