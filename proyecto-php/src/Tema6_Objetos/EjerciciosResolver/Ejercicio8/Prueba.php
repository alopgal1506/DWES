<?php
require_once 'Zona.php';

$principal=new Zona("Zona Principal", 100, 20);
$compra_venta=new Zona("Compa-Venta", 200, 35);
$vip=new Zona("Zona VIP", 25, 50);

$principal->venderEntradas(4);
$compra_venta->venderEntradas(100);
$vip->venderEntradas(10);

echo $principal ."<br>";
echo $compra_venta ."<br>";
echo $vip ."<br>";
?>