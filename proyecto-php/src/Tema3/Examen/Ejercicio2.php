<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="">
        <label>Alumno: <input type="text" name="alumno" required> </label>
        <label>Nota 1: <input type="number" step="0.01" name="nota1" required> <label>
        <label>Nota 2: <input type="number" step="0.01" name="nota2" required> <label>
        <label>Nota 3: <input type="number" step="0.01" name="nota3" required> <label>
        <button type="submit">Evaluar</button><br>
    </form>
</body>

</body>

</html>

<?php
function comprobarNotaValida($nota){
    $resultado=false;
    if($nota>=0 && $nota<=10){
        $resultado=true;
    }
    return $resultado;
}

function calcularNotaMedia($nota1, $nota2, $nota3){
    return($nota1+$nota2+$nota3)/3;
}

function calificaion($media){
    $resultado="";
    if($media<5){
        $resultado="Suspenso";
    }elseif($media>=5 && $media<7){
        $resultado="Aprobado";
    }elseif($media>=7 && $media<9){
        $resultado="Notable";
    }elseif($media>=9 && $media<=10){
        $resultado="Sobresaliente";
    }
    return $resultado;
}
if(isset($_POST["nota1"])&&isset($_POST["nota2"])&&isset($_POST["nota3"]) && isset($_POST["alumno"])){
    $nota1=$_POST["nota1"];
    $nota2=$_POST["nota2"];
    $nota3=$_POST["nota3"];
    $alumno=$_POST["alumno"];
 

    $validaNota1=comprobarNotaValida($nota1);
    $validaNota2=comprobarNotaValida($nota2);
    $validaNota3=comprobarNotaValida($nota3);

    $resultadoMedia=0;

    if($validaNota1 && $validaNota2 && $validaNota3){
        $resultadoMedia=calcularNotaMedia($nota1, $nota2, $nota3);
        $resultadoCalificacion=calificaion($resultadoMedia);
        echo "El alumno ", $alumno, " con notas ", $nota1, ", ", $nota2, ", ", $nota3, " su media es ", $resultadoMedia, " y su calificacion ", $resultadoCalificacion;
    }else{
        echo "Las notas no eran correctas";
    }

}

?>