<?php

namespace App\Controllers;

use App\Models\CentroModel;

require_once 'baseController.php';
require_once MAIN_APP_ROUTE . '../models/CentroModel.php';

class CentroController extends BaseController {
    public function __construct() {
        $this->layout = "admin_layout";
        parent::__construct();
    }

    public function view() {
        $centroObj = new CentroModel();
        $centros = $centroObj->getAll();
        $data = [
            "centros" => $centros,
            "title" => "Centros"
        ];
        $this->render('centro/viewCentro.php', $data);
    }

    public function new() {
        $data = [
            "title" => "Nuevo Centro"
        ];
        $this->render('centro/newCentro.php', $data);
    }

    public function create() {
        if (isset($_POST['txtNombre'])) {
            $nombre = $_POST['txtNombre'] ?? null;
            $centroObj = new CentroModel();
            $centroObj->saveCentro($nombre);
            $this->redirectTo("centro/view");
        }
    }

    public function edit($id) {
        $centroObj = new CentroModel();
        $centroInfo = $centroObj->getCentro($id);
        $data = [
            "centro" => $centroInfo,
            "title" => "Editar Centro"
        ];
        $this->render('centro/editCentro.php', $data);
    }

    public function update() {
        if (isset($_POST['txtId']) && isset($_POST['txtNombre'])) {
            $id = $_POST['txtId'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $centroObj = new CentroModel();
            $centroObj->editCentro($id, $nombre);
            $this->redirectTo("centro/view");
        }
    }

    public function delete($id) {
        $centroObj = new CentroModel();
        $centroInfo = $centroObj->getCentro($id);
        $data = [
            "centro" => $centroInfo,
            "title" => "Eliminar Centro"
        ];
        $this->render('centro/deleteCentro.php', $data);
    }

    public function remove() {
        if (isset($_POST['txtId'])) {
            $id = $_POST['txtId'] ?? null;
            $centroObj = new CentroModel();
            $centroObj->removeCentro($id);
            $this->redirectTo("centro/view");
        }
    }
}