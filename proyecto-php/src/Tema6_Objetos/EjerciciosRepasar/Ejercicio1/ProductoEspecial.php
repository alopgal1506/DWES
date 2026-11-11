<?php

class ProductoEspecial extends Producto
{
    private $descuento;

    function __construct($codigo, $nombre, $precio, $descuento)
    {
        parent::__construct($codigo, $nombre, $precio);
        $this->descuento = $descuento;
    }

    public function getDescuento()
    {
        return $this->descuento;
    }

    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;

        return $this;
    }

    public function getPrecio()
    {
        $porc = 100 - $this->descuento;
        $res = parent::getPrecio() * $porc / 100;
        return $res;
    }

    public function masCaro()
    {
        return "El produto mas caro es " . parent::getNombre() . " con un precio " . parent::getPrecio();
    }

    #[Override]
    public function __toString()
    {
        return "<tr>
        <td>" . parent::getCodigo() . "</td>
        <td>" . parent::getNombre() . "</td>
        <td>" . $this->getPrecio() . "</td>
        <td>" . $this->descuento . "</td>
    </tr>";
    }
}
