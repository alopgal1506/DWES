<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        Texto: <input type="text" name="texto"><br>
        <input type="submit" name="accion" value="Enviar">
        <input type="submit" name="accion" value="Terminar">
    </form>
</body>
</html>

<?php
/*Crear una página que permita generar un archivo de texto con las líneas que se vallan escribiendo a través de un
formulario de manera indefinida, hasta que se pulse un botón terminar, y a continuación mostrar el contenido del
fichero completo en la página.*/
function escribirArchivo($texto){
    $file=fopen(__DIR__ . "/../archivos/datosEjercicio.txt", "a");
    fwrite($file, $texto . PHP_EOL);
    fclose($file);
}

function leerArchivo(){
    $resultado=0;
    $fp=fopen(__DIR__ . "/../archivos/datosEjercicio.txt", "r");
    while (($linea = fgets($fp)) !== false) {
        echo "El resultado del archivo: ".$linea."<br>";
    }
    fclose($fp);
}

if(isset($_GET['texto'])  && trim($_GET['texto']) !== ""){
    $texto=$_GET['texto'];
    escribirArchivo($texto);
}

if(($_GET['accion'] ?? "") === "Terminar"){
        leerArchivo();
}

/*Darle permisos de escritura
 sudo chmod 777 /home/usuario/Escritorio/DAW/DWES/proyecto-php/src/Tema5_Ficheros/archivos
 */
?>
