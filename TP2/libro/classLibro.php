<?php
/* 16. Cree una clase Libro que tenga los atributos ISBN, titulo, año de edición, editorial, nombre y apellido
del autor. Defina en la clase los siguientes métodos
a) Método constructor _ _construct() que recibe como parámetros los valores iniciales para los atributos de la
clase.
b) Los método de acceso de cada uno de los atributos de la clase.
c) Método toString() que retorne la información de los atributos de la clase.*/

class Libro {
    private $ISBN;
    private $titulo;
    private $anoEdicion;
    private $editorial;
    private $nombreAutor;
    private $apellidoAutor;

    public function __construct($ISBN, $titulo, $anoEdicion, $editorial, $nombreAutor, $apellidoAutor) 
    {
        $this->ISBN = $ISBN;
        $this->titulo = $titulo;
        $this->anoEdicion = $anoEdicion;
        $this->editorial = $editorial;
        $this->nombreAutor = $nombreAutor;
        $this->apellidoAutor = $apellidoAutor;
    }

    public function getISBN () {
        return $this-> ISBN;
    }
    public function setISBN($ISBN) {
        $this-> ISBN = $ISBN;
    }

    public function getTitulo () {
        return $this-> titulo;
    }
    public function setTitulo($titulo) {
        $this -> titulo = $titulo;
    }
    public function getAnoEdicion () {
        return $this-> anoEdicion;
    }
    public function setAnoEdicion($anoEdicion) {
        $this -> anoEdicion = $anoEdicion;
    }

    public function getEditorial (){
        return $this-> editorial;
    }
    public function setEditorial($editorial) {
        $this -> editorial = $editorial;
    }

    public function getNombreAutor () {
        return $this-> nombreAutor;
    }
    public function setNombreAutor($nombreAutor) {
        $this-> nombreAutor = $nombreAutor;
    }
    public function getApellidoAutor() {
        return $this->apellidoAutor;
    }
    public function setApellidoAutor($apellidoAutor) {
        $this-> apellidoAutor = $apellidoAutor;
    }

    public function __toString()
    {
        $string = 'Titulo del libro: '. $this->titulo. "\nISBN: ". $this->ISBN . "\nAutor: ". $this->nombreAutor ." " . $this->apellidoAutor
        ."\nAño de edicion: ". $this->anoEdicion . "\nEditorial: ". $this->editorial . "\n";
        return $string;

    }
/*     d) perteneceEditorial($peditorial): indica si el libro pertenece a una editorial dada. Recibe como parámetro
una editorial y devuelve un valor verdadero/falso. */
    public function PerteneceEditorial($peditorial) {
        if ($peditorial == $this->editorial) {
            $respuesta= true;
        }else{
            $respuesta= false;
        }
        return $respuesta;
    }

    /* e) aniosdesdeEdicion(): método que retorna los años que han pasado desde que el libro fue editado. */
    public function aniosdesdeEdicion() {
        $respuesta = $this-> anoEdicion - 2023;
        return $respuesta;
    }



}