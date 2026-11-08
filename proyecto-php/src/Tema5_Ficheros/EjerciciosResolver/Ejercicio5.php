<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        Primer número: <input type="number" name="numeros[]"><br>
        Segundo número: <input type="number" name="numeros[]"><br>
        Tercer número: <input type="number" name="numeros[]"><br>
        Cuarto número: <input type="number" name="numeros[]"><br>
        Cadena de texto: <input type="text" name="cadena"><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php
/*Una función (tipo procedimiento, no hay valor devuelto) denominada escribirNumerosMod que reciba dos
parámetros: un array de valores enteros y una cadena de texto que puede ser "sobreescribir" ó "ampliar". La función
debe proceder a: escribir cada uno de los números que forman el contenido del array en una línea de un archivo
datosEjercicio.txt usando el modo de operación que se indique con el otro parámetro. Si el archivo no existe, debe
crearlo.
Ejemplo: El array que se pasa es $numeros = array(5, 9, 3, 22); y la invocación que se utiliza es
escribirNumerosMod($numeros, "sobreescribir"); En este caso, se debe eliminar el contenido que existiera
previamente en el archivo y escribir en él 4 líneas, cada una de las cuales contendrá los números 5, 9, 3 y 22. */
function escribirNumerosMod($arrayValores, $cadena){
    if ($cadena === "sobreescribir") {
        $modo = "w";
    } elseif ($cadena === "ampliar") {
        $modo = "a";
    } else {
        echo "Modo no válido. Usa \"sobreescribir\" o \"ampliar\".";
        return;
    }
    $file=fopen(__DIR__ . "/../archivos/datosEjercicio.txt", $modo);
    
    foreach ($arrayValores as $numero) {
        fwrite($file, $numero . PHP_EOL);
    }

    fclose($file);
}


if(isset($_GET['numeros'])&& isset($_GET['cadena'])){
    $numeros=$_GET['numeros'];

    $arrayValores=[];
     foreach ($numeros as $n) {
        if ($n !== "" && is_numeric($n)) {
            $arrayValores[] = $n;
        }
    }
    $cadena=$_GET['cadena'];
    escribirNumerosMod($arrayValores, trim($cadena));
}

/*Darle permisos de escritura
 sudo chmod 777 /home/usuario/Escritorio/DAW/DWES/proyecto-php/src/Tema5_Ficheros/archivos
 */
?>
