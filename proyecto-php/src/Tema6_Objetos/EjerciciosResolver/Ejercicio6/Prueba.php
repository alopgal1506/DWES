<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    require_once 'Vehiculo.php';
    require_once 'Coche.php';
    require_once 'Bicicleta.php';

    $bici = new Bicicleta();
    $coche = new Coche();

    $bici->anda(10);
    $bici->caballito();
    $coche->anda(100);
    $coche->quemaRueda();

    echo 'Km bicicleta: ' . $bici->getKmRecorridos() . '<br>';
    echo 'Km coche: ' . $coche->getKmRecorridos() . '<br>';
    echo 'Km totales: ' . Vehiculo::getKmTotales() . '<br>';
    echo 'Vehículos creados: ' . Vehiculo::getVehiculosCreados() . '<br>';
    ?>
</body>

</html>