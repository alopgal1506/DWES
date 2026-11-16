<?php
class Rectangulo extends Figura{
    private $base;
    private $altura;


    #[Override]
    function __construct($nombre, $base, $altura)
    {
        return parent::__construct($nombre);
        $this->base=$base;
        $this->altura=$altura;
    }
    
    function getBase(){
        return $this->base;
    }

    function setBase($base){
        $this->base=$base;
        return $this->base;
    }
 
    function getAltura(){
        return $this->altura;
    }

    function setAltura($altura){
        $this->altura=$altura;
        return $this->altura;
    }

    function area(){
        return $this->base*$this->altura;
    }

    function __toString(){
        return parent::__toString().", Base: ". $this->base.
        ", Altura: ". $this->altura;
    }
}
?>