<?php
require_once 'EscuelaDB.php';
class Alumno{
    private $matricula;
    private $nombre;
    private $apellidos;
    private $curso;

    public function __construct($matricula, $nombre, $apellidos, $curso){
        $this->matricula=$matricula;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->curso=$curso;
    }

    
    public function getMatricula()
    {
        return $this->matricula;
    }

    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

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


    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getCurso()
    {
        return $this->curso;
    }

    public function setCurso($curso)
    {
        $this->curso = $curso;

        return $this;
    }

    public function insert() {
        $conexion = EscuelaDB::connectDB();
        $insercion = "INSERT INTO alumno (matricula, nombre, apellidos, curso) VALUES ('$this->matricula','$this->nombre','$this->apellidos', '$this->curso')";
        $conexion->exec($insercion);
        $conexion = null;
    }
}

?>