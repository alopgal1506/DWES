<?php
    $diametro = $_GET['diametro'];
    $altura = $_GET['altura'];
    $caudal = $_GET['caudal'];

    $radio=$diametro/2;

    $volumen=(M_PI * pow($radio,2)*$altura)/1000;
    $minutos=$volumen/$caudal;
    $horas=$minutos/60;

    echo"<p>Lo que tarda en llenarse es ",$horas,"</p>";
    echo"<p>Lo que tarda en llenarse en minutos ",$minutos,"</p>";
?>