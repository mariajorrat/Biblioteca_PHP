<?php
class Libro {
    private $titulo;
    private $autor;
    private $numPaginas;
    private $numEjemplares;

    public function __construct($titulo, $autor, $numPaginas, $numEjemplares) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->numPaginas = $numPaginas;
        $this->numEjemplares = $numEjemplares;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getNumPaginas() {
        return $this->numPaginas;
    }

    public function getNumEjemplares() {
        return $this->numEjemplares;
    }

    public function restarEjemplar() {
        $this->numEjemplares--;
    }

    public function incrementarEjemplar() {
        $this->numEjemplares++;
    } 
}   
?>