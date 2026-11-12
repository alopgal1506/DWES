
<?php
$color = "white";

if (isset($_GET['claro'])) {
    if(isset($_GET['color'])){
    $color = $_GET['color'];
    setcookie("color", $color, time() + 30 * 24 * 3600);
    }
} else if (isset($_COOKIE['color'])) {
    $color = $_COOKIE['color'];
}

if (isset($_GET['oscuro'])) {
    if(isset($_GET['color'])){
    $color = $_GET['color'];
    setcookie("color", $color, time() + 30 * 24 * 3600);
    }
} else if (isset($_COOKIE['color'])) {
    $color = $_COOKIE['color'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color: <?php echo $color; ?>;">

    <p style="text-color: <?php echo $color; ?>;">Esta es mi página con color de fondo personalizado.</p>

    <form method="get" action="">
        Color del fondo: <input type="color" name="color"><br>
        <input type="submit" value="claro">
        <input type="submit" value="oscuro">
    </form>

</body>

</html>