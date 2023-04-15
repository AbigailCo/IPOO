<?php 
/**Dada una estructura de arreglos asociativos, donde cada posición almacena un arreglo con la cantidad
recaudada (en pesos) y costo total (en pesos), en el que cada mes del año se corresponde con la posición del
arreglo dentro del otro arreglo; implementar un algoritmo que calcule cuál fue el mes que arrojó mayor
ganancia.
*/
$mesMax = 0;
$tot = 0;

$enero = ["recaudado" => 100, "total" => 400];
$febrero = ["recaudado" => 700, "total" =>10000];
$marzo = ["recaudado" => 1000, "total" => 8000];

$meses[0]= $enero;
$meses[1]= $febrero;
$meses[2]= $marzo;


for ($i = 0; $i < count($meses); $i++) {
    $tot= $meses[$i]["total"];
    if ($tot > $meses[$i+1]["total"]){
        $mesMax = $meses [$i];
    }
}
echo "El mes que mas recaudo es el mes ". $selector ."  ";
print_r($mesMax);