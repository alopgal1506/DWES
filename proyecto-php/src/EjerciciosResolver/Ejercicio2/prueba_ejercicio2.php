<?php
$primerCombinacion = (string)$_GET['primerCombinacion'];
$segundaCombinacion = (string)$_GET['segundaCombinacion'];
$terceraCombinacion = (string)$_GET['terceraCombinacion'];
$cuartaCombinacion = (string)$_GET['cuartaCombinacion'];
$quintaCombinacion = (string)$_GET['quintaCombinacion'];
$sextaCombinacion = (string)$_GET['sextaCombinacion'];
$serie = $_GET['serie'];

$combinacionPedida = $primerCombinacion . $segundaCombinacion . $terceraCombinacion . $cuartaCombinacion. $quintaCombinacion . $sextaCombinacion;
$combinacionGenerada = "";

for ($i = 1; $i <= 6; $i++) {
    $combinacionGenerada .= mt_rand(1, 49);
}

$serieGenerada = mt_rand(1, 999);

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
?>