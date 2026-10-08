<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <form method="get">
      Introduce la altura: <input type="number" name="altura"><br>
      Introduce el diámetro: <input type="number" name="diametro"><br>
      <input type="submit" value="Enviar">
   </form>

   <?php

   function calcularVolumen($altura, $diametro)
   {
      $radio = $diametro / 2;
      $volumen = 3.14 * pow($radio, 2) * $diametro * $altura;
      return $volumen;
   }

   if (isset($_GET['altura']) && isset($_GET['diametro'])) {
      $altura = $_GET['altura'];
      $diametro = $_GET['diametro'];
      $volumen = calcularVolumen($altura, $diametro);

      echo "<h1>Calculo del volúmen de un cilindrio</h1>";
      echo "<div style='display:flex'>";
      echo "<img src='../src/cilindro.jpg' width='50' height='50'/>";
      echo "<p>El volumen del cilindro es ", $volumen, "</p>";
      echo "</div>";
   }
   ?>
</body>

</html>