<?php
session_start();

if(isset($_POST['name'])){
    $name=$_POST['name'];

    setcookie('name', $name, time()+(7*24*3600));

    $_SESSION['name']=$name;

    header("Location: acceder.php");
    exit;
}

if(isset($_COOKIE['name'])){
    $_SESSION['name']=$_COOKIE['name'];

    header("Location: acceder.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso</title>
</head>
<body>

    <form method="post" action="index.php">
        Introduce tu nombre:
        <input type="text" name="name" required>
        <input type="submit" value="Enviar">
    </form>

</body>
</html>