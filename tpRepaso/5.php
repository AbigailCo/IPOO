<?php
/**Cree una función leerNombres, cuyo parámetro de entrada formal es una cantidad n de nombres (ciclo
denido), que solicite a un usuario los n nombres y los almacene en un arreglo indexado. aa función debe
retornar el arreglo indexado.
*/
/* Lee los numbres que pide al ususario y retorna la lista
* @param int $n
* @return array
*/

function leerNombres ($n) {
    //arreglo $nombres
    for ($i = 0; $i < $n; $i++){
        echo "Ingrese un nombre \n";
        $nombres [$i] = trim(fgets(STDIN));
    }
    return $nombres;
}

//programa principal
echo "Cuantos nombres quiere agregar? ";
$numNom = trim(fgets(STDIN));

$arrayNombre = leerNombres($numNom);
print_r($arrayNombre);