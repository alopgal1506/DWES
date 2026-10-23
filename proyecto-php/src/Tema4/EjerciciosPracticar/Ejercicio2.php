<?php
session_start();

function numeroNumeros($numeros)
{
    return count($numeros);
}

function mediaPares($numeros){
    $sumaPares=0;
    $contadorPares = 0;
    for($i=0; $i<count($numeros); $i++){
        if($numeros[$i]%2==0){
            $sumaPares+=$numeros[$i];
            $contadorPares++;
        }
    }
    return $sumaPares/$contadorPares;
}

function mayorPares($numeros){
    $mayorNumero=0;
    for($i=0; $i<count($numeros); $i++){
        if($mayorNumero<$numeros[$i]){
            $mayorNumero=$numeros[$i];
        }
    }
    return $mayorNumero;
}

/*Inicializamos el array*/
if (!isset($_SESSION['num'])) {
    $_SESSION['num'] = [];
}

if (isset($_GET['numeros'])) {
    if(($_GET['numeros'])>=0){
        $_SESSION['num'][] = $_GET['numeros'];
        $resultadoNumerosIntroducidos = numeroNumeros($_SESSION['num']);
        $resultadoMediaPares=mediaPares($_SESSION['num']);
        $resultadoMayorPares=mayorPares($_SESSION['num']);
        echo ("El resultado de numeros pares es: " . $resultadoNumerosIntroducidos. "<br>");
        echo ("La media de los pares es: " . $resultadoMediaPares. "<br>");
        echo ("El número mayor de pares es: " . $resultadoMayorPares. "<br>");
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