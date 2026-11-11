<?php
class Producto{
    private $nombre;
    private $precio;
    private $stock;

    function __construct($nombre, $precio, $stock){
        $this->nombre=$nombre;
        $this->precio=$precio;
        $this->stock=$stock;
    }


    public function getNombre()
    {
        return $this->nombre;
    }


    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    
    public function getPrecio()
    {
        return $this->precio;
    }


    public function setPrecio($precio)
    {
        $this->precio = $precio;

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

    function mostrarInformacion(){
        return "<td> ".$this->nombre."</td><td> ".$this->precio."</td><td> ".$this->stock. "</td>";
    }


    function calcularValorStock(){
        return $this->precio*$this->stock;
    }
}
?>