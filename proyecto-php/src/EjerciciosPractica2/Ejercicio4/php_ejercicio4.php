<?php
    $primerNumero = $_GET['a'];
    $segundoNumero = $_GET['b'];

    echo "La suma de los numeros ", $primerNumero, " y ", $segundoNumero, " es ", $primerNumero+$segundoNumero, "<br>";
    echo "La multiplicación de los numeros ", $primerNumero, " y ", $segundoNumero, " es ", $primerNumero*$segundoNumero, "<br>";
    
    if($primerNumero>=$segundoNumero){
        echo "La resta de los numeros ", $primerNumero, " y ", $segundoNumero, " es ", $primerNumero-$segundoNumero, "<br>";
        echo "La división de los numeros ", $primerNumero, " y ", $segundoNumero, " es ", $primerNumero/$segundoNumero, "<br>";
    }else{
        echo "La resta de los numeros ", $primerNumero, " y ", $segundoNumero, " es ", $segundoNumero-$primerNumero, "<br>";
        echo "La división de los numeros ", $primerNumero, " y ", $segundoNumero, " es ", $segundoNumero/$primerNumero;
    }
?>