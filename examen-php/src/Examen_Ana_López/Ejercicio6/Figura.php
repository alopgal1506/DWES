<?php
abstract class Figura{

    private $nombre;
    static $totalFiguras=0;

    function __construct($nombre){
        $this->nombre=$nombre;  
    }

    function getNombre(){
    return $this->nombre;
    }

    function setNombre($nombre){
        $this->nombre=$nombre;
        return $this->nombre;
    }

    function getTotalFiguras(){
    return $this->totalFiguras++;
    }

    function area(){
        return 0;
    }

    function __toString(){
        return "Nombre: ". $this->nombre;
    }
}
?>