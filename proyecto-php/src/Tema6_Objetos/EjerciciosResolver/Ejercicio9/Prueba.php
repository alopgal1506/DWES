<?php
require_once 'Coche.php';
require_once 'CocheLujo.php';
session_start();
if (!isset($_SESSION['coches'])) {
    $_SESSION['coches'] = [];
    $_SESSION['modeloCaro'] = "";
    $_SESSION['precioCaro'] = 0;
}

Coche::setModeloCaro($_SESSION['modeloCaro']);
Coche::setPrecioCaro($_SESSION['precioCaro']);

if (isset($_POST['crear'])) {
    if (isset($_POST['lujo'])) {
        $coche = new CocheLujo($_POST['matricula'], $_POST['modelo'], (float)$_POST['precio'], (float)$_POST['suplemento']);
    } else {
        $coche = new Coche($_POST['matricula'], $_POST['modelo'], (float)$_POST['precio']);
    }

    $_SESSION['coches'][] = $coche;
    $_SESSION['modeloCaro'] = Coche::getModeloCaro();
    $_SESSION['precioCaro'] = Coche::getPrecioCaro();
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Coches</title>
</head>
<body>

    <form method="post">
        Matrícula: <input type="text" name="matricula"><br>
        Modelo: <input type="text" name="modelo"><br>
        Precio: <input type="number" name="precio"><br>
        Lujo: <input type="checkbox" name="lujo"><br>
        Suplemento: <input type="number" name="suplemento" value="0"><br>
        <input type="submit" name="crear" value="Crear coche">
    </form>
    
    <table border="1">
        <tr>
            <th>Matrícula</th>
            <th>Modelo</th>
            <th>Precio</th>
            <th>Suplemento</th>
        </tr>
        <?php foreach ($_SESSION['coches'] as $coche): ?>
            <tr><?= $coche ?></tr>
        <?php endforeach; ?>
    </table>
</body>
</html>