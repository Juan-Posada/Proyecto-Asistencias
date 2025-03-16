<?php

// Usar __DIR__ para obtener la ruta absoluta del directorio actual
require_once __DIR__ . '/../config/Conexion.php';

class Usuario {
    protected $id;
    protected $nombre;
    protected $email;
    protected $password;
    protected $rol;
    protected $regional;
    protected $centro_academico;
    protected $creado_por;

    public function __construct($id, $nombre, $email, $password, $rol, $regional, $centro_academico, $creado_por) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
        $this->regional = $regional;
        $this->centro_academico = $centro_academico;
        $this->creado_por = $creado_por;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRol() {
        return $this->rol;
    }

    public function getRegional() {
        return $this->regional;
    }

    public function getCentroAcademico() {
        return $this->centro_academico;
    }

    public function getCreadoPor() {
        return $this->creado_por;
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function verificarPassword($password) {
        return password_verify($password, $this->password);
    }
}