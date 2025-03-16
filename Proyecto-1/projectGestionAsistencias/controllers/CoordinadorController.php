<?php

require_once '../models/Coordinador.php';

class CoordinadorController {
    public function index() {
        $coordinador = new Coordinador();
        $coordinadores = $coordinador->getAll();
        require_once '../views/coordinador/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $centro_id = $_POST['centro_id'];
            $coordinador = new Coordinador();
            $coordinador->create($nombre, $centro_id);
            header('Location: index.php');
        } else {
            require_once '../views/coordinador/create.php';
        }
    }

    public function edit($id) {
        $coordinador = new Coordinador();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $centro_id = $_POST['centro_id'];
            $coordinador->update($id, $nombre, $centro_id);
            header('Location: ../index.php');
        } else {
            $coordinadorData = $coordinador->getById($id);
            require_once '../views/coordinador/edit.php';
        }
    }

    public function delete($id) {
        $coordinador = new Coordinador();
        $coordinador->delete($id);
        header('Location: ../index.php');
    }
}