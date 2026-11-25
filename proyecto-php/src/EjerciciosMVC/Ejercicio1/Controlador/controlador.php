<?php
// CORREGIDO: ruta al modelo (antes 'Articulo.php' no se encontraba desde esta carpeta)
require_once __DIR__ . '/../Modelo/Articulo.php';

$error = '';
$porPagina = 5;
$pagina = (int)($_POST['pagina'] ?? $_GET['pagina'] ?? 1);
if ($pagina < 1) {
    $pagina = 1;
}
$total = Articulo::contarArticulos();
$totalPaginas = max(1, (int)ceil($total / $porPagina));
if ($pagina > $totalPaginas) {
    $pagina = $totalPaginas;
}
$inicio = ($pagina - 1) * $porPagina;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['eliminar'])) {
        $articulo = new Articulo('', '', (int)$_POST['identificador']);
        $articulo->delete();
    }

    if (isset($_POST['insertar'])) {
        $titulo = trim($_POST['titulo'] ?? '');
        $contenido = trim($_POST['contenido'] ?? '');
        if ($titulo === '' || $contenido === '') {
            $error = 'El título y el contenido son obligatorios';
        } else {
            $articulo = new Articulo($titulo, $contenido);
            $articulo->insert();
        }
    }

    if (isset($_POST['actualizar'])) {
        $titulo = trim($_POST['titulo'] ?? '');
        $contenido = trim($_POST['contenido'] ?? '');
        if ($titulo === '' || $contenido === '') {
            $error = 'El título y el contenido son obligatorios';
        } else {
            $articulo = new Articulo($titulo, $contenido, (int)$_POST['identificador'], $_POST['fechaPublicacion']);
            $articulo->update();
        }
    }

    if ($error === '') {
        header('Location: controlador.php?pagina=' . $pagina);
        exit;
    }
}

$articulos = Articulo::getArticuloPaginados($inicio, $porPagina);

$editar = null;
if (isset($_GET['identificador'])) {
    $editar = Articulo::getArticuloById($_GET['identificador']);
}

// El controlador es quien carga la vista
require_once __DIR__ . '/../Vista/vista.php';