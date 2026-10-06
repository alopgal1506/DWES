<?php
 $altura = $_GET['altura'];
 $diametro=$_GET['diametro'];

 $radio=$diametro/2;
 $volumen=3.14 *pow($radio,2)*$diametro*$altura;
 echo"<h1>Calculo del volúmen de un cilindrio</h1>";
 echo "<div style='display:flex'>";
 echo"<img src='../src/cilindro.jpg' width='50' height='50'/>";
 echo "<p>El volumen del cilindro es ", $volumen,"</p>";
 echo "</div>";
?>