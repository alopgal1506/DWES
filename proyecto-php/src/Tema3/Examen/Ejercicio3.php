<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <form method="post" action="">
        <label>Número: <input type="number" name="numero" required> </label>
        <button type="submit">Generar Tabla</button><br>
    </form>
</body>
</html>

<?php
function mostrarResultado($numero){
    echo"<table border='1'>";
    echo "<tr>";
        echo "<td>Operación</td><td>Resultado</td>";
    echo "</tr>";
    for($i=1; $i<=10; $i++){
        echo "<tr>";
            echo "<td>",$i, " x ", $numero, " = </td>";
            echo "<td>",$i*$numero, "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

if (isset($_POST['numero'])) {

    $numero = $_POST['numero'];
    mostrarResultado($numero);

}
?>