<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portero</title>
</head>
<body>
    <table border="1">
        <?php
        echo "<tr>";
        echo "<th>Número de bloque</th>";
        echo "<th>Piso</th>";
        echo "<th>Llamar</th>";
        echo "</tr>";

        for ($i = 1; $i <= 10; $i++) {
            for ($b = 1; $b <= 7; $b++) {
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $b . "</td>";
                echo "<td>
                        <form action='prueba4.php' method='get'>
                            <input type='hidden' name='bloque' value='$i'>
                            <input type='hidden' name='piso' value='$b'>
                            <button type='submit'>Llamar</button>
                        </form>
                      </td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>