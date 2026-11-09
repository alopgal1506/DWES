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
    $palabras=array();
    $contador=0;

    $fp = fopen(__DIR__ . "/../archivos/" .$nombreFichero.".txt", "r");

    while(($linea = fgets($fp)) !== false){
        $palabras[$contador]=trim($linea);
        $contador++;
        sort($palabras);
    }
    fclose($fp);
    return $palabras;
}

function escribirArchivo($nombreFichero, $palabras){
    $file=fopen(__DIR__ . "/../archivos/".$nombreFichero."_sort.txt", "w");
    foreach($palabras as $palabra){
        fwrite($file, $palabra . PHP_EOL);
    }
    fclose($file);
}


if(isset($_POST['nombreFichero'])){
    $nombreFichero=$_POST['nombreFichero'];
    $arrayResultado=leerArchivo($nombreFichero);
    escribirArchivo($nombreFichero, $arrayResultado);
}

/*Darle permisos de escritura
 sudo chmod 777 /home/usuario/Escritorio/DAW/DWES/proyecto-php/src/Tema5_Ficheros/archivos
 */

/*Odenar números de mayor a menor rsort($array) */
