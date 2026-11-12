<?php
session_start();

include_once('Figura.php');
include_once('Rectangulo.php');
include_once('Circulo.php');
include_once('Triangulo.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        Nombre: <input type="text" name="matricula"><br>
        Modelo: <input type="text" name="modelo"><br>
        Precio: <input type="number" name="precio"><br>
        Lujo: <input type="checkbox" name="lujo"><br>
        Suplemento: <input type="number" name="suplemento" value="0"><br>
        <input type="submit" name="crear" value="Crear coche">
    </form>
    
</body>
</html>