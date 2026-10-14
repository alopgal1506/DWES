<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
</head>
<body>

    <h1>Calculadora</h1>

    <form action="" method="POST">

        <label>Introduce el primer número:</label>
        <input type="number" name="numero1" step="any" required>
        <br><br>

        <label>Introduce el segundo número:</label>
        <input type="number" name="numero2" step="any">
        <br><br>

        <label>Selecciona la operación:</label>
        <select name="operacion" required>
            <option value="suma">Suma (+)</option>
            <option value="resta">Resta (-)</option>
            <option value="multiplicacion">Multiplicación (*)</option>
            <option value="division">División (/)</option>
            <option value="potencia">Potencia (^)</option>
            <option value="raiz">Raíz cuadrada (√)</option>
        </select>
        <br><br>

        <input type="submit" name="calcular" value="Calcular">

    </form>

    <?php

    if (isset($_POST['calcular'])) {

        $numero1 = $_POST['numero1'];
        $numero2 = $_POST['numero2'];
        $operacion = $_POST['operacion'];

        switch ($operacion) {

            case "suma":
                $resultado = $numero1 + $numero2;
                break;

            case "resta":
                $resultado = $numero1 - $numero2;
                break;

            case "multiplicacion":
                $resultado = $numero1 * $numero2;
                break;

            case "division":
                if ($numero2 == 0) {
                    echo "No se puede dividir entre cero.";
                    break;
                }

                $resultado = $numero1 / $numero2;
                break;

            case "potencia":
                $resultado = pow($numero1, $numero2);
                break;

            case "raiz":
                if ($numero1 < 0) {
                    echo "No se puede calcular la raíz cuadrada de un número negativo.";
                    break;
                }

                $resultado = sqrt($numero1);
                break;
        }

        if (
            !($operacion == "division" && $numero2 == 0) &&
            !($operacion == "raiz" && $numero1 < 0)
        ) {
            echo "<h2>Resultado: " . $resultado . "</h2>";
        }

    }

    ?>

</body>
</html>