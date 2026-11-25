<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento de Artículos</title>
</head>

<body>
    <h1>Mantenimiento de Artículos</h1>

    <form id="formulario" action="controlador.php" method="post"></form>

    <table border="1">
        <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Fecha de publicación</th>
            <th>Contenido</th>
            <th></th>
            <th></th>
        </tr>

        <?php foreach ($articulos as $articulo): ?>
            <tr>
                <td><?= htmlspecialchars($articulo->getIdentificador()) ?></td>
                <td><?= htmlspecialchars($articulo->getTitulo()) ?></td>
                <td><?= htmlspecialchars($articulo->getFechaPublicacion()) ?></td>
                <td><?= htmlspecialchars($articulo->getContenido()) ?></td>
                <td>
                    <form action="controlador.php" method="post" onsubmit="return confirm('¿Seguro que quieres eliminar el artículo con id <?= (int)$articulo->getIdentificador() ?>?');">
                        <input type="hidden" name="identificador" value="<?= htmlspecialchars($articulo->getIdentificador()) ?>">
                        <input type="hidden" name="pagina" value="<?= $pagina ?>">
                        <button style="background-color: #eb4d25; color: white;" type="submit" name="eliminar">Eliminar</button>
                    </form>
                </td>
                <td>
                    <a href="controlador.php?identificador=<?= urlencode($articulo->getIdentificador()) ?>&pagina=<?= $pagina ?>">
                        <button style="background-color: #ebd725; color: white;" type="button">Modificar</button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

        <tr>
            <?php if ($editar): ?>
                <td>
                    <input form="formulario" type="hidden" name="pagina" value="<?= $pagina ?>">
                    <input form="formulario" type="hidden" name="fechaPublicacion" value="<?= htmlspecialchars($editar->getFechaPublicacion()) ?>">
                    <input form="formulario" type="text" name="identificador" value="<?= htmlspecialchars($editar->getIdentificador()) ?>" readonly>
                </td>
                <td><input form="formulario" type="text" name="titulo" value="<?= htmlspecialchars($editar->getTitulo()) ?>"></td>
                <td><?= htmlspecialchars($editar->getFechaPublicacion()) ?></td>
                <td><textarea form="formulario" name="contenido" rows="3" cols="40"><?= htmlspecialchars($editar->getContenido()) ?></textarea></td>
                <td><button form="formulario" style="background-color: #5aeb25; color: white;" type="submit" name="actualizar">Guardar</button></td>
                <td><a href="controlador.php?pagina=<?= $pagina ?>"><button type="button" style="background-color: #eb4d25; color: white;">Cancelar</button></a></td>

            <?php else: ?>
                <td><input form="formulario" type="hidden" name="pagina" value="<?= $pagina ?>"></td>
                <td><input form="formulario" type="text" name="titulo"></td>
                <td></td>
                <td><textarea form="formulario" name="contenido" rows="3" cols="40"></textarea></td>
                <td><button form="formulario" style="background-color: #5aeb25; color: white;" type="submit" name="insertar">Insertar</button></td>
                <td></td>
            <?php endif; ?>
        </tr>
    </table>

    <?php if ($error): ?>
        <p style="color:red"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if ($totalPaginas > 1): ?>
        <p>
            <?php if ($pagina > 1): ?>
                <a href="controlador.php?pagina=<?= $pagina - 1 ?>">&laquo; Anterior</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <?php if ($i === $pagina): ?>
                    <strong><?= $i ?></strong>
                <?php else: ?>
                    <a href="controlador.php?pagina=<?= $i ?>"><?= $i ?></a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($pagina < $totalPaginas): ?>
                <a href="controlador.php?pagina=<?= $pagina + 1 ?>">Siguiente &raquo;</a>
            <?php endif; ?>
        </p>
    <?php endif; ?>
</body>

</html>