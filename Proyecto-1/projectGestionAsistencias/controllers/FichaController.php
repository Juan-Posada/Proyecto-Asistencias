<?php

require_once '../models/Ficha.php';

class FichaController {
    public function index() {
        $ficha = new Ficha();
        $fichas = $ficha->getAll();
        require_once '../views/ficha/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $codigo = $_POST['codigo'];
            $programa_id = $_POST['programa_id'];
            $ambiente_id = $_POST['ambiente_id'];
            $ficha = new Ficha();
            $ficha->create($codigo, $programa_id, $ambiente_id);
            header('Location: index.php');
        } else {
            require_once '../views/ficha/create.php';
        }
    }

    public function edit($id) {
        $ficha = new Ficha();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $codigo = $_POST['codigo'];
            $programa_id = $_POST['programa_id'];
            $ambiente_id = $_POST['ambiente_id'];
            $ficha->update($id, $codigo, $programa_id, $ambiente_id);
            header('Location: ../index.php');
        } else {
            $fichaData = $ficha->getById($id);
            require_once '../views/ficha/edit.php';
        }
    }

    public function delete($id) {
        $ficha = new Ficha();
        $ficha->delete($id);
        header('Location: ../index.php');
    }
}