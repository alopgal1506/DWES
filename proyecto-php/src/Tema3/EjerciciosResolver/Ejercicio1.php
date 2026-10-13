<?php
$solucion = "gato";   // cambia esto por lo que aparece en tu imagen
$resultado = "";

if (isset($_POST['respuesta'])) {
    $intento = strtolower(trim($_POST['respuesta']));
    $resultado = ($intento == $solucion) ? "acierto" : "fallo";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Adivina la imagen</title>
<script>
function ver(img, n) {
    img.src = "trozo.php?n=" + n;                                // mostrar el trozo
    setTimeout(function () { img.src = "trozo.php"; }, 2000);    // ocultarlo a los 2 s
}
</script>
</head>
<body>
<h1>Adivina la imagen</h1>

<?php if ($resultado == "acierto"): ?>

    <img src="trozo.php?n=completa" width="450">
    <p>¡Enhorabuena, has acertado!</p>

<?php elseif ($resultado == "fallo"): ?>

    <p>Has fallado, sigue intentándolo.</p>
    <a href="index.php"><button>Volver</button></a>

<?php else: ?>

    <table>
    <?php for ($f = 0; $f < 3; $f++): ?>
        <tr>
        <?php for ($c = 0; $c < 3; $c++): ?>
            <td>
                <img src="trozo.php" width="150" height="150"
                     onclick="ver(this, <?= $f * 3 + $c ?>)">
            </td>
        <?php endfor; ?>
        </tr>
    <?php endfor; ?>
    </table>

    <form method="post">
        <input type="text" name="respuesta">
        <button type="submit">Comprobar</button>
    </form>

<?php endif; ?>
</body>
</html>