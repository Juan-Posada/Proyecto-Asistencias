<?php

namespace App\Controllers;

use App\Models\FichaModel;

require_once 'baseController.php';
require_once MAIN_APP_ROUTE . '../models/FichaModel.php';

class FichaController extends BaseController {
    public function __construct() {
        $this->layout = "admin_layout";
        parent::__construct();
    }

    public function view() {
        $fichaObj = new FichaModel();
        $fichas = $fichaObj->getAll();
        $data = [
            "fichas" => $fichas,
            "title" => "Fichas"
        ];
        $this->render('ficha/viewFicha.php', $data);
    }

    public function new() {
        $data = [
            "title" => "Nueva Ficha"
        ];
        $this->render('ficha/newFicha.php', $data);
    }

    public function create() {
        if (isset($_POST['txtNombre'])) {
            $nombre = $_POST['txtNombre'] ?? null;
            $fichaObj = new FichaModel();
            $fichaObj->saveFicha($nombre);
            $this->redirectTo("ficha/view");
        }
    }

    public function edit($id) {
        $fichaObj = new FichaModel();
        $fichaInfo = $fichaObj->getFicha($id);
        $data = [
            "ficha" => $fichaInfo,
            "title" => "Editar Ficha"
        ];
        $this->render('ficha/editFicha.php', $data);
    }

    public function update() {
        if (isset($_POST['txtId']) && isset($_POST['txtNombre'])) {
            $id = $_POST['txtId'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $fichaObj = new FichaModel();
            $fichaObj->editFicha($id, $nombre);
            $this->redirectTo("ficha/view");
        }
    }

    public function delete($id) {
        $fichaObj = new FichaModel();
        $fichaInfo = $fichaObj->getFicha($id);
        $data = [
            "ficha" => $fichaInfo,
            "title" => "Eliminar Ficha"
        ];
        $this->render('ficha/deleteFicha.php', $data);
    }

    public function remove() {
        if (isset($_POST['txtId'])) {
            $id = $_POST['txtId'] ?? null;
            $fichaObj = new FichaModel();
            $fichaObj->removeFicha($id);
            $this->redirectTo("ficha/view");
        }
    }
}