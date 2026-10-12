<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="get">
        Introduce el precio de la Tienda 1: <input type="number" name="tienda1"><br>
        Introduce el precio de la Tienda 2: <input type="number" name="tienda2"><br>
        Introduce el precio de la Tienda 2: <input type="number" name="tienda3"><br>
        <input type="submit" value="Enviar">
    </form>

    <?php

    function calcularPrecioMedio($tiendas)
    {
        $precioTotal = 0;
        foreach ($tiendas as $tienda) {
            $precioTotal += $tienda['precio'];
        }
        return $precioTotal / count($tiendas);
    }

    function mostrarInformacion($tiendas, $precioMedio)
    {
        echo "<table border='1'>";

        echo "<tr><th>Tienda</th><th>Precio</th><th>Diferencia con la media</th></tr>";
        foreach ($tiendas as $tienda) {
            $diferencia = $tienda['precio'] - $precioMedio;

            echo "<tr>";
            echo "<td>" . $tienda['nombre'] . "</td>";
            echo "<td>" .$tienda['precio']. " €</td>";
            echo "<td>" .$diferencia.  " €</td>";
            echo "</tr>";
        }

        echo "<tr>";
        echo "<td colspan='2'><b>Precio medio</b></td>";
        echo "<td><b>" .$precioMedio . " €</b></td>";
        echo "</tr>";

        echo "</table>";
    }
    if (isset($_GET['tienda1']) && isset($_GET['tienda2']) && isset($_GET['tienda3'])) {
        $tiendas = [
            ["nombre" => "Tienda 1", "precio" => $_GET['tienda1']],
            ["nombre" => "Tienda 2", "precio" => $_GET['tienda2']],
            ["nombre" => "Tienda 3", "precio" => $_GET['tienda3']]
        ];


        $precioMedio = calcularPrecioMedio($tiendas);
        mostrarInformacion($tiendas, $precioMedio);
    }

    ?>
</body>

</html>