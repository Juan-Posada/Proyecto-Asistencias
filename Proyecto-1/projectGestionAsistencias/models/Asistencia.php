<?php
require_once __DIR__ . '/../config/Conexion.php';

class Asistencia {
    public static function registrar($aprendiz_id, $fecha, $asistio) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("INSERT INTO asistencias (aprendiz_id, fecha, asistio) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $aprendiz_id, $fecha, $asistio);
        return $stmt->execute();
    }

    public static function listarPorAprendiz($aprendiz_id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("SELECT * FROM asistencias WHERE aprendiz_id = ?");
        $stmt->bind_param("i", $aprendiz_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>