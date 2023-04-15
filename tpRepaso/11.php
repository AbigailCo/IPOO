<?php
/**Dada 2 cadenas cadena1 y cadena2 retornar verdadero si cadena2 se encuentra en cadena1 y falso en caso
contrario.
 */

 function comparaCadenas ($cadena1, $cadena2) {
    //boobleno $respuesta
    $respuesta = str_contains($cadena1,$cadena2);
    return $respuesta;
 }

 //Principal
 echo "Escriba la primera cadena: ";
 $cade1 = trim (fgets(STDIN));
 echo "Escriba la segunda cadena: ";
 $cade2 = trim (fgets(STDIN));
 if ( comparaCadenas($cade1, $cade2)){
    echo "La segunda cadena se encuantra en la primera";
 }else {
    echo "La segunda cadena no se encuentra en la primera";
 }