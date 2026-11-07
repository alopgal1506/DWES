<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once 'Empleado.php';
    $empleado1=new Empleado("Pepe", 200);
    $empleado1->asigna("Pepe", 300);
    echo $empleado1->imprimir();
    ?>
</body>
</html>

