<?php
require_once 'Estado.php';

class Factura{

    const IVA = 21;


    private $importeBase;
    private $fecha;
    private $estado;
    private $productos;
    

    public function __construct($fecha, $estado = Estado::Pendiente){
        $this->importeBase = 0;
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->productos = array();
    }

    public function anadeProducto($nombre, $precio, $cantidad){
        $this->productos[] = array(
            'nombre' => $nombre,
            'precio' => $precio,
            'cantidad' => $cantidad
        );

        $this->importeBase += $precio * $cantidad;
    }

    public function imprimeFactura(){
        echo '<h2>Factura</h2>';
        echo 'Fecha: ' . $this->fecha . '<br>';
        echo 'Estado: ' . $this->estado->value . '<br><br>';

        echo '<strong>Productos:</strong><br>';
        foreach ($this->productos as $producto) {
            $subtotal = $producto['precio'] * $producto['cantidad'];
            echo $producto['nombre'] . ' - '
               . $producto['precio'] . ' € x '
               . $producto['cantidad'] . ' = '
               . $subtotal . ' €<br>';
        }

        $iva = $this->importeBase * self::IVA / 100;
        $total = $this->importeBase + $iva;

        echo '<br>Importe base: ' . $this->importeBase . ' €<br>';
        echo 'IVA (' . self::IVA . '%): ' . $iva . ' €<br>';
        echo '<strong>Total: ' . $total . ' €</strong><br>';
    }


    public function getImporteBase(){
        return $this->importeBase;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado(Estado $estado){
        $this->estado = $estado;
    }
}
?>

