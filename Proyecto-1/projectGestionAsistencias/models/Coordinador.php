<?php

require_once __DIR__ . '/../config/Conexion.php';
require_once __DIR__ . '/Usuario.php';

class Coordinador extends Usuario {
    public function __construct($id, $nombre, $email, $password, $regional, $centro_academico) {
        parent::__construct($id, $nombre, $email, $password, 'coordinador', $regional, $centro_academico, null);
    }

    /**
     * Método para registrar un nuevo programa de formación.
     *
     * @param string $nombre Nombre del programa.
     * @return bool True si se registró correctamente, False en caso contrario.
     */
    public static function crearPrograma($nombre) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("INSERT INTO programas (nombre) VALUES (?)");
        $stmt->bind_param("s", $nombre);
        return $stmt->execute();
    }

    /**
     * Método para listar todos los programas de formación.
     *
     * @return array Lista de programas.
     */
    public static function listarProgramas() {
        $conexion = Conexion::obtenerInstancia();
        $result = $conexion->query("SELECT * FROM programas");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Método para registrar un nuevo ambiente (aula).
     *
     * @param string $nombre Nombre del ambiente.
     * @return bool True si se registró correctamente, False en caso contrario.
     */
    public static function crearAmbiente($nombre) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("INSERT INTO ambientes (nombre) VALUES (?)");
        $stmt->bind_param("s", $nombre);
        return $stmt->execute();
    }

    /**
     * Método para listar todos los ambientes.
     *
     * @return array Lista de ambientes.
     */
    public static function listarAmbientes() {
        $conexion = Conexion::obtenerInstancia();
        $result = $conexion->query("SELECT * FROM ambientes");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Método para registrar una nueva ficha (grupo de aprendices).
     *
     * @param string $codigo Código de la ficha.
     * @param int $programa_id ID del programa asociado.
     * @param int $ambiente_id ID del ambiente asociado.
     * @return bool True si se registró correctamente, False en caso contrario.
     */
    public static function crearFicha($codigo, $programa_id, $ambiente_id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("INSERT INTO fichas (codigo, programa_id, ambiente_id) VALUES (?, ?, ?)");
        $stmt->bind_param("sii", $codigo, $programa_id, $ambiente_id);
        return $stmt->execute();
    }

    /**
     * Método para listar todas las fichas.
     *
     * @return array Lista de fichas.
     */
    public static function listarFichas() {
        $conexion = Conexion::obtenerInstancia();
        $result = $conexion->query("SELECT * FROM fichas");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Método para registrar un nuevo aprendiz.
     *
     * @param string $nombre Nombre del aprendiz.
     * @param int $ficha_id ID de la ficha a la que pertenece.
     * @return bool True si se registró correctamente, False en caso contrario.
     */
    public static function crearAprendiz($nombre, $ficha_id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("INSERT INTO aprendices (nombre, ficha_id) VALUES (?, ?)");
        $stmt->bind_param("si", $nombre, $ficha_id);
        return $stmt->execute();
    }

    /**
     * Método para listar todos los aprendices de una ficha.
     *
     * @param int $ficha_id ID de la ficha.
     * @return array Lista de aprendices.
     */
    public static function listarAprendicesPorFicha($ficha_id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("SELECT * FROM aprendices WHERE ficha_id = ?");
        $stmt->bind_param("i", $ficha_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Método para registrar un nuevo instructor.
     *
     * @param string $nombre Nombre del instructor.
     * @param string $email Email del instructor.
     * @param string $password Contraseña del instructor.
     * @param string $regional Regional del instructor.
     * @param string $centro_academico Centro académico del instructor.
     * @return bool True si se registró correctamente, False en caso contrario.
     */
    public static function crearInstructor($nombre, $email, $password, $regional, $centro_academico) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password, rol, regional, centro_academico, creado_por) VALUES (?, ?, ?, 'instructor', ?, ?, ?)");
        $stmt->bind_param("sssssi", $nombre, $email, $password, $regional, $centro_academico, $_SESSION['usuario']['id']);
        return $stmt->execute();
    }

    /**
     * Método para listar todos los instructores.
     *
     * @return array Lista de instructores.
     */
    public static function listarInstructores() {
        $conexion = Conexion::obtenerInstancia();
        $result = $conexion->query("SELECT * FROM usuarios WHERE rol = 'instructor'");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}