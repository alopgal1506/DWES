<?php
class Producto{
    private $codigo;
    private $nombre;
    private $precio;
    static $productoCaro="";
    static $precioCaro=0;

    function __construct($codigo, $nombre, $precio){
        $this->codigo=$codigo;
        $this->nombre=$nombre;
        $this->precio=$precio;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;

        return $this;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;

        return $this;
    }


    public function getPrecio(){
        return $this->precio;
    }
 
    public function setPrecio($precio){
        $this->precio = $precio;
        return $this;
    }


    public function getProductoCaro(){
        return self::$productoCaro;
    }


    public function setProductoCaro($productoCaro){
        self::$productoCaro = $productoCaro;
        return self::$productoCaro;
    }

    function __toString(){
        return "<tr><td>".$this->codigo."</td>
        <td>".$this->nombre."</td>
        <td>".$this->precio."</td>
        <td>No procede</td></tr>";
    }

    function masCaro(){
        return "El produto mas caro es ".$this->nombre." con un precio ".$this->precio;

    }
}
?>