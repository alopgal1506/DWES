<?php

require_once 'Bombilla.php';
session_start();

// PASO 2: preparar la sesión la primera vez
if (!isset($_SESSION['bombillas'])) {
    $_SESSION['bombillas'] = [];
    $_SESSION['fusible'] = true;
}

Bombilla::setFusible($_SESSION['fusible']);


if (isset($_POST['crear'])) {
    $bombilla = new Bombilla(isset($_POST['estado']), (float)$_POST['potencia'], $_POST['ubicacion']);
    $_SESSION['bombillas'][] = $bombilla;
}


if (isset($_POST['alternar'])) {
    $bombilla = $_SESSION['bombillas'][$_POST['alternar']];
    $bombilla->setEstado(!$bombilla->getEstado());
}


if (isset($_POST['fusible'])) {
    if (Bombilla::getFusible()) {
        Bombilla::saltarFusibles();
    } else {
        Bombilla::encenderFusibles();
    }
    $_SESSION['fusible'] = Bombilla::getFusible();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bombillas</title>
</head>
<body>
    <h2>Fusible: <?= Bombilla::getFusible() ? "con corriente" : "SALTADO" ?></h2>

    <form method="post">
        <input type="submit" name="fusible" value="<?= Bombilla::getFusible() ? 'Saltar fusible' : 'Reparar fusible' ?>">
    </form>

    <h3>Nueva bombilla</h3>
    <form method="post">
        Ubicación: <input type="text" name="ubicacion"><br>
        Potencia consumida: <input type="number" name="potencia"><br>
        Encendida: <input type="checkbox" name="estado"><br>
        <input type="submit" name="crear" value="Crear bombilla">
    </form>

    <h3>Bombillas</h3>
    <table border="1">
        <tr>
            <th>Ubicación</th>
            <th>Potencia</th>
            <th>Interruptor</th>
            <th>Alumbra</th>
            <th></th>
        </tr>
        <?php foreach ($_SESSION['bombillas'] as $i => $b): ?>
        <tr>
            <td><?= htmlspecialchars($b->getUbicacion()) ?></td>
            <td><?= $b->getPotenciaConsumida() ?> W</td>
            <td><?= $b->getEstado() ? "Encendido" : "Apagado" ?></td>
            <td><?= $b->estaEncendida() ? "Sí" : "No" ?></td>
            <td>
                <form method="post">
                    <button type="submit" name="alternar" value="<?= $i ?>">Encender/Apagar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>