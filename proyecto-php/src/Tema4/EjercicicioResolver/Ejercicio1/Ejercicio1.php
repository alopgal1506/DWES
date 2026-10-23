<?php
session_start();

function generarAleatorio(){
    return '#' . bin2hex(random_bytes(3));
}


/*Inicializamos el array*/
if (!isset($_SESSION['color'])) {
    $_SESSION['color'] = [];
}

/*Generamos el color */
if (isset($_POST['anadir'])) {
    $_SESSION['color'][] = generarAleatorio();
}

/*Asignar color y devolvemos el ultimos color*/
if (!empty($_SESSION['color'])) {
    $colorFondo = end($_SESSION['color']);
} else {
    $colorFondo = '#FFFFFF';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor="<?= $colorFondo ?>">
    <form method="post" action="">
        <button type="submit" name="anadir">Añadir color</button><br>
    </form>
    <form method="post" action="PruebaEjer1.php">
        <button type="submit" name="mostrar">Mostrar Paleta Creada</button><br>
    </form>
</body>
</html>

