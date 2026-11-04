<?php
require_once 'DadoPoker.php';
$cubilete = array();
for ($i = 0; $i < 5; $i++) {
    $cubilete[] = new DadoPoker();
}

echo "Resultado:<br>";
for ($i = 0; $i < count($cubilete); $i++) {
    $cubilete[$i]->tira();
    echo "Dado " . ($i + 1) . ": " . $cubilete[$i]->nombreFigura() . "<br>";
}

echo "El número de tiradas es: " . DadoPoker::getTiradasTotales();
?>