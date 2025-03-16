<?php

require_once '../models/Centro.php';

class CentroController {
    public function index() {
        $centro = new Centro();
        $centros = $centro->getAll();
        require_once '../views/centro/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $regional_id = $_POST['regional_id'];
            $centro = new Centro();
            $centro->create($nombre, $regional_id);
            header('Location: index.php');
        } else {
            require_once '../views/centro/create.php';
        }
    }

    public function edit($id) {
        $centro = new Centro();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $regional_id = $_POST['regional_id'];
            $centro->update($id, $nombre, $regional_id);
            header('Location: ../index.php');
        } else {
            $centroData = $centro->getById($id);
            require_once '../views/centro/edit.php';
        }
    }

    public function delete($id) {
        $centro = new Centro();
        $centro->delete($id);
        header('Location: ../index.php');
    }
}