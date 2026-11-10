<?php
session_start();

if (!isset($_SESSION['resultados'])) {
    $_SESSION['resultados'] = [
        "suma" => 0,
        "contador" => 0,
        "media" => 0,
    ];
}

if (isset($_POST['numero'])) {
    $numero = $_POST['numero'];
    /*Recoger valores */
    $suma = $_SESSION['resultados']['suma'];
    $contador = $_SESSION['resultados']['contador'];
    $media = $_SESSION['resultados']['media'];
    /*Devolver Valores */
    $suma += $numero;
    $contador++;
    $media = $suma / $contador;

    $_SESSION['resultados'] = [
        "suma" => $suma,
        "contador" => $contador,
        "media" => $media
    ];
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
    <form method="post">
        <p>Introduce un número:</p> <input type="text" name="numero"><br>
        <input type="submit" value="Enviar">
    </form>

    <table border="1">
        <tr>
            <th>Suma</th>
            <th>Contador</th>
            <th>Media</th>
        </tr>

        <tr>
            <td><?= $_SESSION['resultados']['suma'] ?></td>
            <td><?= $_SESSION['resultados']['contador'] ?></td>
            <td><?= $_SESSION['resultados']['media'] ?></td>
        </tr>
    </table>

</body>

</html>