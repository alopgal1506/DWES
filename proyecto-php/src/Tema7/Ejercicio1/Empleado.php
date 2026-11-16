<?php
class Empleado{
    private $nombre;
    private $sueldo;

    public function __construct($nombre, $sueldo) {
        $this->nombre = $nombre;
        $this->sueldo=$sueldo;
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

    public function getSueldo()
    {
        return $this->sueldo;
    }

    public function setSueldo($sueldo)
    {
        $this->sueldo = $sueldo;

        return $this;
    }

    
}
?>