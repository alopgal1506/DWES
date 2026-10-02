<?php
    $salario = $_GET['salario'];
    $baseImponible = $_GET['baseImponible'];

    echo "El salario del empleado es  ", $salario, " y su baseImponible ", $baseImponible, " es ", $salario+$baseImponible, "<br>";  
?>