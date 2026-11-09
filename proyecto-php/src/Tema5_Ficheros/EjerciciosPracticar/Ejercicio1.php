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
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php
/*Una función (tipo procedimiento, no hay valor devuelto) denominada escribirTresNumeros que reciba tres números
enteros como parámetros y proceda a escribir dichos números en tres líneas en un archivo denominado
datosEjercicio.txt. Si el archivo no existe, debe crearlo. */
function escribirArchivo($a, $b, $c){
    $file=fopen(__DIR__ . "/../archivos/datosEjercicio.txt", "w");
    fwrite($file, $a . PHP_EOL);
    fwrite($file, $b . PHP_EOL);
    fwrite($file, $c . PHP_EOL);

    fclose($file);
}

if(isset($_GET['a'])&& isset($_GET['b']) && isset($_GET['c'])){
    $a=$_GET['a'];
    $b=$_GET['b'];
    $c=$_GET['c'];
    escribirArchivo($a, $b, $c);
}

/*Darle permisos de escritura
 sudo chmod 777 /home/usuario/Escritorio/DAW/DWES/proyecto-php/src/Tema5_Ficheros/archivos
 */
?>
