<?php
class Ciculo extends Figura{
    private $radio;


    #[Override]
    function __construct($nombre, $radio)
    {
        return parent::__construct($nombre);
        $this->radio=$radio;
    }


    function getRadio(){
    return $this->radio;
    }

    function setRadio($radio){
        $this->radio=$radio;
        return $this->radio;
    }

    function area(){
        return 3.14*pow($this->radio,2);
    }

    function __toString(){
        return parent::__toString().", Radio: ". $this->radio;
    }
}
?>