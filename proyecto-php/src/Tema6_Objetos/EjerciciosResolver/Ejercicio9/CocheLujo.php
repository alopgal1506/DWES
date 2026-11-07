<?php
class CocheLujo extends Coche {

    private $suplemento;

    function __construct($matricula, $modelo, $precio, $suplemento)
    {
        parent::__construct($matricula, $modelo, $precio);
        $this->suplemento = $suplemento;
    }
    

    public function getSuplemento()
    {
        return $this->suplemento;
    }


    public function setSuplemento($suplemento)
    {
        $this->suplemento = $suplemento;

        return $this;
    }

    public function getPrecio()
    {
        return parent::getPrecio() + $this->suplemento;
    }
 
    public function __toString(): string
    {
        return $this->celdas() . "<td>" . $this->suplemento . " €</td>";
    }

}
?>