<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar etiquetas HTML</title>
</head>
<body>

    <form action="" method="post">
        Nombre del Fichero: <input type="text" name="nombreFichero"><br>
        <input type="submit" value="Enviar">
    </form>

</body>
</html>

<?php

/* 
Ejercicio 12.
Quitar las etiquetas HTML de un documento web.
Crear un fichero con el mismo nombre y la coletilla "Sin".
*/

function leerArchivo($nombreFichero){
    $contenido = "";

    $fp = fopen(__DIR__."/../archivos/".$nombreFichero.".txt", "r");

    while(($linea = fgets($fp)) !== false){
        $contenido .= strip_tags($linea);
    }

    fclose($fp);

    return $contenido;
}

function escribirArchivo($nombreFichero, $contenido){
    $file = fopen(__DIR__."/../archivos/".$nombreFichero."Sin.txt", "w");

    fwrite($file, $contenido);

    fclose($file);
}

if(isset($_POST['nombreFichero'])){
    $nombreFichero = $_POST['nombreFichero'];

    $contenido = leerArchivo($nombreFichero);

    escribirArchivo($nombreFichero, $contenido);

    echo "Se ha creado el fichero ".$nombreFichero."Sin.txt correctamente";
}

?>