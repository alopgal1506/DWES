<?php
require_once 'BlogDB.php';
class Articulo{
    private $identificador=null;
    private $titulo;
    private $fechaPublicacion;
    private $contenido;

   
    public function __construct($titulo, $contenido, $identificador = null, $fechaPublicacion = null){
        $this->identificador = $identificador;
        $this->titulo=$titulo;
        $this->contenido=$contenido;
        $this->fechaPublicacion = $fechaPublicacion ?? date('Y-m-d H:i:s');
    }


    public function getIdentificador()
    {
        return $this->identificador;
    }

    public function setIdentificador($identificador)
    {
        $this->identificador = $identificador;

        return $this;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getFechaPublicacion()
    {
        return $this->fechaPublicacion;
    }

    public function setFechaPublicacion($fechaPublicacion)
    {
        $this->fechaPublicacion = $fechaPublicacion;

        return $this;
    }

    public function getContenido()
    {
        return $this->contenido;
    }
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    public function insert() {
        $conexion = BlogDB::connectDB();
        $insercion = "INSERT INTO articulo (titulo, fecha_publicacion, contenido) VALUES ('$this->titulo','$this->fechaPublicacion','$this->contenido')";
        $conexion->exec($insercion);
        $this->identificador = (int) $conexion->lastInsertId();   // opcional: guarda el id autoincrementado
        $conexion = null;
    }

    public function delete(){
        $conexion = BlogDB::connectDB();
        $borrado = "DELETE FROM articulo WHERE id='$this->identificador'";
        $conexion->exec($borrado);
        $conexion = null;
    }

    public static function getArticulos() {
        $conexion = BlogDB::connectDB();
        // CAMBIO: fecha_publicacion y ORDER BY
        $seleccion = "SELECT id, titulo, fecha_publicacion, contenido FROM articulo ORDER BY fecha_publicacion DESC";
        $consulta = $conexion->query($seleccion);
        $articulos = [];
        while ($registro = $consulta->fetchObject()) {
            $articulos[] = new Articulo($registro->titulo, $registro->contenido, $registro->id, $registro->fecha_publicacion);
        }
        $conexion = null;
        return $articulos;
    }

    public static function getArticuloById($identificador) {
        $conexion = BlogDB::connectDB();
        $seleccion = "SELECT id, titulo, fecha_publicacion, contenido FROM articulo WHERE id='$identificador'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount()>0) {
            $registro = $consulta->fetchObject();
            $oferta = new Articulo($registro->titulo, $registro->contenido, $registro->id, $registro->fecha_publicacion);
            $conexion=null;
            return $oferta;
        }else{
            $conexion=null;
            return false;
        }
    }

    public static function contarArticulos() {
        $conexion = AlmacenDB::connectDB();
        $total = (int) $conexion->query("SELECT COUNT(*) FROM articulo")->fetchColumn();
        $conexion = null;
        return $total;
    }

        public static function getArticuloPaginados($inicio, $porPagina) {
        $conexion = AlmacenDB::connectDB();
        $seleccion = "SELECT id, titulo, precioCompra, fecha_publicacion, contenido FROM articulo ORDER BY id LIMIT :inicio, :porPagina";
        $consulta = $conexion->prepare($seleccion);
        $consulta->bindValue(':inicio', (int)$inicio, PDO::PARAM_INT);
        $consulta->bindValue(':porPagina', (int)$porPagina, PDO::PARAM_INT);
        $consulta->execute();
        $articulos = [];
        while ($registro = $consulta->fetchObject()) {
            $articulos[] = new Articulo($registro->titulo, $registro->contenido, $registro->id, $registro->fecha_publicacion);
        }
        $conexion = null;
        return $articulos;
    }

}
?>