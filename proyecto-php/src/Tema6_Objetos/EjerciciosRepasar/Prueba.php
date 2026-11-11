<?php
include_once 'Producto.php';
include_once 'ProductoEspecial.php';

function almacenarProductos($producto, $arrayProductos)
{
    $arrayProductos[] = $producto;
    return $arrayProductos;
}

$arrayProductos = [];

if (isset($_POST['productos'])) {
    $resultado = unserialize(base64_decode($_POST['productos']));

    if ($resultado !== false) {
        $arrayProductos = $resultado;
    }
}

if (isset($_POST['codigo']) && isset($_POST['nombre']) && isset($_POST['precio'])) {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    if (isset($_POST['especial'])) {
        $descuento = $_POST['descuento'];
        $especial = $_POST['especial'];
        $producto = new ProductoEspecial($codigo, $nombre, $precio, $descuento);
    } else {
        $producto = new Producto($codigo, $nombre, $precio);
    }

    $arrayProductos = almacenarProductos($producto, $arrayProductos);
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
    <form method="post">
        Codigo: <input type="text" name="codigo"><br>
        Nombre: <input type="text" name="nombre"><br>
        Precio: <input type="number" name="precio"><br>
        Especial: <input type="checkbox" name="especial"><br>
        Descuento: <input type="number" name="descuento" value="0"><br>
        <input type="hidden" name="productos" value="<?php echo base64_encode(serialize($arrayProductos)); ?>">
        <input type="submit" name="crear" value="Crear producto">
    </form>
    <h1></h1>
    <table border="1">
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descuento</th>
        </tr>
        <?php foreach ($arrayProductos as $producto): ?>
            <?= $producto ?>
        <?php endforeach; ?>
    </table>
</body>

</html>