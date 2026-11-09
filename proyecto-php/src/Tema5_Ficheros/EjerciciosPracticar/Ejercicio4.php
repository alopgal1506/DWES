<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        Primer número: <input type="number" name="a"><br>
        Segundo número: <input type="number" name="b"><br>
        Tercer número: <input type="number" name="c"><br>
        Ruta: <input type="text" name="ruta"><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php
/*Crea código php donde a través de la función escribirTresNumeros escribas en el fichero los números 2, 8, 14. Luego,
mediante la función obtenerSuma muestra por pantalla el resultado de sumar los números existentes en el archivo.
Finalmente, mediante la función obtenerArrNum obtén el array, recórrelo y muestra cada uno de los elementos del
array. */
function escribirArchivo($a, $b, $c){
    $file=fopen(__DIR__ . "/../archivos/datosEjercicio.txt", "w");
    fwrite($file, $a . PHP_EOL);
    fwrite($file, $b . PHP_EOL);
    fwrite($file, $c . PHP_EOL);

    fclose($file);
}

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

if(isset($_GET['a'])&& isset($_GET['b']) && isset($_GET['c']) && isset($_GET['ruta'])){
    $a=$_GET['a'];
    $b=$_GET['b'];
    $c=$_GET['c'];
    $ruta=$_GET['ruta'];
    escribirArchivo($a, $b, $c);
    $resultadoSuma=obtenerSuma($ruta);
    echo "La suma total es: ".$resultadoSuma."<br>";
    $arrayNumeros=obtenerArrNum($ruta);
    foreach ($arrayNumeros as $indice => $numero) {
        echo "Índice $indice: $numero<br>";
    }
}

/*Darle permisos de escritura
 sudo chmod 777 /home/usuario/Escritorio/DAW/DWES/proyecto-php/src/Tema5_Ficheros/archivos
 */
?>
