<?php
$productos = [
["nombre" => "Teclado", "precio" => 25.50, "cantidad" => 8],
["nombre" => "Ratón", "precio" => 14.90, "cantidad" => 3],
["nombre" => "Monitor", "precio" => 159.00, "cantidad" => 4],
["nombre" => "Webcam", "precio" => 39.95, "cantidad" => 12],
["nombre" => "Auriculares", "precio" => 29.90, "cantidad" => 2]
];


for($i=0; $i<count($productos); $i++){
    $b=0;
    echo $resultad=$productos[$i][$b];
}

?>