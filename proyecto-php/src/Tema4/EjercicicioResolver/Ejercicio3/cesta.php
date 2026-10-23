<?php
session_start();

/* Quitar una unidad */
if (isset($_POST['eliminar'])) {
    $nombre = $_POST['eliminar'];

    if (isset($_SESSION['cesta'][$nombre])) {
        $_SESSION['cesta'][$nombre]['cantidad']--;

        if ($_SESSION['cesta'][$nombre]['cantidad'] <= 0) {
            unset($_SESSION['cesta'][$nombre]);
        }

        /* Actualizamos la cookie */
        setcookie('cesta', json_encode($_SESSION['cesta']), time() + 60 * 60 * 24 * 30, '/');
    }

    header('Location: cesta.php');
    exit;
}

/* Vaciar la cesta entera */
if (isset($_POST['vaciar'])) {
    $_SESSION['cesta'] = [];
    setcookie('cesta', '', time() - 3600, '/');

    header('Location: cesta.php');
    exit;
}

$totalProductos = 0;
$totalImporte = 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta</title>
</head>
<body>

<table border="1">
    <tr>
        <th colspan="4">PRODUCTOS EN TU CESTA</th>
    </tr>

    <?php if (empty($_SESSION['cesta'])): ?>
        <tr>
            <td colspan="4">La cesta está vacía.</td>
        </tr>
    <?php else: ?>

        <?php foreach ($_SESSION['cesta'] as $nombre => $item):
            $precio = $_SESSION['productos'][$nombre]['precio'];
            $totalProductos += $item['cantidad'];
            $totalImporte += $precio * $item['cantidad'];
        ?>
        <tr>
            <td><?php echo htmlspecialchars($nombre); ?></td>
            <td><?php echo $item['cantidad']; ?></td>
            <td>
                <img src="<?php echo htmlspecialchars($item['imagen']); ?>" width="100" alt="<?php echo htmlspecialchars($nombre); ?>">
                <br>
                <?php echo htmlspecialchars($nombre); ?>
                <br>
                <?php echo $precio; ?> euros
            </td>
            <td>
                <form method="post">
                    <button type="submit" name="eliminar" value="<?php echo htmlspecialchars($nombre); ?>">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>

        <tr>
            <td>Total</td>
            <td><?php echo $totalProductos; ?></td>
            <td><?php echo $totalImporte; ?></td>
            <td>
                <form method="post">
                    <button type="submit" name="vaciar">VACIAR CESTA</button>
                </form>
            </td>
        </tr>

    <?php endif; ?>

    <tr>
        <td colspan="4">
            <form method="get" action="Ejercicio3.php">
                <button type="submit">Volver a la tienda</button>
            </form>
        </td>
    </tr>
</table>

</body>
</html>