<?php

require_once '../models/Programa.php';

class ProgramaController {
    public function index() {
        $programa = new Programa();
        $programas = $programa->getAll();
        require_once '../views/programa/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $coordinador_id = $_POST['coordinador_id'];
            $programa = new Programa();
            $programa->create($nombre, $coordinador_id);
            header('Location: index.php');
        } else {
            require_once '../views/programa/create.php';
        }
    }

    public function edit($id) {
        $programa = new Programa();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $coordinador_id = $_POST['coordinador_id'];
            $programa->update($id, $nombre, $coordinador_id);
            header('Location: ../index.php');
        } else {
            $programaData = $programa->getById($id);
            require_once '../views/programa/edit.php';
        }
    }

    public function delete($id) {
        $programa = new Programa();
        $programa->delete($id);
        header('Location: ../index.php');
    }
}