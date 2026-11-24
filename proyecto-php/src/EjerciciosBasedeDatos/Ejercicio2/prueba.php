<?php
require_once 'Cliente.php';

$error = '';

/* ---- Paginación ---- */
$porPagina = 5;
$pagina = (int)($_POST['pagina'] ?? $_GET['pagina'] ?? 1);
if ($pagina < 1) {
    $pagina = 1;
}
$total = Cliente::contarClientes();
$totalPaginas = max(1, (int)ceil($total / $porPagina));
if ($pagina > $totalPaginas) {   // por si borras el último cliente de la última página
    $pagina = $totalPaginas;
}
$inicio = ($pagina - 1) * $porPagina;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['eliminar'])) {
        $cliente = new Cliente($_POST['dni'], '', '', '');
        $cliente->delete();
    }

    if (isset($_POST['insertar'])) {
        if (Cliente::getClienteById($_POST['dni'])) {
            $error = 'El DNI ' . $_POST['dni'] . " ya existe";
        } else {
            $cliente = new Cliente($_POST['dni'], $_POST['nombre'], $_POST['direccion'], $_POST['telefono']);
            $cliente->insert();
        }
    }

    if (isset($_POST['actualizar'])) {
        $cliente = new Cliente($_POST['dni'], $_POST['nombre'], $_POST['direccion'], $_POST['telefono']);
        $cliente->update();
    }

    /* Si no hay error, redirigimos a la misma página de la paginación */
    if ($error === '') {
        header('Location: prueba.php?pagina=' . $pagina);
        exit;
    }
}

$clientes = Cliente::getClientesPaginados($inicio, $porPagina);

/* Caso de que se haya pulsado Modificar */
$editar = null;
if (isset($_GET['dni'])) {
    $editar = Cliente::getClienteById($_GET['dni']);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento de clientes</title>
</head>

<body>
    <h1>Mantenimiento de clientes</h1>

    <table border="1">
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th></th>
            <th></th>
        </tr>

        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= htmlspecialchars($cliente->getDni()) ?></td>
                <td><?= htmlspecialchars($cliente->getNombre()) ?></td>
                <td><?= htmlspecialchars($cliente->getDireccion()) ?></td>
                <td><?= htmlspecialchars($cliente->getTelefono()) ?></td>
                <td>
                    <form action="" method="post" onsubmit="return confirm('¿Seguro que quieres eliminar al cliente <?= htmlspecialchars($cliente->getDni()) ?>?');">
                        <input type="hidden" name="dni" value="<?= htmlspecialchars($cliente->getDni()) ?>">
                        <input type="hidden" name="pagina" value="<?= $pagina ?>">
                        <button style="background-color: #eb4d25; color: white;" type="submit" name="eliminar">Eliminar</button>
                    </form>
                </td>
                <td>
                    <a href="?dni=<?= urlencode($cliente->getDni()) ?>&pagina=<?= $pagina ?>">
                        <button style="background-color: #ebd725; color: white;" type="button">Modificar</button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <?php if ($editar): ?>
                <form action="" method="post">
                    <td>
                        <input type="hidden" name="pagina" value="<?= $pagina ?>">
                        <input type="text" name="dni" value="<?= htmlspecialchars($editar->getDni()) ?>" readonly>
                    </td>
                    <td><input type="text" name="nombre" value="<?= htmlspecialchars($editar->getNombre()) ?>"></td>
                    <td><input type="text" name="direccion" value="<?= htmlspecialchars($editar->getDireccion()) ?>"><br></td>
                    <td><input type="text" name="telefono" value="<?= htmlspecialchars($editar->getTelefono()) ?>"><br></td>
                    <td><button style="background-color: #5aeb25; color: white;" type="submit" name="actualizar">Guardar</button></td>
                    <td><button style="background-color: #eb4d25; color: white;" type="submit" name="cancelar">Cancelar</button></td>
                </form>

            <?php else: ?>
                <form action="" method="post">
                    <td>
                        <input type="hidden" name="pagina" value="<?= $pagina ?>">
                        <input type="text" name="dni">
                    </td>
                    <td><input type="text" name="nombre"></td>
                    <td><input type="text" name="direccion"></td>
                    <td><input type="text" name="telefono"></td>
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