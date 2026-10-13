<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

function generarAleatorios()
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
    $numeroAcertado = 0;
    $numerosAcertados = [];
    for ($i = 0; $i < count($numerosAleatorios); $i++) {
        $numeroAcertado=0;
        for ($b = 0; $b < count($numeros); $b++) {
            if ($numerosAleatorios[$i] == $numeros[$b]) {
                $numerosAcertados[$aciertos] = $numerosAleatorios[$i];
                $aciertos++;
                $numeroAcertado = $numerosAleatorios[$i];
            }
        }
        if ($numerosAleatorios[$i] && $numeroAcertado) {
            echo "<td style='background-color:green'>" . $numerosAleatorios[$i] . "</td>";
        } else {
            echo "<td style='background-color:white'>" . $numerosAleatorios[$i] . "</td>";
        }
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
    function mostrarTabla($seleccionados = [])
    {
        $total = 90;

        echo "<form method='get'>";
        echo "<table border='1'>";
        for ($i = 1; $i <= $total; $i++) {
            if (($i - 1) % 10 == 0) {
                echo "<tr>";
            }

            $checked = in_array($i, $seleccionados) ? "checked" : "";
            echo "<td><input type='checkbox' name='numeros[]' value='$i' $checked> $i</td>";

            if ($i % 10 == 0) {
                echo "</tr>";
            }
        }
        echo "</table>";
        echo "<button type='submit'>Jugar</button>";
        echo "</form>";
    }

    $numeros = isset($_GET['numeros']) ? array_map('intval', $_GET['numeros']) : [];

    mostrarTabla($numeros);

    if (isset($_GET['numeros'])) {
        $numerosAleatorios = generarAleatorios();
        mostrarTabla();
        mostrarInformacion($numerosAleatorios, $numeros);
    }
    ?>
</body>

</html>