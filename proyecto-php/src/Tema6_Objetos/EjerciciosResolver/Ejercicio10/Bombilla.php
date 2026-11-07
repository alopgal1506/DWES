<?php
class Bombilla
{
    private $estado;
    private $potenciaConsumida;
    private $ubicacion;
    private static $fusible = true;

    public function __construct($estado, $potenciaConsumida, $ubicacion)
    {
        $this->estado = $estado;
        $this->potenciaConsumida = $potenciaConsumida;
        $this->ubicacion = $ubicacion;
    }

    public function estaEncendida()
    {
        return self::$fusible && $this->estado;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }

    public function getPotenciaConsumida()
    {
        return $this->potenciaConsumida;
    }

    public function setPotenciaConsumida($potenciaConsumida)
    {
        $this->potenciaConsumida = $potenciaConsumida;
        return $this;
    }

    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
        return $this;
    }

    public static function saltarFusibles()
    {
        self::$fusible = false;
    }

    public static function encenderFusibles()
    {
        self::$fusible = true;
    }
    public static function getFusible()
    {
        return self::$fusible;
    }

    public static function setFusible($fusible)
    {
        return self::$fusible=$fusible;

    }


}
?>