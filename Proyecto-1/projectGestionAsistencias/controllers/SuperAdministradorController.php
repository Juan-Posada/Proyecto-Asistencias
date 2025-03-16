<?php

require_once 'models/SuperAdministrador.php';

class SuperAdministradorController {
    private $superAdministrador;

    public function __construct($superAdministrador) {
        $this->superAdministrador = $superAdministrador;
    }

    public function registrarCoordinador($nombre, $email, $password, $regional, $centro_academico) {
        return $this->superAdministrador->registrarCoordinador($nombre, $email, $password, $regional, $centro_academico);
    }

    public function listarCoordinadores() {
        return $this->superAdministrador->listarCoordinadores();
    }

    public function editarCoordinador($id, $nombre, $email, $regional, $centro_academico) {
        return $this->superAdministrador->editarCoordinador($id, $nombre, $email, $regional, $centro_academico);
    }

    public function eliminarCoordinador($id) {
        return $this->superAdministrador->eliminarCoordinador($id);
    }
}