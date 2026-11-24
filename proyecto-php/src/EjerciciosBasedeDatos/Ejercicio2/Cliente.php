<?php
require_once 'ClienteDB.php';
class Cliente
{
    private $dni;
    private $nombre;
    private $direccion;
    private $telefono;

    public function __construct($dni, $nombre, $direccion, $telefono)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;

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

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function __toString()
    {
        return "DNI: " . $this->dni . ", Nombre: " . $this->nombre . ", Direccion: " . $this->direccion . ", Teléfono: " .  $this->telefono;
    }

    public function insert()
    {
        $conexion = ClienteDB::connectDB();
        $insercion = "INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES ('$this->dni','$this->nombre','$this->direccion','$this->telefono')";
        $conexion->exec($insercion);
        $conexion = null;
    }

    public function delete()
    {
        $conexion = ClienteDB::connectDB();
        $borrado = "DELETE FROM cliente WHERE dni='$this->dni'";
        $conexion->exec($borrado);
        $conexion = null;
    }

    public function update() {
        $conexion = ClienteDB::connectDB();
        $actualiza = "UPDATE cliente SET nombre='$this->nombre', direccion='$this->direccion', telefono='$this->telefono'
        WHERE dni='$this->dni'";
        $conexion->exec($actualiza);
        $conexion=null;
    }

    public static function getClientes() {
        $conexion = ClienteDB::connectDB();
        $seleccion = "SELECT dni, nombre, direccion, telefono FROM cliente";
        $consulta = $conexion->query($seleccion);
        $clientes = [];
        while ($registro = $consulta->fetchObject()) {
            $clientes[] = new Cliente($registro->dni, $registro->nombre, $registro->direccion, $registro->telefono);
        }
        $conexion = null;
        return $clientes;
    }

    public static function getClienteById($dni) {
        $conexion = ClienteDB::connectDB();
        $seleccion = "SELECT dni, nombre, direccion, telefono FROM cliente WHERE dni='$dni'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount()>0) {
            $registro = $consulta->fetchObject();
            $oferta = new Cliente($registro->dni, $registro->nombre, $registro->direccion, $registro->telefono);
            $conexion=null;
            return $oferta;
        }else{
            $conexion=null;
            return false;
        }
    }

    public static function contarClientes() {
        $conexion = ClienteDB::connectDB();
        $total = (int) $conexion->query("SELECT COUNT(*) FROM cliente")->fetchColumn();
        $conexion = null;
        return $total;
    }

    public static function getClientesPaginados($inicio, $porPagina) {
        $conexion = ClienteDB::connectDB();
        $seleccion = "SELECT dni, nombre, direccion, telefono FROM cliente LIMIT :inicio, :porPagina";
        $consulta = $conexion->prepare($seleccion);
        // En LIMIT los valores deben enlazarse como enteros
        $consulta->bindValue(':inicio', (int)$inicio, PDO::PARAM_INT);
        $consulta->bindValue(':porPagina', (int)$porPagina, PDO::PARAM_INT);
        $consulta->execute();
        $clientes = [];
        while ($registro = $consulta->fetchObject()) {
            $clientes[] = new Cliente($registro->dni, $registro->nombre, $registro->direccion, $registro->telefono);
        }
        $conexion = null;
        return $clientes;
    }
}
