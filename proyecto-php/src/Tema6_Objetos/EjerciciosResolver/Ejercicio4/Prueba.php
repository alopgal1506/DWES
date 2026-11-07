<?php
require_once 'Factura.php';

// Crear la factura (estado Pendiente por defecto)
$factura = new Factura('04/11/2026');

// Añadir productos
$factura->anadeProducto('Ratón', 10, 2);
$factura->anadeProducto('Teclado', 25, 1);

// Imprimir la factura
$factura->imprimeFactura();

// Probar getters y setters
echo '<br>--- Pruebas ---<br>';
echo 'Importe base: ' . $factura->getImporteBase() . ' €<br>';

$factura->setFecha('05/11/2026');
echo 'Nueva fecha: ' . $factura->getFecha() . '<br>';

$factura->setEstado(Estado::Pagada);
echo 'Nuevo estado: ' . $factura->getEstado()->value . '<br>';
?>