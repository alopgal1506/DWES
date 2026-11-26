<?php
require_once 'EscuelaDB.php';
class Asignatura{
    private $codigo;
    private $nombre;

    public function __construct($codigo=0, $nombre){
        $this->codigo=$codigo;
        $this->nombre=$nombre;
    }

    
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

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

    public function insert() {
        $conexion = EscuelaDB::connectDB();
        $insercion = "INSERT INTO asignatura (codigo, nombre) VALUES ('$this->codigo','$this->nombre')";
        $conexion->exec($insercion);
        $conexion = null;
    }
     public function delete()
    {
        $conexion = EscuelaDB::connectDB();
        $borrado = "DELETE FROM asignatura WHERE codigo='$this->codigo'";
        $conexion->exec($borrado);
        $conexion = null;
    }

    public function update() {
        $conexion = EscuelaDB::connectDB();
        $actualiza = "UPDATE asignatura SET nombre='$this->nombre'
        WHERE codigo='$this->codigo'";
        $conexion->exec($actualiza);
        $conexion=null;
    }

    public static function getAsignatura() {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT codigo, nombre FROM asignatura";
        $consulta = $conexion->query($seleccion);
        $asignaturas = [];
        while ($registro = $consulta->fetchObject()) {
            $asignaturas[] = new Asignatura($registro->codigo, $registro->nombre);
        }
        $conexion = null;
        return $asignaturas;
    }

    public static function getAsignaturasById($codigo) {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT codigo, nombre FROM asignatura WHERE codigo='$codigo'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount()>0) {
            $registro = $consulta->fetchObject();
            $oferta = new Asignatura($registro->codigo, $registro->nombre);
            $conexion=null;
            return $oferta;
        }else{
            $conexion=null;
            return false;
        }
    }
}

?>