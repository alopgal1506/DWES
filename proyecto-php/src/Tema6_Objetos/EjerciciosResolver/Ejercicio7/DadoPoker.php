<?php
class DadoPoker{
    private $figuras;
    private $nombreFigura;
    private static $tiradasTotales = 0;

    function __construct() {
        $this->figuras = array("As", "K", "Q", "J", 7, 8);
    }

    public function tira(){
        $resultado = random_int(0,5);
        $this->nombreFigura = $this->figuras[$resultado];
        self::$tiradasTotales++;
    }

    public function nombreFigura(){
        return "La ultima figura que ha salido fue: ".$this->nombreFigura;
    }

    public static function getTiradasTotales(){
        return self::$tiradasTotales;
    }
}
?>