<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Igual que el programa anterior, pero esta vez la pirámide estará hueca (se debe ver únicamente el
contorno hecho con asteriscos). -->
    <?php
    echo '<div style="font-family: monospace;">';

    for ($b = 1; $b <= 5; $b++) {

        for ($a = 1; $a <= 5 - $b; $a++) {
            echo '&nbsp;';
        }

        for ($a = 1; $a <= 2 * $b - 1; $a++) {
            if ($a == 1 || $a == 2 * $b - 1 || $b == 5) {
                echo '*';
            } else {
                echo '&nbsp;';
            }
        }

        echo "<br>";
    }

    echo '</div>';
    ?>

</body>

</html>