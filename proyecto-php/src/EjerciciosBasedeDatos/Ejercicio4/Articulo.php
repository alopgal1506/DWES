<?php
require_once 'AlmacenDB.php';
class Articulo{
    private $codigo;
    private $descripcion;
    private $precioCompra;
    private $precioVenta;
    private $stock;

    public function __construct($codigo, $descripcion, $precioCompra, $precioVenta, $stock){
        $this->codigo=$codigo;
        $this->descripcion=$descripcion;
        $this->precioCompra=$precioCompra;
        $this->precioVenta=$precioVenta;
        $this->stock=$stock;
    }
 
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getPrecioCompra()
    {
        return $this->precioCompra;
    }

    public function setPrecioCompra($precioCompra)
    {
        $this->precioCompra = $precioCompra;

        return $this;
    }

    public function getPrecioVenta()
    {
        return $this->precioVenta;
    }

    public function setPrecioVenta($precioVenta)
    {
        $this->precioVenta = $precioVenta;

        return $this;
    }
 
    public function getStock()
    {
        return $this->stock;
    }
 
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }



    public function insert()
    {
        $conexion = AlmacenDB::connectDB();
        $insercion = "INSERT INTO articulo (codigo, descripcion, precioCompra, precioVenta, stock) VALUES ('$this->codigo','$this->descripcion','$this->precioCompra','$this->precioVenta', '$this->stock')";
        $conexion->exec($insercion);
        $conexion = null;
    }

    public function delete()
    {
        $conexion = AlmacenDB::connectDB();
        $borrado = "DELETE FROM articulo WHERE codigo='$this->codigo'";
        $conexion->exec($borrado);
        $conexion = null;
    }

    public function update() {
        $conexion = AlmacenDB::connectDB();
        $actualiza = "UPDATE articulo SET descripcion='$this->descripcion', precioCompra='$this->precioCompra', precioVenta='$this->precioVenta', stock='$this->stock'
        WHERE codigo='$this->codigo'";
        $conexion->exec($actualiza);
        $conexion=null;
    }

    public static function getArticulos() {
        $conexion = AlmacenDB::connectDB();
        $seleccion = "SELECT codigo, descripcion, precioCompra, precioVenta, stock FROM articulo";
        $consulta = $conexion->query($seleccion);
        $articulos = [];
        while ($registro = $consulta->fetchObject()) {
            $articulos[] = new Articulo($registro->codigo, $registro->descripcion, $registro->precioCompra, $registro->precioVenta, $registro->stock);
        }
        $conexion = null;
        return $articulos;
    }

    public static function getArticuloById($codigo) {
        $conexion = AlmacenDB::connectDB();
        $seleccion = "SELECT codigo, descripcion, precioCompra, precioVenta, stock FROM articulo WHERE codigo='$codigo'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount()>0) {
            $registro = $consulta->fetchObject();
            $oferta = new Articulo($registro->codigo, $registro->descripcion, $registro->precioCompra, $registro->precioVenta, $registro->stock);
            $conexion=null;
            return $oferta;
        }else{
            $conexion=null;
            return false;
        }
    }

    public function entradaAlmacen($stockEntrante){
        $conexion = AlmacenDB::connectDB();
        $actualiza = "UPDATE articulo SET stock=stock+$stockEntrante
        WHERE codigo='$this->codigo'";
        $filas = $conexion->exec($actualiza);
        $conexion=null;
        $correcto = $filas > 0;
        if ($correcto) {
            $this->stock += $stockEntrante;
        }
        return $correcto;
    }


    public function salidaAlmacen($stockSacado){
        $conexion = AlmacenDB::connectDB();
        $actualiza = "UPDATE articulo SET stock=stock-$stockSacado
        WHERE codigo='$this->codigo' AND stock>=$stockSacado";
        $filas = $conexion->exec($actualiza);
        $conexion=null;
        $correcto = $filas > 0;
        if ($correcto) {
            $this->stock -= $stockSacado;
        }
        return $correcto;
    }
}
?>