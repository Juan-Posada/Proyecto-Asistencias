<?php

class Conexion {
    private static $instancia = null;
    private $conexion;

    // Constructor privado para evitar instanciación directa
    private function __construct() {
        $this->conexion = new mysqli('localhost', 'root', '', 'asistencias');
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    // Método estático para obtener la instancia única
    public static function obtenerInstancia() {
        if (self::$instancia === null) {
            self::$instancia = new Conexion();
        }
        return self::$instancia->conexion;
    }

    // Evitar la clonación del objeto
    private function __clone() {}

    // Método mágico __wakeup debe ser público
    public function __wakeup() {
        // Lanzar una excepción para evitar la deserialización
        throw new Exception("No se permite la deserialización de esta clase.");
    }
}