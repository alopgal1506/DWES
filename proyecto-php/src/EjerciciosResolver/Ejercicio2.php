<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="get">
        Introduce 1 combinación: <input type="number" name="primerCombinacion" min="1" max="49"><br>
        Introduce 2 combinación: <input type="number" name="segundaCombinacion" min="1" max="49"><br>
        Introduce 3 combinación: <input type="number" name="terceraCombinacion" min="1" max="49"><br>
        Introduce 4 combinación: <input type="number" name="cuartaCombinacion" min="1" max="49"><br>
        Introduce 5 combinación: <input type="number" name="quintaCombinacion" min="1" max="49"><br>
        Introduce 6 combinación: <input type="number" name="sextaCombinacion" min="1" max="49"><br>
        Introduce la Serie: <input type="number" name="serie" min="1" max="999"><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    function generarCombinacionPedida($primerCombinacion, $segundaCombinacion, $terceraCombinacion, $cuartaCombinacion, $quintaCombinacion, $sextaCombinacion){
        $combinacionPedida = $primerCombinacion . $segundaCombinacion . $terceraCombinacion . $cuartaCombinacion . $quintaCombinacion . $sextaCombinacion;
        return $combinacionPedida;
    }

    function generarCombinacionGenarada(){
        $combinacionGenerada = "";

        for ($i = 1; $i <= 6; $i++) {
            $combinacionGenerada .= mt_rand(1, 49);
        }
        return $combinacionGenerada;
    }

    function generarSerie(){
        $serieGenerada = mt_rand(1, 999);
        return $serieGenerada;
    }

    function mostrarInformacion($combinacionPedida, $serie, $combinacionGenerada,$serieGenerada){
        echo "<table border='1'>";
        echo "<tr>";
        echo "<td>Tipo</td>";
        echo "<td>Combinación</td>";
        echo "<td>Serie</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Pedida</td>";
        echo "<td>", $combinacionPedida, "</td>";
        echo "<td>", $serie, "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Generada</td>";
        echo "<td>", $combinacionGenerada, "</td>";
        echo "<td>", $serieGenerada, "</td>";
        echo "</tr>";
        echo "</table>";
    }

    if (
        isset($_GET['primerCombinacion']) && isset($_GET['segundaCombinacion']) && isset($_GET['terceraCombinacion'])
        && isset($_GET['cuartaCombinacion']) && isset($_GET['quintaCombinacion']) && isset($_GET['sextaCombinacion'])
        && isset($_GET['serie'])
    ) {
        $primerCombinacion = (string)$_GET['primerCombinacion'];
        $segundaCombinacion = (string)$_GET['segundaCombinacion'];
        $terceraCombinacion = (string)$_GET['terceraCombinacion'];
        $cuartaCombinacion = (string)$_GET['cuartaCombinacion'];
        $quintaCombinacion = (string)$_GET['quintaCombinacion'];
        $sextaCombinacion = (string)$_GET['sextaCombinacion'];
        $serie = $_GET['serie'];

        $combinacionPedida = generarCombinacionPedida($primerCombinacion, $segundaCombinacion, $terceraCombinacion, $cuartaCombinacion, $quintaCombinacion, $sextaCombinacion);
        $combinacionGenerada=generarCombinacionGenarada();
        $serieGenerada=generarSerie();

        mostrarInformacion($combinacionPedida, $serie, $combinacionGenerada, $serieGenerada);
    }
     ?>
</body>

</html>