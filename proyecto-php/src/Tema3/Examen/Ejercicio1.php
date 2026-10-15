<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="">
        <label>Número 1: <input type="number" step="any" name="num1" required> </label>
        <label>Número 2: <input type="number" step="any" name="num2" required> <label>
        <button type="submit">Calcular</button><br>
    </form>
</body>

</html>

<?php

function sumar($num1, $num2)
{
    return $num1 + $num2;
}
function restar($num1, $num2)
{
    return $num1 - $num2;
}
function multiplicar($num1, $num2)
{
    return $num1 * $num2;
}

function dividir($num1, $num2)
{
    if ($num2 == 0) {
        return "No se puede dividir entre 0";
    }
    return $num1 / $num2;
}

function restodividir($num1, $num2)
{
    if ($num2 == 0) {
        return "No se puede dividir entre 0";
    }
    return $num1 % $num2;
}




if (isset($_POST['num1']) && isset($_POST['num2'])) {

    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    $resultadoSuma = sumar($num1, $num2);
    $resultadoResta = restar($num1, $num2);
    $resultadoMultiplicar = multiplicar($num1, $num2);
    $resultadoDividir = dividir($num1, $num2);
    $resultadoDividirResto = restodividir($num1, $num2);

    echo "La suma es: ", $resultadoSuma, "<br>";
    echo "La resta es: ", $resultadoResta, "<br>";
    echo "La multiplicacion es: ", $resultadoMultiplicar, "<br>";
    echo "La division es: ", $resultadoDividir, "<br>";
    echo "El resto es: ", $resultadoDividirResto, "<br>";
}

?>