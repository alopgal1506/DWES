<?php
/*Escribe un programa que guarde en un fichero el contenido de otros dos ficheros, de tal forma que en el fichero
resultante aparezcan las líneas de los primeros dos ficheros mezcladas, es decir, la primera línea será del primer
fichero, la segunda será del segundo fichero, la tercera será la siguiente del primer fichero, etc. Los nombres de los
dos ficheros origen y el nombre del fichero destino se deben pasar a través de un formulario. Hay que tener en
cuenta que los ficheros de donde se van cogiendo las líneas pueden tener tamaños diferentes.*/
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
