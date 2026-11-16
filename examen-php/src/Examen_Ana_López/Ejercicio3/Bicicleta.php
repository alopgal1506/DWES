<?php
class Bicicleta extends Vehiculo{

    #[Override]
    function __construct($matricula, $km = 0){
        return parent::__construct($matricula, $km);
    }

    function __toString(){
        return parent::__toString();
    }

    function hacerCaballito(){
        return "Estoy haciendo el caballito";
    }


}
?>