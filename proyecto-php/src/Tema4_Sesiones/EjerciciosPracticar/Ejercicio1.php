<?php
session_start();

function media($numeros)
{
    $suma = 0;
    for ($i = 0; $i < count($numeros); $i++) {
        $suma += $numeros[$i];
    }
    return $suma / count($numeros);
}

/*Inicializamos el array*/
if (!isset($_SESSION['num'])) {
    $_SESSION['num'] = [];
}

if (isset($_GET['numeros'])) {
    if(($_GET['numeros'])>=0){
        $_SESSION['num'][] = $_GET['numeros'];
        $resultadoMedia = media($_SESSION['num']);
        echo ("El resultado de la media es: " . $resultadoMedia);
    }else{
        $_SESSION = [];
        session_destroy();
        echo "Sesión destruida";
    }
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
    <form method="get">
        Introduce un número: <input type="number" name="numeros"><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>