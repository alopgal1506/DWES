<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        Ruta: <input type="text" name="ruta"><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php
/*Una función denominada obtenerArrNum (tipo función, devolverá un array de valores numéricos) que reciba una
ruta de archivo como parámetro, lea los números existentes en cada línea del archivo, y devuelva un array cuyo
índice 0 contendrá el número existente en la primera línea, cuyo índice 1 contendrá el número existente en la
segunda línea y así sucesivamente (no usar la función file).*/
function obtenerArrNum($ruta){
    $arrayNumeros=array();
    $contador=0;
    $fp=fopen($ruta, "r");
    /*Para eliminar la última línea */
    while (($linea = fgets($fp)) !== false) {
        $arrayNumeros[$contador]=$linea;
        $contador++;
    }
    fclose($fp);
    return $arrayNumeros;
}

if(isset($_GET['ruta'])){
    $ruta=$_GET['ruta'];
    $arrayNumeros=obtenerArrNum($ruta);
    foreach ($arrayNumeros as $indice => $numero) {
        echo "Índice $indice: $numero<br>";
    }
}

?>
