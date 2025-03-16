<?php
require_once __DIR__ . '/../config/Conexion.php';

class Aprendiz {
    private $id;
    private $nombre;
    private $ficha_id;

    public function __construct($id, $nombre, $ficha_id) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->ficha_id = $ficha_id;
    }

    public static function crear($nombre, $ficha_id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("INSERT INTO aprendices (nombre, ficha_id) VALUES (?, ?)");
        $stmt->bind_param("si", $nombre, $ficha_id);
        return $stmt->execute();
    }

    public static function listarPorFicha($ficha_id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("SELECT * FROM aprendices WHERE ficha_id = ?");
        $stmt->bind_param("i", $ficha_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>