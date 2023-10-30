# Sistema de Gestión de Biblioteca en PHP

Este proyecto es un sistema de gestión de biblioteca que utiliza clases y objetos en PHP. El sistema permite realizar las siguientes operaciones:

## Clases

### Clase Libro
La clase `Libro` tiene las siguientes propiedades:
- Título del libro.
- Autor del libro.
- Número de páginas.
- Número de ejemplares disponibles.

### Clase Biblioteca
La clase `Biblioteca` tiene un arreglo privado para almacenar objetos de la clase `Libro`. La clase `Biblioteca` tiene los siguientes métodos:
- `agregarLibro($libro)`: Este método recibe un objeto de la clase `Libro` y lo agrega al arreglo de libros de la biblioteca.
- `prestarLibro($titulo)`: Este método recibe el título de un libro y reduce en uno el número de ejemplares disponibles de ese libro.
- `devolverLibro($titulo)`: Este método recibe el título de un libro y aumenta en uno el número de ejemplares disponibles de ese libro.
- `listarLibros()`: Este método muestra una lista de todos los libros en la biblioteca con sus respectivos detalles (título, autor, número de páginas y número de ejemplares disponibles).

## Uso
1. Crea instancias de la clase `Libro` para representar varios libros y agrégalos a la biblioteca utilizando el método `agregarLibro`.
2. Realiza préstamos y devoluciones de libros utilizando los métodos `prestarLibro` y `devolverLibro`.
3. Finalmente, muestra la lista de libros en la biblioteca utilizando el método `listarLibros`.
