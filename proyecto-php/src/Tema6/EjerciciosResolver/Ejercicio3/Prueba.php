<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
   <?php
require_once 'Cubo.php';

$cubo1 = new Cubo(10, 8);
$cubo2 = new Cubo(5, 2);

echo 'Cubo 1: ' . $cubo1->getContenidoActual() . '<br>';
echo 'Cubo 2: ' . $cubo2->getContenidoActual() . '<br>';

$cubo1->verter($cubo2);

echo 'Después de verter:<br>';
echo 'Cubo 1: ' . $cubo1->getContenidoActual() . '<br>';
echo 'Cubo 2: ' . $cubo2->getContenidoActual() . '<br>';
?>
</body>

</html>