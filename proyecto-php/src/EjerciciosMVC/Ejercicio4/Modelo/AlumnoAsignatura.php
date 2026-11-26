<?php
require_once 'EscuelaDB.php';
class AlumnoAsignatura{

    public function matricular($matricula, $codigo){
        $conexion = EscuelaDB::connectDB();
        $insercion = "INSERT INTO matricula_asignatura (matricula, codigo) VALUES ($matricula,$codigo)";
        $conexion->exec($insercion);
        $conexion = null;
    }

    public function desmatricular($matricula, $codigo){
        $conexion = EscuelaDB::connectDB();
        $borrado = "DELETE FROM matricula_asignatura WHERE matricula=$matricula and codigo=$codigo";
        $conexion->exec($borrado);
        $conexion = null;
    }

    public function AsignaturasDisponibles(){
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT a.codigo, a.nombre FROM matricula_asignatura m LEFT JOIN asignatura a 
        ON m.codigo=a.codigo  
        WHERE m.codigo is null";
    }

}

?>