<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    for ($b = 9; $b >= 1; $b--) {
    for ($a = 1; $a <= 9 - $b; $a++) {
        echo '*';
    }
    echo "<br>";
}
    ?>
</body>

</html>