<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="">
        <label>Producto: <input type="text" name="producto" required></label>
        <label>Precio (€): <input type="number" step="0.01" name="precio" required></label>
        <label>Cantidad: <input type="number" name="cantidad" required></label>
        <button type="submit">Calcular compra</button>
    </form>
</body>

</html>

<?php

function calcularSubTotal($precio, $cantidad){
    return $precio*$cantidad;
}

function aplicarDescuento($subTotal){
    $descuento=$subTotal*10;
    return $descuento/100;
}


if(isset($_POST['producto'])&&isset($_POST['precio'])&&isset($_POST['cantidad'])){
    $producto=$_POST['producto'];
    $precio=$_POST['precio'];
    $cantidad=$_POST['cantidad'];
    if($precio>0 && $cantidad>0){
        $resultadoSubTotal=calcularSubTotal($precio, $cantidad);

    $total=$resultadoSubTotal;
    if($resultadoSubTotal>100){
        $total=aplicarDescuento($resultadoSubTotal);
    }
    echo "El producto ", $producto, " con precio ", $precio, " y cantidad ", $cantidad, " con un subtotal ", $resultadoSubTotal, " y un descuento del 10%, tiene un total de ", $total;
    }else{
        echo "El precio o la cantidad es negativa";
    }
}
?>