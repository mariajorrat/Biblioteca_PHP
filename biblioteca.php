<?php
class Biblioteca {
    private $libros = [];

    public function agregarLibro($libroNuevo) {
        foreach ($this->libros as $libro) {
            if ($libro->getTitulo() === $libroNuevo->getTitulo()) {
                echo "El libro ya existe en la biblioteca.";
                return;
            }
        }
        $this->libros[] = $libroNuevo;
    }    

    public function prestarLibro($titulo) {
        foreach ($this->libros as $libro) {
            if ($libro->getTitulo() === $titulo && $libro->getNumEjemplares() > 0) {
                $libro->restarEjemplar();
                return true;
            }
        }
        return false;
    }

    public function devolverLibro($titulo) {
        foreach ($this->libros as $libro) {
            if ($libro->getTitulo() === $titulo) {
                // Incrementa en 1 el número de ejemplares
                $libro->incrementarEjemplar();
                return true;
            }
        }
        return false;
    }
    

    public function listarLibros() {
        return $this->libros;
    }
}
?>