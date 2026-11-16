<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <form action="" method="get">
        Añadir una nota: <input type="text" name="nota"><br>
        Nombre del fichero: <input type="text" name="fichero"><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php

function anadirNota($fichero, $texto){
    $file=fopen(__DIR__."/../archivos/".$fichero.".text", "a");
    fwrite($file, $texto . PHP_EOL);
    fclose($file);
}

function leerNotas($fichero){
    $arrayTexto=array();
    $contador=0;
    $fp=fopen(__DIR__."/../archivos/".$fichero.".text", "a");
    if(!$fp){
         $arrayTexto[]=[];
    }
    while (($linea = fgets($fp)) !== false) {
        $linea=trim($linea);
        $arrayNumeros[$contador]=$linea;
        $contador++;
    }
    fclose($fp);
    return $arrayTexto;
}
if(isset($_GET['nota'])&& isset($_GET['fichero'])){
    $arrayNotas=array();
    $nota=$_GET['nota'];
    $fichero=$_GET['fichero'];
    anadirNota($fichero, $nota);
    $arrayNotas=leerNotas($fichero);
    foreach($arrayNotas as $notas){
        echo $notas;
    }
}

?>