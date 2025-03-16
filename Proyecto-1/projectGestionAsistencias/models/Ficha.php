<?php
require_once __DIR__ . '/../config/Conexion.php';

class Ficha {
    private $id;
    private $codigo;
    private $programa_id;

    public function __construct($id, $codigo, $programa_id) {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->programa_id = $programa_id;
    }

    public static function crear($codigo, $programa_id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("INSERT INTO fichas (codigo, programa_id) VALUES (?, ?)");
        $stmt->bind_param("si", $codigo, $programa_id);
        return $stmt->execute();
    }

    public static function listar() {
        $conexion = Conexion::obtenerInstancia();
        $result = $conexion->query("SELECT * FROM fichas");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function editar($id, $codigo, $programa_id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("UPDATE fichas SET codigo = ?, programa_id = ? WHERE id = ?");
        $stmt->bind_param("sii", $codigo, $programa_id, $id);
        return $stmt->execute();
    }

    public static function eliminar($id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("DELETE FROM fichas WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}