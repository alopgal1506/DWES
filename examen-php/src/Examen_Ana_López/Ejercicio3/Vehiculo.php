<?php
abstract class Vehiculo{
    private $matricula;
    private $km;

    function __construct($matricula, $km=0){
        $this->matricula=$matricula;
        $this->$km=$km;
    }
    function getMatricula(){
    return $this->matricula;
    }
    function getKm(){
    return $this->km;
    }

    function setKm($km){
        $this->km=$km;
        return $this->km;
    }

    function setMatricula($matricula){
        $this->matricula=$matricula;
        return $this->matricula;
    }
    function recorre($km){
        $this->km+=$km;
    }

    function getKmTotales(){
        return $this->km;
    }

     function __toString(){
        return "Matricula: ".$this->matricula.
        ", Kilometros Totales: ".$this->km;
    }
}
?>