<?php

require_once __DIR__ . '/../config/Conexion.php';
require_once __DIR__ . '/Usuario.php';

class Instructor extends Usuario {
    public function __construct($id, $nombre, $email, $password, $regional, $centro_academico) {
        parent::__construct($id, $nombre, $email, $password, 'instructor', $regional, $centro_academico, null);
    }

    public static function crear($nombre, $email, $password, $regional, $centro_academico) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password, rol, regional, centro_academico, creado_por) VALUES (?, ?, ?, 'instructor', ?, ?, ?)");
        $stmt->bind_param("sssss", $nombre, $email, $password, $regional, $centro_academico);
        return $stmt->execute();
    }

    public static function listar() {
        $conexion = Conexion::obtenerInstancia();
        $result = $conexion->query("SELECT * FROM usuarios WHERE rol = 'instructor'");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}