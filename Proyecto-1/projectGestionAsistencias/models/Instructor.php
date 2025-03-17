<?php

require_once __DIR__ . '/../config/Conexion.php';
require_once __DIR__ . '/Usuario.php';

class Instructor extends Usuario {
    public function __construct($id, $nombre, $email, $password, $regional, $centro_academico) {
        parent::__construct($id, $nombre, $email, $password, 'instructor', $regional, $centro_academico, null);
    }

    public static function crear($nombre, $email, $password, $regional, $centro_academico) {
        $conexion = Conexion::obtenerInstancia();
        
        // Hashear la contraseña antes de guardarla
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    
        // Preparar la consulta SQL
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password, rol, regional, centro_academico, creado_por) VALUES (?, ?, ?, 'instructor', ?, ?, ?)");
        
        // Verificar si la preparación de la consulta fue exitosa
        if (!$stmt) {
            throw new Exception("Error al preparar la consulta: " . $conexion->error);
        }
    
        // Vincular los parámetros
        $creado_por = $_SESSION['usuario']['id']; // Obtener el ID del usuario que crea el instructor
        $stmt->bind_param("sssssi", $nombre, $email, $passwordHash, $regional, $centro_academico, $creado_por);
    
        // Ejecutar la consulta
        return $stmt->execute();
    }

    public static function listar() {
        $conexion = Conexion::obtenerInstancia();
        $result = $conexion->query("SELECT * FROM usuarios WHERE rol = 'instructor'");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}