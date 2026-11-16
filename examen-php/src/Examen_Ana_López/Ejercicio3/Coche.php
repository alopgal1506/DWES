<?php
class Coche extends Vehiculo{
    private $puertas;

    #[Override]
    function __construct($matricula, $km = 0, $puertas=4){
        return parent::__construct($matricula, $km);
        this->puertas=$puertas;
    }

    function getPuertas(){
    return $this->puertas;
    }

    function setPuertas($puertas){
        $this->puertas=$puertas;
        return $this->puertas;
    }

    function __toString(){
        return parent::__toString().
        ", Puertas: ".$this->puertas;
    }

    function quemaRueda(){
        return "Estoy quemando ruedas";
    }


}
?>