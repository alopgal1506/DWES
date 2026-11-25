<?php
class Asignatura{
    private $codigo;
    private $nombre;

    public function __construct($codigo=0, $nombre){
        $this->codigo=$codigo;
        $this->nombre=$nombre;
    }

    
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
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

    
}

?>