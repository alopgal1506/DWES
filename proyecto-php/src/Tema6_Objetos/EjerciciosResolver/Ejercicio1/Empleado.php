<?php 
class Empleado{
    private $nombre;
    private $sueldo;

    //Constructor
    public function __construct($nombre, $sueldo){
        $this->nombre=$nombre;
        $this->sueldo=$sueldo;
    }

    public function asigna($nombre, $sueldo){
        if($this->getNombre()==$nombre){
            $this->sueldo=$sueldo;
        }
    }
    
    public function getSueldo() {
        return $this->sueldo;
    }
    public function getNombre() {
        return $this->nombre;
    }

    

    public function imprimir(){
        $mensaje=$this->nombre." no debe pagar impuestos";
        if($this->getSueldo()>3000){
         $mensaje=$this->nombre." debe pagar impuestos";
        }
        return $mensaje;
    }
}
?>