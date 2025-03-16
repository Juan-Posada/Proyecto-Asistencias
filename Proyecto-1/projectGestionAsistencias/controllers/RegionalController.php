<?php

require_once '../models/Regional.php';

class RegionalController {
    public function index() {
        $regional = new Regional();
        $regionales = $regional->getAll();
        require_once '../views/regional/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $regional = new Regional();
            $regional->create($nombre);
            header('Location: index.php');
        } else {
            require_once '../views/regional/create.php';
        }
    }

    public function edit($id) {
        $regional = new Regional();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $regional->update($id, $nombre);
            header('Location: ../index.php');
        } else {
            $regionalData = $regional->getById($id);
            require_once '../views/regional/edit.php';
        }
    }

    public function delete($id) {
        $regional = new Regional();
        $regional->delete($id);
        header('Location: ../index.php');
    }
}