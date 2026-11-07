<?php
class Zona
{
    private $nombre;
    private $entradasDisponibles;
    private $precioEntradas;
    private $recaudadoZona;
    private static $dineroTotal = 0;

    function __construct($nombre, $entradasDisponibles, $precioEntradas)
    {
        $this->nombre = $nombre;
        $this->entradasDisponibles = $entradasDisponibles;
        $this->precioEntradas = $precioEntradas;
        $this->recaudadoZona=0;
    }

    public function venderEntradas($cantidadEntradas)
    {
        if ($cantidadEntradas > $this->entradasDisponibles || $cantidadEntradas <= 0) {
    return false;
}

        $this->entradasDisponibles -= $cantidadEntradas;
        $this->recaudadoZona += $cantidadEntradas * $this->precioEntradas;
        self::$dineroTotal += $cantidadEntradas * $this->precioEntradas;
        return true;
    }

    public function __toString(): string
{
    return $this->nombre . ": " . $this->entradasDisponibles . " entradas disponibles a "
         . $this->precioEntradas . " € | Recaudado en la zona: " . $this->recaudadoZona
         . " € | Total general: " . self::$dineroTotal . " €";
}
}
