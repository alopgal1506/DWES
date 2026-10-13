<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function mostrarOjo($fila, $columna)
    {
        echo "<table border='1'>";
        for ($i = 0; $i < 10; $i++) {
            echo "<tr>";
            for ($b = 0; $b < 10; $b++) {
                if ($fila == $i && $columna == $b) {
                    echo "<td><img src='./src/ojoAbierto.png' widht='25px' height='25px'/></td>";
                } else {
                    echo "<td>
                        <form method='get'>
                            <input type='hidden' name='fila' value='$i'>
                            <input type='hidden' name='columna' value='$b'>
                            <button type='submit'><img src='./src/ojoCerrado.png' widht='25px' height='25px'/></button>
                        </form>
                    </td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    if (isset($_GET['fila']) && isset($_GET['columna'])) {
        $fila = $_GET['fila'];
        $columna = $_GET['columna'];
        mostrarOjo($fila, $columna);
    }
    ?>
</body>

</html>