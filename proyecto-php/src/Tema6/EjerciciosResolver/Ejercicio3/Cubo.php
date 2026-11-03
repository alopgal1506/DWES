<?php
class Cubo
{
    private $capacidad;
    private $contenidoActual;

    //Constructor
    public function __construct($capacidad, $contenidoActual)
    {
        $this->capacidad = $capacidad;
        $this->contenidoActual = $contenidoActual;
    }

    public function getCapacidad()
    {
        return $this->capacidad;
    }
    public function getContenidoActual()
    {
        return $this->contenidoActual;
    }

    public function espacioLibre()
    {
        return $this->capacidad - $this->contenidoActual;
    }

   public function verter($destino)
    {
        if ($this->contenidoActual <= $destino->espacioLibre()) {
            $litros = $this->contenidoActual;
        } else {
            $litros = $destino->espacioLibre();
        }

        $this->contenidoActual -= $litros;
        $destino->contenidoActual += $litros;

        return $litros;
    }
}
