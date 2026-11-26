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
    public function delete()
    {
        $conexion = EscuelaDB::connectDB();
        $borrado = "DELETE FROM alumno WHERE matricula='$this->matricula'";
        $conexion->exec($borrado);
        $conexion = null;
    }

    public function update() {
        $conexion = EscuelaDB::connectDB();
        $actualiza = "UPDATE alumno SET nombre='$this->nombre', apellidos='$this->apellidos',curso='$this->curso',
        WHERE matricula='$this->matricula'";
        $conexion->exec($actualiza);
        $conexion=null;
    }

    public static function getAlumno() {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT matricula, nombre, apellidos, curso FROM alumno";
        $consulta = $conexion->query($seleccion);
        $alumnos = [];
        while ($registro = $consulta->fetchObject()) {
            $alumnos[] = new Alumno($registro->matricula, $registro->nombre, $registro->apellidos, $registro->curso);
        }
        $conexion = null;
        return $alumnos;
    }

    public static function getAlumnoById($matricula) {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT matricula, nombre, apellidos, curso FROM alumno WHERE matricula='$matricula'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount()>0) {
            $registro = $consulta->fetchObject();
            $oferta = new Alumno($registro->matricula, $registro->nombre, $registro->apellidos, $registro->curso);
            $conexion=null;
            return $oferta;
        }else{
            $conexion=null;
            return false;
        }
    }
}

?>