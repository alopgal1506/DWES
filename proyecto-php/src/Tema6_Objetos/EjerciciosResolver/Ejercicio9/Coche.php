<?php
class Coche
{
    private $matricula;
    private $modelo;
    private $precio;
    private static $modeloCaro="";
    private static $precioCaro=0;

    function __construct($matricula, $modelo, $precio)
    {
        $this->matricula = $matricula;
        $this->modelo = $modelo;
        $this->precio = $precio;
    }

    public function getMatricula()
    {
        return $this->matricula;
    }

    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }


    public static function getModeloCaro()
    {
        return self::$modeloCaro;
    }

    public static function setModeloCaro($modeloCaro)
    {
        self::$modeloCaro = $modeloCaro;

    }


    public static function getPrecioCaro()
    {
        return self::$precioCaro;
    }


    public static function setPrecioCaro($precioCaro)
    {
        self::$precioCaro = $precioCaro;

    }


    /*Cuando quiero devolver de los objetos creados el más caro */
    public static function masCaro(){
        return self::$modeloCaro . " - " . self::$precioCaro . " €";
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


    // Las tres primeras celdas, compartidas por Coche y CocheLujo
    protected function celdas()
    {
        return "<td>" . htmlspecialchars($this->matricula) . "</td>"
             . "<td>" . htmlspecialchars($this->modelo) . "</td>"
             . "<td>" . $this->getPrecio() . " €</td>";
    }
 
    public function __toString(): string
    {
        return $this->celdas() . "<td>No procede</td>";
    }

}

?>
