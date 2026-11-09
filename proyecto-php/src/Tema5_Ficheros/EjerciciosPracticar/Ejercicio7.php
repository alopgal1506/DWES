<?php
/* Crea código php donde a través de la función escribirNumerosMod escribas en el fichero los números 2, 8, 14. Luego,
mediante la función leerContenidoFichero muestra el contenido del fichero. Ahora con la función
escribirNumerosMod amplía el contenido del fichero y añádele los números 33, 11 y 16. Muestra nuevamente el
contenido del fichero por pantalla. Finalmente, escribe el fichero pasándole un array con los número 4, 99, 12 y
parámetro <<sobreescribir>> para eliminar los datos que existieran previamente. Muestra el contenido del fichero
por pantalla y un mensaje de despedida.*/
function escribirNumerosMod($arrayValores, $cadena){
    if ($cadena === "sobreescribir") {
        $modo = "w";
    } elseif ($cadena === "ampliar") {
        $modo = "a";
    } else {
        echo "Modo no válido. Usa \"sobreescribir\" o \"ampliar\".<br>";
        return;
    }

    $file = fopen(__DIR__ . "/../archivos/datosEjercicio.txt", $modo);

    if ($file === false) {
        echo "No se pudo abrir o crear el archivo.<br>";
        return;
    }

    foreach ($arrayValores as $numero) {
        fwrite($file, $numero . PHP_EOL);
    }

    fclose($file);
}


function leerContenidoFichero(){
    $file = fopen(__DIR__ . "/../archivos/datosEjercicio.txt", "r");

    if ($file === false) {
        echo "No se pudo abrir el archivo.<br>";
        return;
    }

    while (($linea = fgets($file)) !== false) {
        echo trim($linea) . "<br>";
    }

    fclose($file);
}


escribirNumerosMod(array(2, 8, 14), "sobreescribir");


echo "<h3>Contenido tras escribir 2, 8, 14</h3>";
leerContenidoFichero();


escribirNumerosMod(array(33, 11, 16), "ampliar");


echo "<h3>Contenido tras ampliar con 33, 11, 16</h3>";
leerContenidoFichero();


escribirNumerosMod(array(4, 99, 12), "sobreescribir");


echo "<h3>Contenido tras sobreescribir con 4, 99, 12</h3>";
leerContenidoFichero();

?>