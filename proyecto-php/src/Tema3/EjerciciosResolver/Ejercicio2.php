<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="get">
        <table border="1">
            <?php
            $total = 90;

            for ($i = 1; $i <= $total; $i++) {

                if (($i - 1) % 10 == 0) {
                    echo "<tr>";
                }

                echo "<td> <input type='checkbox' name='numeros[]' value='" . $i . "'>" . $i . "</td>";

                if ($i % 10 == 0 || $i == $total) {
                    echo "</tr>";
                }
            }
            ?>
        </table>
        <button type="submit">Jugar</button>
    </form>
</body>

</html>

<?php

function genenerAleatorios()
{
    $numerosAleatorios = [];

    for ($i = 0; $i < 6; $i++) {
        $numerosAleatorios[] = rand(1, 90);
    }
    return $numerosAleatorios;
}

function aciertos($numerosAleatorios, $numeros)
{
    $aciertos = 0;
    $numerosAcertados = [];
    for ($i = 0; $i < count($numerosAleatorios); $i++) {
        for ($b = 0; $b < count($numeros); $b++) {
            if ($numerosAleatorios[$i] == $numeros[$b]) {
                $numerosAcertados[$aciertos] = $numerosAleatorios[$i];
                $aciertos++;
            }
        }
        echo "<td>" . $numerosAleatorios[$i] . "</td>";
    }
    return $numerosAcertados;
}

function mostrarInformacion($numerosAleatorios, $numeros)
{

    echo "Numeros ganadores";
    echo "<table border='1'>";
    echo "<tr>";
    $aciertosTotales = aciertos($numerosAleatorios, $numeros);
    echo "</tr>";
    echo "</table>";

    echo "Numeros aciertos";
    echo "<table border='1'>";
    echo "<tr>";
    echo "<td> Numero de aciertos </td> <td> Numero acertados </td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>" . count($aciertosTotales) . "</td>";
    echo "<td>";
    for ($i = 0; $i < count($aciertosTotales); $i++) {
        echo $aciertosTotales[$i] . " ";
    }
    echo "</td>";
    echo "</tr>";
    echo "</table>";

    mostrarResultadoDinero($aciertosTotales);
}

function mostrarResultadoDinero($aciertos)
{
    $dineroTotal = 0;

    if (count($aciertos) < 4) {
        echo "dinero ganado= " . $dineroTotal . "€";
    } elseif (count($aciertos) == 4) {
        $dineroTotal = 4;
        echo "dinero ganado= " . $dineroTotal . "€";
    } elseif (count($aciertos) == 5) {
        $dineroTotal = 30;
        echo "dinero ganado= " . $dineroTotal . "€";
    } elseif (count($aciertos) == 6) {
        $dineroTotal = 100;
        echo "dinero ganado= " . $dineroTotal . "€";
    } else {
        $dineroTotal = 500;
        echo "dinero ganado= " . $dineroTotal . "€";
    }
}

if (isset($_GET['numeros'])) {

    $numeros = $_GET['numeros'];

    $numerosAleatorios = genenerAleatorios();
    mostrarInformacion($numerosAleatorios, $numeros);
}
?>