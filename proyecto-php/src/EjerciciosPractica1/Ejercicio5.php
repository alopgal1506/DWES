<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    /*Escribe un programa que utilice las variables $x y $y. Asignales los valores 144 y 999 respectivamente.
A continuación, muestra por pantalla el valor de cada variable, la suma, la resta, la división y la
multiplicación. */
    <?php
    $x=144;
    $y=999;

    echo "El valor de x es ", $x, " y el valor de y es ", $y, "<br>";
    echo "El valor de la variable sumando es ", ($x+$y), "<br>";
    echo "El valor de la variable restando es ", ($y-$x), "<br>";
    echo "La división de los dos número es ",($y/$x), "<br>";
    echo "El resultado de la división de los dos números es ", ($x*$y);
    ?>
</body>
</html>