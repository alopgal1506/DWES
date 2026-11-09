<?php
session_start();

if (!isset($_SESSION['mascotas'])) {
    $_SESSION['mascotas'] = [];
}

function escribirFichero(){

    $ruta = __DIR__ . "/../archivos/mascotas.txt";

    $file = fopen($ruta, "a");

    $fecha = date("d-m-Y");
    $cabecera = "#" . $fecha . "#";

    $contenido = file_get_contents($ruta);

    if (strpos($contenido, $cabecera) === false) {
        fwrite($file, $cabecera . PHP_EOL);
    }

    foreach ($_SESSION['mascotas'] as $nombre => $datos) {
        fwrite($file, $nombre . "-" . $datos['tipo'] . "-" . $datos['edad'] . PHP_EOL);
    }

    fclose($file);
}


if (isset($_POST['Anadir'])) {
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $edad = $_POST['edad'];

    $_SESSION['mascotas'][$nombre] = array(
        "tipo" => $tipo,
        "edad" => $edad
    );
}

if(isset($_POST['Grabar_Mascotas'])){
    escribirFichero();
    $_SESSION['mascotas'] = [];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Nombre: <input type="text" name="nombre"><br>
        Tipo: <input type="text" name="tipo"><br>
        Edad: <input type="number" name="edad"><br>
        <input type="submit" name="Anadir" value="Anadir">
        <input type="submit" name="Grabar_Mascotas" value="Grabar Mascotas">
    </form>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Edad</th>
        </tr>
           <?php
            foreach ($_SESSION['mascotas'] as $nombre => $datos) {
                echo "<tr>";
                echo "<td>".$nombre."</td>";
                echo "<td>".$datos['tipo']."</td>";
                echo "<td>".$datos['edad']."</td>";
                echo "</tr>";
            }
           ?>
    </table>
</body>
</html>