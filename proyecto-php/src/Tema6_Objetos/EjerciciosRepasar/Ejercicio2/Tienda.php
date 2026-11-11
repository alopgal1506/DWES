<?php
class Tienda{
    private $productos;

    function __construct(){
        $this->productos=array();
    }

    function agregarProducto($producto){
        $this->productos[]=$producto;
    }

    function mostrarProducto(){
        foreach($this->productos as $p){
            echo "<tr>";
            echo $p->mostrarInformacion();
            echo "</tr>";
        }
    }

    function calcularValorTotal(){
        $resultado=0;
        foreach($this->productos as $p){
            $resultado+=$p->calcularValorStock();
        }
        return $resultado;
    }

    function obtenerProductoMasCaro(){
        $precioMasAlto=0;
        $productoMasAlto=null;
        foreach($this->productos as $p){
            if(($p->getPrecio())>$precioMasAlto){
                $precioMasAlto=$p->getPrecio();
                $productoMasAlto=$p;
            }
        }
        return $productoMasAlto;
    }


}
?>