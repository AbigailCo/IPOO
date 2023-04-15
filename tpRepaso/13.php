<?php
/**Dada 2 cadenas cadena1 y cadena2 retornar la cadena de mayor longitud, invocar al método implementado
para el inciso anterior.
*/

echo "Escriba una cadena de caracteres ";
$cadena1 = trim(fgets(STDIN));
$total1= strlen ($cadena1);
echo "Escriba otra cadena de caracteres ";
$cadena2 = trim(fgets(STDIN));
$total2= strlen ($cadena2);
if ($total2<$total1){
    echo $cadena1;
}else{
    echo $cadena2;
}
