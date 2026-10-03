<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!-- Escribe un programa que pinte por pantalla una pirámide rellena a base de asteriscos. La base de la
pirámide debe estar formada por 9 asteriscos. -->
    <?php

    for ($b = 1; $b <= 5; $b++) {

        for ($a = 1; $a <= 5 - $b; $a++) {
            echo '&nbsp;';
        }

        for ($a = 1; $a <= 2 * $b - 1; $a++) {
            echo '*';
        }

        echo "<br>";
    }

    ?>
</body>

</html>