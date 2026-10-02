<?php
    $radio = $_GET['radio'];
    $altura = $_GET['altura'];
    $pi=3.14;

    echo "El volumen de un cono con su radio ", $radio, " y su altura ", $altura, " es ", ((1/3)*$pi*($radio**2)*$altura), "<br>";  
?>