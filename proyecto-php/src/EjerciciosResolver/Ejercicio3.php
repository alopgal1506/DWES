<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <form method="get">
        <p>Introduce el color de fondo:</p> <input type="text" name="colorFondo"><br>
        <p>Introduce el tipo de letra:</p> <input type="text" name="tipoLetra"><br>
        <p>Introduce la alineación del texto:</p> <input type="text" name="alinearTexto"><br>
        <input type="submit" value="Enviar">


        <?php
        if (isset($_GET['colorFondo']) && isset($_GET['tipoLetra']) && isset($_GET['alinearTexto'])) {
            echo "<body style='background-color:" . $_GET['colorFondo'] . "'>";
            echo "<p style='font-family:" . $_GET['tipoLetra'] . "'>Texto con tipo de letra</p>";
            echo "<p style='text-align:" . $_GET['alinearTexto'] . "'>Texto alineado</p>";
        }
        ?>
    </form>
</body>

</html>