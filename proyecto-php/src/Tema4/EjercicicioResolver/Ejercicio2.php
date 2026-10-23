<?php
session_start();

/* Inicializamos la sesión */
if (!isset($_SESSION['si'])) {
    $_SESSION['si'] = 0;
}
if (!isset($_SESSION['no'])) {
    $_SESSION['no'] = 0;
}
/**Si pulsamos que se sume */
if (isset($_POST['si'])) {
    $_SESSION['si']++;
}
if (isset($_POST['no'])) {
    $_SESSION['no']++;
}

/*Almacenamos en una cookies */
setcookie("si", $_SESSION['si'], time() + (90 * 24 * 60 * 60)); /*días, horas, minutos y segundos */
setcookie("no", $_SESSION['no'], time() + (90 * 24 * 60 * 60));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>¿Crees que actualemente hay corrupción en el gobierno?</h1>
    <?php
    echo "SI ";
    for ($i = 0; $i < $_SESSION['si']; $i++) {
        echo "<span style='color: green;'>▲</span>";
    }

    echo "<br>NO ";
    for ($i = 0; $i < $_SESSION['no']; $i++) {
        echo "<span style='color: red;'>▲</span>";
    }
    ?>
    <form method="post" action="">
        <button type="submit" name="si" style="width: 50px;">SÍ</button>
        <button type="submit" name="no" style="width: 50px;">NO</button>
    </form>
</body>

</html>