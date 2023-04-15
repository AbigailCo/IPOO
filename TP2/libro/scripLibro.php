<?php
include_once 'classLibro.php';
/* f) Cree un script TestLibro que:
3) cree al menos tres objetos libros e invoque a cada uno de los métodos implementados en la clase Libro. */
$libro1 = new Libro("123","Librito", 2023, "kapeluz", "Fontana", "Rosa");
$libro2 = new Libro("777", "pum", 2000, "tuki", "Fontana", "Rosa");
$libro3 = new Libro("888", "tuki", "2003", "kapeluz", "Fontana", "Rosa");


echo $libro1->__toString();
$verificacion = $libro2 -> PerteneceEditorial("kapeluz");
if ($verificacion) {
    echo "Pertenece a la editorial";
}else {
    echo "No es la misma editorial";
}
echo "\n" . $libro3 -> aniosdesdeEdicion();
/* 1) defina el método iguales($plibro,$parreglo): dada una colección de libros, indica si el libro pasado por 
parámetro ya se encuentra en dicha colección. */
function Iguales ($plibro, $pArreglo){
    $corte = false;
    for ($i=0; $i < count($pArreglo); $i++) {

        if ($pArreglo[$i] == $plibro && !$corte) {
            $corte = true;
        }
    }
    if ($corte) {
        $string = "El libro se encuentra.";
    } elseif (!$corte) {
        $string = "El libro no se encuentra.";
    }
    return $string;
}

/* 2) defina el método librodeEditoriales($arreglolibros, $peditorial): método que retorna un arreglo asociativo
con todos los libros publicados por la editorial dada. */

echo "\nCARGA DE LIBROS: ";
$arregloLibros = array();
$arregloLibros = CargarLibro($arregloLibros);
function CrearLibro (){
    echo "CODIGO DE LIBRO: ";
    $ISBN = trim (fgets(STDIN));
    echo "\nTITULO: ";
    $titulo = trim (fgets(STDIN));
    echo "\nAño de edicion: ";
    $anioEdicion= trim (fgets(STDIN));
    echo "\nEDITORIAL: ";
    $editorial = trim (fgets(STDIN));
    echo "\nNombre del autor: ";
    $nomAutor = trim (fgets(STDIN));
    echo "\nApellido del autor: ";
    $apeAutor = trim (fgets(STDIN));
    $nuevoLibro = new Libro($ISBN, $titulo, $anioEdicion, $editorial, $nomAutor, $apeAutor);
    return $nuevoLibro;
}
function CargarLibro($pArregloLibros) {
    do {
        echo "Quiere crear un libro: (S/N)";
        $decision = trim(fgets(STDIN));
        if ($decision == "s") {
            $nuevoLibro = CrearLibro();
            array_push ($pArregloLibros, $nuevoLibro);
        }
    } while ($decision == "s");
    
    return $pArregloLibros;
}

function LibroDeEditoriales ($pArregloLibros, $pEditorial){
    $librosEncontrados = array();
    for ($i=0; $i <count($pArregloLibros); $i++) { 
        $libro = $pArregloLibros[$i];
        if ($libro->getEditorial() == $pEditorial) {
            
            array_push($librosEncontrados, $libro);
        }
    }
    return $librosEncontrados;
}
array_push($arregloLibros, $libro1);
array_push ($arregloLibros, $libro2);
array_push ($arregloLibros, $libro3 );
echo "\nLibros encontrados: ";
$librosEncontrados = LibroDeEditoriales($arregloLibros, "kapeluz");
print_r ($librosEncontrados);