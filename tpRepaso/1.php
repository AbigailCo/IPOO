<?php
//dado un numero N retornar su factorial
//int $num $i $factor
$i=1;

echo "Escriba el numero \n";
$num = trim(fgets(STDIN));
$factor = $num;
for ($i = 1; $i < $num; $i++) {
    $factor = $factor * $i;
}

echo "El factor es: ". $factor;
