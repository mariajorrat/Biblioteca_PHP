<?php
include 'Libro.php';
include 'Biblioteca.php';

if(session_status() == PHP_SESSION_NONE){
    // session isn't started
    session_start();
}


if (!isset($_SESSION['biblioteca'])) {
    $_SESSION['biblioteca'] = new Biblioteca();
}

$biblioteca = $_SESSION['biblioteca'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['prestar'])) {
        $tituloPrestamo = $_POST['titulo_prestamo'];
        $prestamoExitoso = $biblioteca->prestarLibro($tituloPrestamo);
        if (!$prestamoExitoso) {
            echo "<p class='text-danger'>No se pudo prestar el libro. Verifica el título o la disponibilidad.</p>";
        }
    } elseif (isset($_POST['devolver'])) {
        $tituloDevolucion = $_POST['titulo_devolucion'];
        $biblioteca->devolverLibro($tituloDevolucion);
    } elseif (isset($_POST['agregar_libro'])) {
        $tituloLibro = $_POST['titulo_libro'];
        $autorLibro = $_POST['autor_libro'];
        $paginasLibro = $_POST['paginas_libro'];
        $ejemplaresLibro = $_POST['ejemplares_libro'];
        $nuevoLibro = new Libro($tituloLibro, $autorLibro, $paginasLibro, $ejemplaresLibro);
        $biblioteca->agregarLibro($nuevoLibro);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sistema de Gestión de Biblioteca</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Sistema de Gestión de Biblioteca</h1>
<br>
        <div class="row">
            <div class="col-md-8">
                <h2>1. Agregar libro</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="titulo_libro">Título del libro:</label>
                        <input type="text" class="form-control" id="titulo_libro" name="titulo_libro">
                    </div>
                    <div class="form-group">
                        <label for="autor_libro">Autor del libro:</label>
                        <input type="text" class="form-control" id="autor_libro" name="autor_libro">
                    </div>
                    <div class="form-group">
                        <label for="paginas_libro">Número de páginas:</label>
                        <input type="number" class="form-control" id="paginas_libro" name="paginas_libro">
                    </div>
                    <div class="form-group">
                        <label for="ejemplares_libro">Número de ejemplares disponibles:</label>
                        <input type="number" class="form-control" id="ejemplares_libro" name="ejemplares_libro">
                    </div>
                    <button type="submit" class="btn btn-info" name="agregar_libro">Agregar Libro</button>
                </form>
            </div>
            <div class="col-md-4">
                <br>
                <h2>2. Prestar libro</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="titulo_prestamo">Título del libro:</label>
                        <input type="text" class="form-control" id="titulo_prestamo" name="titulo_prestamo">
                    </div>
                    <button type="submit" class="btn btn-primary" name="prestar">Prestar</button>
                </form>
                <br>
                <h2>3. Devolver libro</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="titulo_devolucion">Título del libro:</label>
                        <input type="text" class="form-control" id="titulo_devolucion" name="titulo_devolucion">
                    </div>
                    <button type="submit" class="btn btn-success" name="devolver">Devolver</button>
                </form>
            </div>
        </div>
        <br>
        <hr>
        <h2>4. Lista completa de libros</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Número de páginas</th>
                    <th>Ejemplares disponibles</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($biblioteca->listarLibros() as $libro): ?>
                    <tr>
                        <td>
                            <?= $libro->getTitulo() ?>
                        </td>
                        <td>
                            <?= $libro->getAutor() ?>
                        </td>
                        <td>
                            <?= $libro->getNumPaginas() ?>
                        </td>
                        <td>
                            <?= $libro->getNumEjemplares() ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>