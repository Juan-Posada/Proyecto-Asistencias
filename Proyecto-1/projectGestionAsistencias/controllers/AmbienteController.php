<?php

require_once '../models/Ambiente.php';

class AmbienteController {
    public function index() {
        $ambiente = new Ambiente();
        $ambientes = $ambiente->getAll();
        require_once '../views/ambiente/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $centro_id = $_POST['centro_id'];
            $ambiente = new Ambiente();
            $ambiente->create($nombre, $centro_id);
            header('Location: index.php');
        } else {
            require_once '../views/ambiente/create.php';
        }
    }

    public function edit($id) {
        $ambiente = new Ambiente();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $centro_id = $_POST['centro_id'];
            $ambiente->update($id, $nombre, $centro_id);
            header('Location: ../index.php');
        } else {
            $ambienteData = $ambiente->getById($id);
            require_once '../views/ambiente/edit.php';
        }
    }

    public function delete($id) {
        $ambiente = new Ambiente();
        $ambiente->delete($id);
        header('Location: ../index.php');
    }
}