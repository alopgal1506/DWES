<?php
require_once 'Articulo.php';

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
        $articulo = new Articulo($_POST['codigo'], '', '', '', '');
        $articulo->delete();
    }

    if (isset($_POST['insertar'])) {
        if (Articulo::getArticuloById($_POST['codigo'])) {
            $error = 'El codigo ' . $_POST['codigo'] . " ya existe";
        } else {
            $articulo = new Articulo($_POST['codigo'], $_POST['descripcion'], $_POST['precioCompra'], $_POST['precioVenta'], $_POST['stock']);
            $articulo->insert();
        }
    }

    if (isset($_POST['actualizar'])) {
        $articulo = new Articulo($_POST['codigo'], $_POST['descripcion'], $_POST['precioCompra'], $_POST['precioVenta'], $_POST['stock']);
        $articulo->update();
    }

    if (isset($_POST['entrada'])) {
        $articulo = Articulo::getArticuloById($_POST['codigo']);
        if ($articulo && !$articulo->entradaAlmacen((int)$_POST['unidades'])) {
            $error = 'No se ha podido registrar la entrada';
        }
    }

    if (isset($_POST['salida'])) {
        $articulo = Articulo::getArticuloById($_POST['codigo']);
        if ($articulo && !$articulo->salidaAlmacen((int)$_POST['unidades'])) {
            $error = 'No hay stock suficiente del artículo ' . $_POST['codigo'];
        }
    }

    if ($error === '') {
        header('Location: prueba.php?pagina=' . $pagina);
        exit;
    }
}

$articulos = Articulo::getArticuloPaginados($inicio, $porPagina);

$editar = null;
$movimiento = null;
$accion = $_GET['accion'] ?? '';

if (isset($_GET['codigo'])) {
    if ($accion === 'entrada' || $accion === 'salida') {
        $movimiento = Articulo::getArticuloById($_GET['codigo']);
    } else {
        $editar = Articulo::getArticuloById($_GET['codigo']);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento de Articulos</title>
</head>

<body>
    <h1>Mantenimiento de Articulos</h1>

    <table border="1">
        <tr>
            <th>Código</th>
            <th>Descripción</th>
            <th>Precio de Compra</th>
            <th>Precio de venta</th>
            <th>Margen</th>
            <th>Stock</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>

        <?php foreach ($articulos as $articulo): ?>
            <tr>
                <td><?= htmlspecialchars($articulo->getCodigo()) ?></td>
                <td><?= htmlspecialchars($articulo->getDescripcion()) ?></td>
                <td><?= htmlspecialchars($articulo->getPrecioCompra()) ?></td>
                <td><?= htmlspecialchars($articulo->getPrecioVenta()) ?></td>
                <td><?= htmlspecialchars($articulo->getPrecioVenta() - $articulo->getPrecioCompra()) ?></td>
                <td><?= htmlspecialchars($articulo->getStock()) ?></td>
                <td>
                    <form action="" method="post" onsubmit="return confirm('¿Seguro que quieres eliminar al articulo con codigo <?= htmlspecialchars($articulo->getCodigo()) ?>?');">
                        <input type="hidden" name="codigo" value="<?= htmlspecialchars($articulo->getCodigo()) ?>">
                        <input type="hidden" name="pagina" value="<?= $pagina ?>">
                        <button style="background-color: #eb4d25; color: white;" type="submit" name="eliminar">Eliminar</button>
                    </form>
                </td>
                <td>
                    <a href="?codigo=<?= urlencode($articulo->getCodigo()) ?>&pagina=<?= $pagina ?>">
                        <button style="background-color: #ebd725; color: white;" type="button">Modificar</button>
                    </a>
                </td>
                <td>
                    <a href="?codigo=<?= urlencode($articulo->getCodigo()) ?>&accion=entrada&pagina=<?= $pagina ?>">
                        <button style="background-color: #4d25eb; color: white;" type="button">Entrada</button>
                    </a>
                </td>
                <td>
                    <a href="?codigo=<?= urlencode($articulo->getCodigo()) ?>&accion=salida&pagina=<?= $pagina ?>">
                        <button style="background-color: #4d25eb; color: white;" type="button">Salida</button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <?php if ($movimiento): ?>
                <form action="" method="post">
                    <td>
                        <input type="hidden" name="pagina" value="<?= $pagina ?>">
                        <input type="text" name="codigo" value="<?= htmlspecialchars($movimiento->getCodigo()) ?>" readonly>
                    </td>
                    <td><?= htmlspecialchars($movimiento->getDescripcion()) ?></td>
                    <td><?= htmlspecialchars($movimiento->getPrecioCompra()) ?></td>
                    <td><?= htmlspecialchars($movimiento->getPrecioVenta()) ?></td>
                    <td></td>
                    <td><?= htmlspecialchars($movimiento->getStock()) ?></td>
                    <td><input type="number" name="unidades" min="1" value="1" style="width:70px" required></td>
                    <td>
                        <button style="background-color: #5aeb25; color: white;" type="submit" name="<?= htmlspecialchars($accion) ?>">
                            Confirmar <?= htmlspecialchars($accion) ?>
                        </button>
                    </td>
                    <td><a href="prueba.php?pagina=<?= $pagina ?>"><button type="button" style="background-color: #eb4d25; color: white;">Cancelar</button></a></td>
                </form>

            <?php elseif ($editar): ?>
                <form action="" method="post">
                    <td>
                        <input type="hidden" name="pagina" value="<?= $pagina ?>">
                        <input type="text" name="codigo" value="<?= htmlspecialchars($editar->getCodigo()) ?>" readonly>
                    </td>
                    <td><input type="text" name="descripcion" value="<?= htmlspecialchars($editar->getDescripcion()) ?>"></td>
                    <td><input type="text" name="precioCompra" value="<?= htmlspecialchars($editar->getPrecioCompra()) ?>"></td>
                    <td><input type="text" name="precioVenta" value="<?= htmlspecialchars($editar->getPrecioVenta()) ?>"></td>
                    <td></td>
                    <td><input type="text" name="stock" value="<?= htmlspecialchars($editar->getStock()) ?>"></td>
                    <td><button style="background-color: #5aeb25; color: white;" type="submit" name="actualizar">Guardar</button></td>
                    <td><a href="prueba.php?pagina=<?= $pagina ?>"><button type="button" style="background-color: #eb4d25; color: white;">Cancelar</button></a></td>
                </form>

            <?php else: ?>
                <form action="" method="post">
                    <td>
                        <input type="hidden" name="pagina" value="<?= $pagina ?>">
                        <input type="text" name="codigo">
                    </td>
                    <td><input type="text" name="descripcion"></td>
                    <td><input type="text" name="precioCompra"></td>
                    <td><input type="text" name="precioVenta"></td>
                    <td></td>
                    <td><input type="text" name="stock"></td>
                    <td><button style="background-color: #5aeb25; color: white;" type="submit" name="insertar">Insertar</button></td>
                </form>
            <?php endif; ?>
        </tr>
    </table>

    <?php if ($error): ?>
        <p style="color:red"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if ($totalPaginas > 1): ?>
        <p>
            <?php if ($pagina > 1): ?>
                <a href="?pagina=<?= $pagina - 1 ?>">&laquo; Anterior</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <?php if ($i === $pagina): ?>
                    <strong><?= $i ?></strong>
                <?php else: ?>
                    <a href="?pagina=<?= $i ?>"><?= $i ?></a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($pagina < $totalPaginas): ?>
                <a href="?pagina=<?= $pagina + 1 ?>">Siguiente &raquo;</a>
            <?php endif; ?>
        </p>
    <?php endif; ?>
</body>

</html>