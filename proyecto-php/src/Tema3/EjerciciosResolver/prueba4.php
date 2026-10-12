<?php
if (isset($_GET['bloque']) && isset($_GET['piso'])) {
    $bloque = $_GET['bloque'];
    $piso = $_GET['piso'];
    echo "Usted ha llamado al piso " . $piso . " del bloque " . $bloque;
} else {
    echo "No se ha seleccionado ningún piso.";
}
?>