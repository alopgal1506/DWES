<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Nombre del Fichero: <input type="text" name="nombreFichero"><br>
        Texto: <input type="text" name="texto"><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php

function leerNumeroRepetidos($nombreFichero, $texto){
    $numeroRepetidos=0;
    $fp=fopen(__DIR__."/../archivos/".$nombreFichero.".txt", "r");
    while(($linea=fgets($fp))!==false){
        if(trim($linea)==$texto){
            $numeroRepetidos++;
        }
    }
    fclose($fp);
    return $numeroRepetidos;
}


/*Realiza un programa que diga cuántas ocurrencias de un texto hay en un fichero. Tanto el nombre del fichero como
el texto se deben pasar como argumentos en la línea de comandos. */


if(isset($_POST['nombreFichero']) && isset($_POST['texto'])){
    $nombreFichero=$_POST['nombreFichero'];
    $texto=$_POST['texto'];
    $numeroRepetidos=leerNumeroRepetidos($nombreFichero, $texto);
    echo "El fichero ".$nombreFichero. " el número de repetidos de la palabra ".$texto. " es ".$numeroRepetidos;
}

?>