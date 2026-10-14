<?php
/*Se encuentra un número en el array */
    $numeros = [1, 5, 8, 10, 15];

    $numero = 7;

    if (in_array($numero, $numeros)) {
        echo "Está en el array";
    } else {
        echo "No está en el array";
    }
?>

<?php
/*Añadir un número en el array */
    $numeros = [1, 5, 8, 10, 15];

    array_push($numeros, 20);

    print_r($numeros);
?>

/*Eliminar un número del array por su valor */

<?php
    $numeros = [1, 5, 8, 10, 15];

    $numero = 8;

    foreach ($numeros as $indice => $valor) {
        if ($valor == $numero) {
            unset($numeros[$indice]);
        }
    }

    print_r($numeros);
?>

//http://localhost:8080/Tema3/EjerciciosResolver/primos.php