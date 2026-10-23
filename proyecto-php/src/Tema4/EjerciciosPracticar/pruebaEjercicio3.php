<?php
session_start();

if (isset($_GET['cerrar'])) {
    $_SESSION = [];
    session_destroy();
    header("Location: Ejercicio3.php");
    exit;
}

echo "Hemos iniciado sesión.";

echo "<form method='get'>";
echo "<input type='submit' name='cerrar' value='Cerrar sesión'>";
echo "</form>";
?>