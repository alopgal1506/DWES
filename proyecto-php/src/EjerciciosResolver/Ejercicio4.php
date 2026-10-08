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

        function calcularPrecioMedio($precioPrimeraTienda, $precioSegundaTienda, $precioTerceraTienda){
            $precioTotal=$precioPrimeraTienda+$precioSegundaTienda+$precioTerceraTienda;
            return $precioTotal/3;

        }
        if(isset($_GET['tienda1'])&& isset($_GET['tienda2'])&& isset($_GET('tienda3'))){
            $precioPrimeraTienda=$_GET['tienda1'];
            $precioSegundaTienda=$_GET['tienda2'];
            $precioTerceraTienda=$_GET['tienda3'];

           $precioMedio= calcularPrecioMedio($precioPrimeraTienda, $precioSegundaTienda, $precioTerceraTienda);

        }

    ?>
</body>

</html>