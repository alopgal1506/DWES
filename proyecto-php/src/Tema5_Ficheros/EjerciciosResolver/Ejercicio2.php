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
/*Una función denominada obtenerSuma (tipo función, devolverá un valor numérico) que reciba una ruta de archivo
como parámetro, lea los números existentes en cada línea del archivo, y devuelva la suma de todos esos números. */
function obtenerSuma($ruta){
    $resultado=0;
    $fp=fopen($ruta, "r");
    while (!feof($fp)) {
        $linea = fgets($fp);
        $resultado+=$linea;
    }
    fclose($fp);
    return $resultado;
}

if(isset($_GET['ruta'])){
    $ruta=$_GET['ruta'];
    $resultadoSuma=obtenerSuma($ruta);
    echo "La suma total es: ".$resultadoSuma;
}

?>
