<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

require_once 'baseController.php';
require_once MAIN_APP_ROUTE . '../models/UsuarioModel.php';

class UsuarioController extends BaseController {
    public function __construct() {
        $this->layout = "admin_layout";
        parent::__construct();
    }

    public function view() {
        $usuarioObj = new UsuarioModel();
        $usuarios = $usuarioObj->getAll();
        $data = [
            "usuarios" => $usuarios,
            "title" => "Usuarios"
        ];
        $this->render('usuario/viewUsuario.php', $data);
    }

    public function new() {
        $data = [
            "title" => "Nuevo Usuario"
        ];
        $this->render('usuario/newUsuario.php', $data);
    }

    public function create() {
        if (isset($_POST['txtNombre'])) {
            $nombre = $_POST['txtNombre'] ?? null;
            $usuarioObj = new UsuarioModel();
            $usuarioObj->saveUsuario($nombre);
            $this->redirectTo("usuario/view");
        }
    }

    public function edit($id) {
        $usuarioObj = new UsuarioModel();
        $usuarioInfo = $usuarioObj->getUsuario($id);
        $data = [
            "usuario" => $usuarioInfo,
            "title" => "Editar Usuario"
        ];
        $this->render('usuario/editUsuario.php', $data);
    }

    public function update() {
        if (isset($_POST['txtId']) && isset($_POST['txtNombre'])) {
            $id = $_POST['txtId'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $usuarioObj = new UsuarioModel();
            $usuarioObj->editUsuario($id, $nombre);
            $this->redirectTo("usuario/view");
        }
    }

    public function delete($id) {
        $usuarioObj = new UsuarioModel();
        $usuarioInfo = $usuarioObj->getUsuario($id);
        $data = [
            "usuario" => $usuarioInfo,
            "title" => "Eliminar Usuario"
        ];
        $this->render('usuario/deleteUsuario.php', $data);
    }

    public function remove() {
        if (isset($_POST['txtId'])) {
            $id = $_POST['txtId'] ?? null;
            $usuarioObj = new UsuarioModel();
            $usuarioObj->removeUsuario($id);
            $this->redirectTo("usuario/view");
        }
    }
    
}
?>