<?php
$img = imagecreatefromjpeg(__DIR__ . '/src/gato.jpeg');
$w = imagesx($img);
$h = imagesy($img);

header('Content-Type: image/jpeg');

if (!isset($_GET['n'])) {
    // Sin parámetro: cuadrado gris (el trozo "dado la vuelta")
    $gris = imagecreatetruecolor(100, 100);
    imagefill($gris, 0, 0, imagecolorallocate($gris, 80, 80, 80));
    imagejpeg($gris);
} elseif ($_GET['n'] === 'completa') {
    imagejpeg($img);
} else {
    $n = (int)$_GET['n'];            // 0..8
    $tw = intdiv($w, 3);
    $th = intdiv($h, 3);
    $trozo = imagecrop($img, [
        'x' => ($n % 3) * $tw,
        'y' => intdiv($n, 3) * $th,
        'width' => $tw,
        'height' => $th,
    ]);
    imagejpeg($trozo);
}