<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once 'Menu.php';
    $menu1 = new Menu();
    $menu1->anadir('Inicio', 'index.php');
    $menu1->anadir('Productos', 'productos.php');
    $menu1->anadir('Contacto', 'contacto.php');

    echo '<h3>Menú horizontal</h3>';
    $menu1->mostrarHorizontal();

    echo '<h3>Menú vertical</h3>';
    $menu1->mostrarVertical();
    ?>
</body>

</html>