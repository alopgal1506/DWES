<?php
/*1. Clase Producto
Crea una clase llamada Producto con los siguientes atributos privados:
- nombre
- precio
- stock
Implementa:
- Un constructor que inicialice todos los atributos.
- Los métodos get y set de cada atributo.
- Un método mostrarInformacion() que muestre todos los datos del producto.
- Un método calcularValorStock() que devuelva el precio multiplicado por el stock.
2. Clase Tienda
Crea una clase llamada Tienda con un atributo privado:
- productos: array que almacenará objetos de tipo Producto.
Implementa los siguientes métodos:
- agregarProducto($producto): añade un producto al array.
- mostrarProductos(): muestra todos los productos.
- calcularValorTotal(): devuelve el valor total del stock de todos los productos.
- obtenerProductoMasCaro(): devuelve el producto con el precio más alto. */
include_once "Producto.php";
include_once "Tienda.php";

$tienda=new Tienda();

/*Creamos los productos */
$raton=new Producto("Ratón", 15, 10);
$teclado=new Producto("Teclado", 25, 5);
$monitor=new Producto("Monitor", 150, 3);
$auriculares=new Producto("Auricales", 40, 8);

$tienda->agregarProducto($raton);
$tienda->agregarProducto($teclado);
$tienda->agregarProducto($monitor);
$tienda->agregarProducto($auriculares);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>Nombre</td>
            <td>Precio</td>
            <td>Stock</td>
        </tr>
        <?php $tienda->mostrarProducto();?>
    </table>
    <p>El resultado del valor del stock <?php echo $tienda->calcularValorTotal();?></p>
    <p>El producto más caro <?php $producto = $tienda->obtenerProductoMasCaro();
                                    echo $producto->getNombre();
                                    echo " - " . $producto->getPrecio() . " €";?></p>
</body>
</html>