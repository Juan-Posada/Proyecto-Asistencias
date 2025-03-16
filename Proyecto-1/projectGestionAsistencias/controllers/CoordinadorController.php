<?php

require_once __DIR__ . '/../models/Programa.php';
require_once __DIR__ . '/../models/Ambiente.php';
require_once __DIR__ . '/../models/Ficha.php';
require_once __DIR__ . '/../models/Aprendiz.php';
require_once __DIR__ . '/../models/Instructor.php';
require_once __DIR__ . '/../models/Coordinador.php';

class CoordinadorController {
    private $coordinador;

    public function __construct($coordinador) {
        $this->coordinador = $coordinador;
    }

    // Métodos para Programas
    public function crearPrograma($nombre) {
        return Programa::crear($nombre);
    }

    public function listarProgramas() {
        return Programa::listar();
    }

    public function editarPrograma($id, $nombre) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("UPDATE programas SET nombre = ? WHERE id = ?");
        $stmt->bind_param("si", $nombre, $id);
        return $stmt->execute();
    }

    public function eliminarPrograma($id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("DELETE FROM programas WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Métodos para Ambientes
    public function crearAmbiente($nombre) {
        return Ambiente::crear($nombre);
    }

    public function listarAmbientes() {
        return Ambiente::listar();
    }

    public function editarAmbiente($id, $nombre) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("UPDATE ambientes SET nombre = ? WHERE id = ?");
        $stmt->bind_param("si", $nombre, $id);
        return $stmt->execute();
    }

    public function eliminarAmbiente($id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("DELETE FROM ambientes WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Métodos para Fichas
    public function crearFicha($codigo, $programa_id) {
        return Ficha::crear($codigo, $programa_id);
    }

    public function listarFichas() {
        return Ficha::listar();
    }

    public function editarFicha($id, $codigo, $programa_id, $ambiente_id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("UPDATE fichas SET codigo = ?, programa_id = ?, ambiente_id = ? WHERE id = ?");
        $stmt->bind_param("siii", $codigo, $programa_id, $ambiente_id, $id);
        return $stmt->execute();
    }

    public function eliminarFicha($id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("DELETE FROM fichas WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Métodos para Aprendices
    public function crearAprendiz($nombre, $ficha_id) {
        return Aprendiz::crear($nombre, $ficha_id);
    }

    public function listarAprendicesPorFicha($ficha_id) {
        return Aprendiz::listarPorFicha($ficha_id);
    }

    public function editarAprendiz($id, $nombre, $ficha_id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("UPDATE aprendices SET nombre = ?, ficha_id = ? WHERE id = ?");
        $stmt->bind_param("sii", $nombre, $ficha_id, $id);
        return $stmt->execute();
    }

    public function eliminarAprendiz($id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("DELETE FROM aprendices WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Métodos para Instructores
    public function crearInstructor($nombre, $email, $password, $regional, $centro_academico) {
        return Instructor::crear($nombre, $email, $password, $regional, $centro_academico);
    }

    public function listarInstructores() {
        return Instructor::listar();
    }

    public function editarInstructor($id, $nombre, $email, $regional, $centro_academico) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("UPDATE usuarios SET nombre = ?, email = ?, regional = ?, centro_academico = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $nombre, $email, $regional, $centro_academico, $id);
        return $stmt->execute();
    }

    public function eliminarInstructor($id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}