<?php
 $altura = $_GET['altura'];
 $diametro=$_GET['diametro'];
 
 $volumen=3.14 *$diametro*$diametro*$altura;
 echo"<img src='../src/cilindro.jpg' width='50' height='50'/>";
 echo"<h1>Calculo del volúmen de un cilindrio</h1>";

?>