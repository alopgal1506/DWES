<?php
session_start();

/* Acabar con la sesión */
if (isset($_POST['acabar'])) {
    $_SESSION = [];
    session_destroy();
    header('Location: Ejercicio1.php');
    exit;
}

/*Volver a la pagina principal */
if (isset($_POST['volver'])) {
    header('Location: Ejercicio1.php');
}

/* Prueba de si tenemos colores  */
if (!isset($_SESSION['color'])) {
    $_SESSION['color'] = [];
}

/* Color de fondo por defecto */
$colorFondo = '#FFFFFF';

/* Si se pulsa comprobamos que sea una que se encuentre en la sesión
y se guarde en la variable*/
if (isset($_POST['elegir']) && in_array($_POST['elegir'], $_SESSION['color'])) {
    $colorFondo = $_POST['elegir'];
}

echo '<html><body bgcolor="' . $colorFondo . '">';

/* Mostrar los colores */
echo '<table border="1">';
echo '<tr>';

for ($i = 0; $i < count($_SESSION['color']); $i++) {
    $color = $_SESSION['color'][$i];

    echo '<td bgcolor="' . $color . '" width="100" height="100">';
    echo '<form method="post" action="">';
    echo '<button type="submit" name="elegir" value="' . $color . '">' . $color . '</button>';
    echo '</form>';
    echo '</td>';

    if (($i + 1) % 5 == 0 && $i + 1 < count($_SESSION['color'])) {
        echo '</tr><tr>';
    }
}

echo '</tr>';
echo '</table>';
echo "<form method='post' action=''>";
echo "<button type='submit' name='volver'>Volver a la pagina principal</button>";
echo "</form>";

echo "<form method='post' action=''>";
echo "<button type='submit' name='acabar'>Acabar sesion</button>";
echo "</form>";
echo '</body></html>';
?>