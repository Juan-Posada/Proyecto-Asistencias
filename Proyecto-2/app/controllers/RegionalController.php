<?php

namespace App\Controllers;

use App\Models\RegionalModel;

require_once 'baseController.php';
require_once MAIN_APP_ROUTE . '../models/RegionalModel.php';

class RegionalController extends BaseController {
    public function __construct() {
        $this->layout = "admin_layout";
        parent::__construct();
    }

    public function view() {
        $regionalObj = new RegionalModel();
        $regionales = $regionalObj->getAll();
        $data = [
            "regionales" => $regionales,
            "title" => "Regionales"
        ];
        $this->render('regional/viewRegional.php', $data);
    }

    public function new() {
        $data = [
            "title" => "Nueva Regional"
        ];
        $this->render('regional/newRegional.php', $data);
    }

    public function create() {
        if (isset($_POST['txtNombre'])) {
            $nombre = $_POST['txtNombre'] ?? null;
            $regionalObj = new RegionalModel();
            $regionalObj->saveRegional($nombre);
            $this->redirectTo("regional/view");
        }
    }

    public function edit($id) {
        $regionalObj = new RegionalModel();
        $regionalInfo = $regionalObj->getRegional($id);
        $data = [
            "regional" => $regionalInfo,
            "title" => "Editar Regional"
        ];
        $this->render('regional/editRegional.php', $data);
    }

    public function update() {
        if (isset($_POST['txtId']) && isset($_POST['txtNombre'])) {
            $id = $_POST['txtId'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $regionalObj = new RegionalModel();
            $regionalObj->editRegional($id, $nombre);
            $this->redirectTo("regional/view");
        }
    }

    public function delete($id) {
        $regionalObj = new RegionalModel();
        $regionalInfo = $regionalObj->getRegional($id);
        $data = [
            "regional" => $regionalInfo,
            "title" => "Eliminar Regional"
        ];
        $this->render('regional/deleteRegional.php', $data);
    }

    public function remove() {
        if (isset($_POST['txtId'])) {
            $id = $_POST['txtId'] ?? null;
            $regionalObj = new RegionalModel();
            $regionalObj->removeRegional($id);
            $this->redirectTo("regional/view");
        }
    }
}