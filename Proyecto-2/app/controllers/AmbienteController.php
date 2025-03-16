<?php

namespace App\Controllers;

use App\Models\AmbienteModel;

require_once 'baseController.php';
require_once MAIN_APP_ROUTE . '../models/AmbienteModel.php';

class AmbienteController extends BaseController {
    public function __construct() {
        $this->layout = "admin_layout";
        parent::__construct();
    }

    public function view() {
        $ambienteObj = new AmbienteModel();
        $ambientes = $ambienteObj->getAll();
        $data = [
            "ambientes" => $ambientes,
            "title" => "Ambientes"
        ];
        $this->render('ambiente/viewAmbiente.php', $data);
    }

    public function new() {
        $data = [
            "title" => "Nuevo Ambiente"
        ];
        $this->render('ambiente/newAmbiente.php', $data);
    }

    public function create() {
        if (isset($_POST['txtNombre'])) {
            $nombre = $_POST['txtNombre'] ?? null;
            $ambienteObj = new AmbienteModel();
            $ambienteObj->saveAmbiente($nombre);
            $this->redirectTo("ambiente/view");
        }
    }

    public function edit($id) {
        $ambienteObj = new AmbienteModel();
        $ambienteInfo = $ambienteObj->getAmbiente($id);
        $data = [
            "ambiente" => $ambienteInfo,
            "title" => "Editar Ambiente"
        ];
        $this->render('ambiente/editAmbiente.php', $data);
    }

    public function update() {
        if (isset($_POST['txtId']) && isset($_POST['txtNombre'])) {
            $id = $_POST['txtId'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $ambienteObj = new AmbienteModel();
            $ambienteObj->editAmbiente($id, $nombre);
            $this->redirectTo("ambiente/view");
        }
    }

    public function delete($id) {
        $ambienteObj = new AmbienteModel();
        $ambienteInfo = $ambienteObj->getAmbiente($id);
        $data = [
            "ambiente" => $ambienteInfo,
            "title" => "Eliminar Ambiente"
        ];
        $this->render('ambiente/deleteAmbiente.php', $data);
    }

    public function remove() {
        if (isset($_POST['txtId'])) {
            $id = $_POST['txtId'] ?? null;
            $ambienteObj = new AmbienteModel();
            $ambienteObj->removeAmbiente($id);
            $this->redirectTo("ambiente/view");
        }
    }
}