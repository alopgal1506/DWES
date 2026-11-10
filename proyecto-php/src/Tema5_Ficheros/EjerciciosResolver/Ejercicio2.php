<?php
session_start();

if (!isset($_SESSION['mascotas'])) {
    $_SESSION['mascotas'] = [];
}

function leerFechas(){
    $arrayFechas=array();
    $contador=0;
    $fg=fopen(__DIR__."/../archivos/mascotas.txt", "r");
    while(($linea=fgets($fg))!==false){
        $linea=trim($linea);
        if(str_starts_with($linea,"#") && str_ends_with($linea,"#")){
            $arrayFechas[$contador]=str_replace("#", "", $linea);
            $contador++;
        }
    }
    fclose($fg);
    return $arrayFechas;
}

function leerFechaConcreta($fecha){
    $encontrado=false;
    $fg=fopen(__DIR__."/../archivos/mascotas.txt", "r");
    while(($linea=fgets($fg))!==false){
        $linea=trim($linea);
        if(str_starts_with($linea, "#")&& str_ends_with($linea, "#")){
            $linea=str_replace("#", "", $linea);
            if($linea==$fecha){
                $encontrado=true;
            }else{
                $encontrado=false;
            }
        }
        if($encontrado){
            $arrayMascota = explode("-", $linea);

            $_SESSION['mascotas'][$arrayMascota[0]]=array(
                "tipo"=> $arrayMascota[1],
                "edad"=>$arrayMascota[2]
            );
        }
    }
    fclose($fg);
}

if(isset($_POST['nuevaFecha'])){
    $fecha=$_POST['nuevaFecha'];
    $_SESSION['mascotas'] = [];
    leerFechaConcreta($fecha);
}

$fechas=leerFechas();

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
        <select name="nuevaFecha" onchange="this.form.submit()">
            <?php foreach ($fechas as $fecha) { ?>
                <option value="<?= $fecha ?>"><?= $fecha ?></option>
            <?php } ?>
        </select> 
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