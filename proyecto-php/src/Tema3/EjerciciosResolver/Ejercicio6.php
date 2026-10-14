<?php

define('RESPUESTA_CORRECTA', 'gato');
define('IMAGEN', './src/gato.jpeg');

function procesarIntento() {
    $estado = 'jugando';
    $mensaje_error = '';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $intento = strtolower(trim($_POST['respuesta']));
        
        if ($intento === RESPUESTA_CORRECTA) {
            $estado = 'ganado';
        } else {
            $estado = 'perdido';
            $mensaje_error = "La respuesta no es correcta.";
        }
    }
    
    return [
        'estado' => $estado,
        'mensaje_error' => $mensaje_error
    ];
}

function generarCelda($numero) {
    return "
        <div class=\"celda c{$numero}\">
            <div class=\"tapa\"></div>
        </div>
    ";
}

function generarMosaico() {
    $html = '<div class="mosaico">';
    for ($i = 1; $i <= 9; $i++) {
        $html .= generarCelda($i);
    }
    $html .= '</div>';
    return $html;
}

function generarFormulario() {
    return '
        <form method="POST" action="">
            <input type="text" name="respuesta" placeholder="Adivina de que se trata" required>
            <br><br>
            <button type="submit">Comprobar</button>
        </form>
    ';
}

function generarVistaGanado() {
    return "
        <p class=\"mensaje exito\">Has acertado, es un " . RESPUESTA_CORRECTA . ".</p>
        <img src=\"" . IMAGEN . "\" alt=\"Imagen completa\" class=\"imagen-completa\">
    ";
}

function generarVistaPerdido($mensaje_error) {
    return "
        <p class=\"mensaje fallo\">{$mensaje_error}</p>
        <a href=\"Ejercicio1.php\" class=\"btn-volver\" style=\"background-color: #dc3545;\">Volver a intentarlo</a>
    ";
}

function generarJavaScript() {
    return "
        <script>
            const celdas = document.querySelectorAll('.celda');
            
            celdas.forEach(celda => {
                celda.addEventListener('click', function() {
                    const tapa = this.querySelector('.tapa');
                    
                    if (tapa.classList.contains('oculta')) return;

                    tapa.classList.add('oculta');
                    
                    setTimeout(() => {
                        tapa.classList.remove('oculta');
                    }, 2000);
                });
            });
        </script>
    ";
}

function generarVistaJuego() {
    return generarMosaico() . generarFormulario() . generarJavaScript();
}

$resultado = procesarIntento();
$estado = $resultado['estado'];
$mensaje_error = $resultado['mensaje_error'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego de Adivinar Imagen</title>
    <style>
        body { font-family: Arial, sans-serif;  background-color: #f4f4f9; padding: 20px; }
        
        .mosaico {
            display: grid;
            grid-template-columns: repeat(3, 100px);
            grid-template-rows: repeat(3, 100px);
            gap: 4px;
            margin: 20px auto;
            padding: 4px;
            border-radius: 8px;
        }

        .celda {
            width: 100px;
            height: 100px;
            background-image: url('<?php echo IMAGEN; ?>');
            background-size: 300px 300px;
            position: relative;
            cursor: pointer;
            border-radius: 4px;
            overflow: hidden;
        }

        <?php
        for ($i = 1; $i <= 9; $i++) {
            $x = (($i - 1) % 3) * 50;
            $y = intdiv($i - 1, 3) * 50;
            echo ".c{$i} { background-position: {$x}% {$y}%; }\n        ";
        }
        ?>

        .tapa {
            top: 0; left: 0; width: 100%; height: 100%;
            background-color: #2ECC71;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 24px;
            transition: opacity 0.3s;
        }

        .tapa.oculta {
            opacity: 0;
            pointer-events: none;
        }

        .mensaje { font-size: 20px; font-weight: bold; margin: 20px 0; }
        .exito { color: green; }
        .fallo { color: red; }
        
        input[type="text"] { padding: 10px; font-size: 16px; width: 200px; }
        button, .btn-volver { 
            padding: 10px 20px; 
            font-size: 16px; 
            cursor: pointer; 
            background-color: #28a745; 
            color: white; 
            border: none; 
            border-radius: 5px; 
            text-decoration: none; 
            display: inline-block; 
            margin-top: 10px;
        }
        button:hover, .btn-volver:hover { background-color: #218838; }
        
        .imagen-completa { 
            max-width: 300px; 
            border-radius: 8px; 
            box-shadow: 0 4px 8px rgba(0,0,0,0.2); 
        }
    </style>
</head>
<body>

    <?php
    if ($estado === 'jugando') {
        echo generarVistaJuego();
    } elseif ($estado === 'ganado') {
        echo generarVistaGanado();
    } elseif ($estado === 'perdido') {
        echo generarVistaPerdido($mensaje_error);
    }
    ?>

</body>
</html>