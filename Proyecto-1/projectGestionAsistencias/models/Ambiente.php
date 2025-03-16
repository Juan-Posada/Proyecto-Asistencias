<?php
require_once __DIR__ . '/../config/Conexion.php';

class Ambiente {
    private $id;
    private $nombre;

    public function __construct($id, $nombre) {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public static function crear($nombre) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("INSERT INTO ambientes (nombre) VALUES (?)");
        $stmt->bind_param("s", $nombre);
        return $stmt->execute();
    }

    public static function listar() {
        $conexion = Conexion::obtenerInstancia();
        $result = $conexion->query("SELECT * FROM ambientes");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>