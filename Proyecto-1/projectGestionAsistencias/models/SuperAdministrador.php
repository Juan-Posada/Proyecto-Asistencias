<?php

require_once __DIR__ . '/../config/Conexion.php';
require_once __DIR__ . '/Usuario.php';

class SuperAdministrador extends Usuario {
    public function __construct($id, $nombre, $email, $password, $regional, $centro_academico) {
        parent::__construct($id, $nombre, $email, $password, 'superadministrador', $regional, $centro_academico, null);
    }

    public function registrarCoordinador($nombre, $email, $password, $regional, $centro_academico) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password, rol, regional, centro_academico, creado_por) VALUES (?, ?, ?, 'coordinador', ?, ?, ?)");
        $stmt->bind_param("sssssi", $nombre, $email, $password, $regional, $centro_academico, $this->id);
        return $stmt->execute();
    }

    public function listarCoordinadores() {
        $conexion = Conexion::obtenerInstancia();
        $result = $conexion->query("SELECT * FROM usuarios WHERE rol = 'coordinador' AND creado_por = {$this->id}");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function editarCoordinador($id, $nombre, $email, $regional, $centro_academico) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("UPDATE usuarios SET nombre = ?, email = ?, regional = ?, centro_academico = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $nombre, $email, $regional, $centro_academico, $id);
        return $stmt->execute();
    }

    public function eliminarCoordinador($id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}