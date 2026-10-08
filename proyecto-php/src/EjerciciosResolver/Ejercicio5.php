<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="get">
        Introduce el diámetro: <input type="number" name="diametro"><br>
        Introduce la altura del cilindro: <input type="number" name="altura"><br>
        Introduce el cuadal de aceite: <input type="number" name="caudal"><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    function calcularVolumen($diametro, $altura)
    {
        $radio = $diametro / 2;
        return (M_PI * pow($radio, 2) * $altura) / 1000;
    }

    function calcularMinutos($volumen, $caudal)
    {
        $minutos = $volumen / $caudal;
        return $minutos;
    }

    function calcularHoras($minutos)
    {
        $horas = $minutos / 60;
        return $horas;
    }

    if (isset($_GET['diametro']) && isset($_GET['altura']) && isset($_GET['caudal'])) {
        $diametro = $_GET['diametro'];
        $altura = $_GET['altura'];
        $caudal = $_GET['caudal'];

        $volumen = calcularVolumen($diametro, $altura);
        $minutos = calcularMinutos($volumen, $caudal);
        $horas = calcularHoras($minutos);
        echo "<p>Lo que tarda en llenarse es ", $horas, "</p>";
        echo "<p>Lo que tarda en llenarse en minutos ", $minutos, "</p>";
    }
    ?>
</body>

</html>