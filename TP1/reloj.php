<?php
/**Diseñar e implementar la clase Reloj que simule el comportamiento de un cronómetro digital
(con los comportamientos: puesta_a_cero, incremento, etc.). Cuando el contador llegue a 23:59:59 y
reciba el mensaje de incremento deberá pasar a 00:00:00. */

class Reloj {
    private $horas;
    private $minutos;
    private $segundos;

    public function __construct ($horas, $minutos, $segundos){
        $this -> horas = $horas;
        $this -> minutos = $minutos;
        $this -> segundos = $segundos;    
    }

    public function getHoras(){
        return $this -> horas;
    }
    public  function getMinutos(){
        return  $this -> minutos;
    }
    public function getSegundos(){
        return $this -> segundos;
    }
    public function setHoras ($horas){
        $this -> horas = $horas;
    }
    public function setMinutos ($minutos){
        $this -> minutos = $minutos;
    }
    public function setSegundos ($segundos){
        $this -> segundos = $segundos;    
    }

    public function __toString()
    {
        return "Hora: " . $this->horas . " : " . $this->minutos . " : " . $this->segundos;
    }
    public function puesta_a_cero (){
        $this -> setHoras(0);
        $this -> setMinutos(0);
        $this -> setSegundos (0);
    }

    public function incremento (){
        $valorH =   $this -> getHoras();
        $valorM = $this -> getMinutos();
        $valorS = $this -> getSegundos();

        $valorS ++;
        if ($valorS <= 59) {
            $this -> setSegundos($valorS);
        }else{
            $this -> setSegundos(0);
            $valorM ++;
            if ($valorM <= 59) {
                $this -> setMinutos($valorM);
            }else{
                $this -> setMinutos(0);
                $valorH ++;
                if ($valorH <= 23){
                    $this->setHoras($valorH);
                }else{
                    $this->setHoras(0);
                }
            }
        }

    }

}

//PRINCIPAL
$obRejor = new Reloj(23,59,58);
echo "\n" .$obRejor;

$obRejor -> incremento();
echo "\n". $obRejor;

$obRejor -> incremento();
echo "\n ". $obRejor;

$obRejor -> incremento();
echo "\n ". $obRejor;

$obRejor -> puesta_a_cero();
echo "\n El reloj se pondra en 0 \n". $obRejor;