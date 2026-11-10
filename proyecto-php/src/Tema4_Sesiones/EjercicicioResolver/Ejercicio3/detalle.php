<?php
session_start();

if (isset($_POST['producto'])) {
    $nombre = $_POST['producto'];
    $producto = $_SESSION['productos'][$nombre];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1><?php echo $nombre; ?></h1>

    <img src="<?php echo $producto['imagen']; ?>" width="300">

    <p>Precio: <?php echo $producto['precio']; ?> €</p>

    <p><?php echo $producto['detalle']; ?></p>
</body>

</html>