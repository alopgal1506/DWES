<?php 
class Menu{
   private $titulo;
   private $enlace;

    //Constructor
    public function __construct(){
        $this->titulo=array();
        $this->enlace=array();
    }

    public function anadir($titulo, $enlace){
        $this->titulo[] = $titulo;
        $this->enlace[] = $enlace;
    }

    public function mostrarHorizontal(){
        for ($i = 0; $i < count($this->titulo); $i++) {
            echo '<a href="' . $this->enlace[$i] . '">' . $this->titulo[$i] . '</a>';
            if ($i < count($this->titulo) - 1) {
                echo ' - ';
            }
        }
    }

    public function mostrarVertical()
    {
        for ($i = 0; $i < count($this->titulo); $i++) {
            echo '<a href="' . $this->enlace[$i] . '">' . $this->titulo[$i] . '</a><br>';
        }
    }
}
?>