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
        <input type="submit" value="Enviar">
    </form>
</body>
</html>



<?php
/*Realiza un programa que sea capaz de ordenar alfabéticamente las palabras contenidas en un fichero de texto. El
nombre del fichero que contiene las palabras se debe pasar a través de un formulario. El nombre del fichero
resultado debe ser el mismo que el original añadiendo la coletilla sort, por ejemplo palabras_sort.txt. Suponemos
que cada palabra ocupa una línea.*/

function leerArchivo($nombreFichero){

    $fp = fopen(__DIR__ . "/../archivos/" .$nombreFichero."txt", "r");

    while(){

    }

    fclose($fp1);
}

leerArchivo();

if(isset($_POST['nombreFichero'])){
    $nombreFichero=$_POST['nombreFichero'];
}

/*Darle permisos de escritura
 sudo chmod 777 /home/usuario/Escritorio/DAW/DWES/proyecto-php/src/Tema5_Ficheros/archivos
 */
