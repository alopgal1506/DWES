<?php
session_start();

$productos = [
    "Ratón" => [
        "precio" => 6,
        "detalle" => "Ratón Negro",
        "imagen" => "./src/raton.jpg"
    ],
    "teclado" => [
        "precio" => 11,
        "detalle" => "Teclado gamer",
        "imagen" => "./src/teclado.jpg"
    ],
    "monitor" => [
        "precio" => 80,
        "detalle" => "Monitor 25 pulgadas",
        "imagen" => "./src/monitor.png"
    ],
    "joyStick" => [
        "precio" => 33,
        "detalle" => "joyStick Gamer",
        "imagen" => "./src/joyStick.png"
    ]
];

/* Asignamos directamente los productos actualizados */
$_SESSION['productos'] = $productos;

/* Inicializamos la cesta si no existe */
if (!isset($_SESSION['cesta'])) {
    $_SESSION['cesta'] = [];
}

/* Añadimos el producto a la cesta */
if (isset($_POST['cesta'])) {
    $nombre = $_POST['cesta'];

    if (isset($_SESSION['productos'][$nombre])) {
        if (isset($_SESSION['cesta'][$nombre])) {
            $_SESSION['cesta'][$nombre]['cantidad']++;
        } else {
            $_SESSION['cesta'][$nombre] = [
                'imagen' => $_SESSION['productos'][$nombre]['imagen'],
                'cantidad' => 1
            ];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
</head>

<body>

    <table border="1">
        <tr>
            <td colspan="3">La tiendecita</td>
            <td>
                <form method="post" action="cesta.php">
                    <button type="submit" name="Cesta">Cesta</button>
                </form>
                <p>
                    <strong><?php echo array_sum(array_column($_SESSION['cesta'], 'cantidad')); ?></strong>
                    Prod
                </p>
            </td>
        </tr>

        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Acción</th>
        </tr>

        <?php foreach ($_SESSION['productos'] as $nombre => $producto): ?>
            <tr>
                <td><?php echo htmlspecialchars($nombre); ?></td>
                <td><?php echo $producto['precio']; ?> €</td>
                <td>
                    <form method="post" action="detalle.php">
                        <button type="submit" name="producto" value="<?php echo htmlspecialchars($nombre); ?>">
                            <img src="<?php echo htmlspecialchars($producto['imagen']); ?>" width="100" alt="<?php echo htmlspecialchars($nombre); ?>">
                        </button>
                    </form>
                </td>
                <td>
                    <form method="post">
                        <button type="submit" name="cesta" value="<?php echo htmlspecialchars($nombre); ?>">
                            Comprar
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>