<?php
class Vehiculo{
    private static $kmTotales=0;
    private static $vehiculosCreados=0;
    protected $kmRecorridos=0;

    public function __construct(){
        self::$vehiculosCreados++;
    }

    public static function getVehiculosCreados(){
        return self::$vehiculosCreados;
    }

    public static function getKmTotales(){
        return self::$kmTotales;
    }

    function getKmRecorridos(){
        return $this->kmRecorridos;
    }

    public function anda($km) {
        $this->kmRecorridos += $km;
        self::$kmTotales += $km;
    }
}
?>