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
    
        // Iniciar una transacción para asegurar la integridad de los datos
        $conexion->begin_transaction();
    
        try {
            // Paso 1: Obtener las fichas asociadas al programa
            $stmt = $conexion->prepare("SELECT id FROM fichas WHERE programa_id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $fichas = $result->fetch_all(MYSQLI_ASSOC);
    
            // Paso 2: Eliminar los aprendices asociados a las fichas
            foreach ($fichas as $ficha) {
                $ficha_id = $ficha['id'];
                $stmt = $conexion->prepare("DELETE FROM aprendices WHERE ficha_id = ?");
                $stmt->bind_param("i", $ficha_id);
                $stmt->execute();
            }
    
            // Paso 3: Eliminar las fichas asociadas al programa
            $stmt = $conexion->prepare("DELETE FROM fichas WHERE programa_id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
    
            // Paso 4: Eliminar el programa
            $stmt = $conexion->prepare("DELETE FROM programas WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
    
            // Confirmar la transacción
            $conexion->commit();
            return true;
        } catch (mysqli_sql_exception $e) {
            // Revertir la transacción en caso de error
            $conexion->rollback();
            throw $e; // Lanzar la excepción para manejarla en el controlador
        }
    }

    public function obtenerProgramaPorId($id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("SELECT * FROM programas WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
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

    public function obtenerAmbientePorId($id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("SELECT * FROM ambientes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Métodos para Fichas
    public function crearFicha($codigo, $programa_id) {
        return Ficha::crear($codigo, $programa_id);
    }

    public function listarFichas() {
        return Ficha::listar();
    }

    public function editarFicha($id, $codigo, $programa_id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("UPDATE fichas SET codigo = ?, programa_id = ? WHERE id = ?");
        $stmt->bind_param("sii", $codigo, $programa_id, $id);
        return $stmt->execute();
    }
    
    public function eliminarFicha($id) {
        $conexion = Conexion::obtenerInstancia();
    
        // Iniciar una transacción para asegurar la integridad de los datos
        $conexion->begin_transaction();
    
        try {
            // Paso 1: Eliminar los aprendices asociados a la ficha
            $stmt = $conexion->prepare("DELETE FROM aprendices WHERE ficha_id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
    
            // Paso 2: Eliminar la ficha
            $stmt = $conexion->prepare("DELETE FROM fichas WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
    
            // Confirmar la transacción
            $conexion->commit();
            return true;
        } catch (mysqli_sql_exception $e) {
            // Revertir la transacción en caso de error
            $conexion->rollback();
            throw $e; // Lanzar la excepción para manejarla en el controlador
        }
    }
    
    public function obtenerFichaPorId($id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("SELECT * FROM fichas WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
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
    
    public function obtenerAprendizPorId($id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("SELECT * FROM aprendices WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
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

    public function obtenerInstructorPorId($id) {
        $conexion = Conexion::obtenerInstancia();
        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE id = ? AND rol = 'instructor'");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }


}