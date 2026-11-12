<?php
session_start();

if(!isset($_SESSION['name']) && isset($_COOKIE['name'])){
    $_SESSION['name']=$_COOKIE['name'];
}

if(!isset($_SESSION['name'])){
    header("Location: Ejercicio1.php");
    exit;
}

if(isset($_POST['Cerrar'])){
    session_unset();
    session_destroy();

    header("Location: Ejercicio1.php");
    exit;
}

if(isset($_POST['Olvidame'])){
    setcookie('name', '', time()-3600);

    session_unset();
    session_destroy();

    header("Location: Ejercicio1.php");
    exit;
}

if(!isset($_SESSION['visitas'])){
    $_SESSION['visitas']=0;
}

$_SESSION['visitas']++;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
</head>
<body>

    <h1>Bienvenido <?php echo $_SESSION['name']; ?></h1>

    <p>Has visitado la página <?php echo $_SESSION['visitas']; ?> veces.</p>

    <form method="post" action="">
        <input type="submit" name="Cerrar" value="Cerrar sesión">
        <input type="submit" name="Olvidame" value="Olvidame cookie">
    </form>

</body>
</html>