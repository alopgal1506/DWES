<?php
require_once 'Articulo.php';
session_start();

if (!isset($_SESSION['cesta'])) {
    $_SESSION['cesta'] = [];
}

$total = 0;
?>

<h1>Mi cesta</h1>

<table border="1">
    <tr>
        <th>Código</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Unidades</th>
        <th>Subtotal</th>
    </tr>

    <?php foreach ($_SESSION['cesta'] as $codigo => $item):

        $subtotal = $item->getPrecioVenta() * $item->getStock();
        $total += $subtotal;

    ?>

        <tr>
            <td><?= htmlspecialchars($item->getCodigo()) ?></td>
            <td><?= htmlspecialchars($item->getDescripcion()) ?></td>
            <td><?= number_format($item->getPrecioVenta(), 2) ?> €</td>
            <td><?= $item->getStock() ?></td>
            <td><?= number_format($subtotal, 2) ?> €</td>
        </tr>

    <?php endforeach; ?>

    <tr>
        <td colspan="4">TOTAL:</td>
        <td><?= number_format($total, 2) ?> €</td>
    </tr>
</table>