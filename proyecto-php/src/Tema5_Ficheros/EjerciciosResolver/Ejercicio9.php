<?php
/*Escribe un programa que guarde en un fichero el contenido de otros dos ficheros, de tal forma que en el fichero
resultante aparezcan las líneas de los primeros dos ficheros mezcladas, es decir, la primera línea será del primer
fichero, la segunda será del segundo fichero, la tercera será la siguiente del primer fichero, etc. Los nombres de los
dos ficheros origen y el nombre del fichero destino se deben pasar a través de un formulario. Hay que tener en
cuenta que los ficheros de donde se van cogiendo las líneas pueden tener tamaños diferentes.*/

function leerArchivo(){

    $fp1 = fopen(__DIR__ . "/../archivos/primerFichero.txt", "r");
    $fp2 = fopen(__DIR__ . "/../archivos/segundoFichero.txt", "r");
    $file = fopen(__DIR__ . "/../archivos/archivoConjunto.txt", "w");

    $lineaPrimero = fgets($fp1);
    $lineaSegundo = fgets($fp2);

    while ($lineaPrimero !== false || $lineaSegundo !== false) {

        if ($lineaPrimero !== false && $lineaSegundo !== false) {
            fwrite($file, rtrim($lineaPrimero). PHP_EOL);
            fwrite($file, rtrim($lineaSegundo). PHP_EOL);

        } else if ($lineaPrimero !== false) {
            fwrite($file, rtrim($lineaPrimero). PHP_EOL);

        } else {
            fwrite($file, rtrim($lineaSegundo). PHP_EOL);
        }

        $lineaPrimero = fgets($fp1);
        $lineaSegundo = fgets($fp2);
    }

    fclose($fp1);
    fclose($fp2);
    fclose($file);
}

leerArchivo();

/*Darle permisos de escritura
 sudo chmod 777 /home/usuario/Escritorio/DAW/DWES/proyecto-php/src/Tema5_Ficheros/archivos
 */
