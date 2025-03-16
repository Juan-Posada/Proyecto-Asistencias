<?php

namespace App\Controllers;

use App\Models\AprendizModel;

require_once 'baseController.php';
require_once MAIN_APP_ROUTE . '../models/AprendizModel.php';

class AprendizController extends BaseController {
    public function __construct() {
        $this->layout = "admin_layout";
        parent::__construct();
    }

    public function view() {
        $aprendizObj = new AprendizModel();
        $aprendices = $aprendizObj->getAll();
        $data = [
            "aprendices" => $aprendices,
            "title" => "Aprendices"
        ];
        $this->render('aprendiz/viewAprendiz.php', $data);
    }

    public function new() {
        $data = [
            "title" => "Nuevo Aprendiz"
        ];
        $this->render('aprendiz/newAprendiz.php', $data);
    }

    public function create() {
        if (isset($_POST['txtNombre'])) {
            $nombre = $_POST['txtNombre'] ?? null;
            $aprendizObj = new AprendizModel();
            $aprendizObj->saveAprendiz($nombre);
            $this->redirectTo("aprendiz/view");
        }
    }

    public function edit($id) {
        $aprendizObj = new AprendizModel();
        $aprendizInfo = $aprendizObj->getAprendiz($id);
        $data = [
            "aprendiz" => $aprendizInfo,
            "title" => "Editar Aprendiz"
        ];
        $this->render('aprendiz/editAprendiz.php', $data);
    }

    public function update() {
        if (isset($_POST['txtId']) && isset($_POST['txtNombre'])) {
            $id = $_POST['txtId'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $aprendizObj = new AprendizModel();
            $aprendizObj->editAprendiz($id, $nombre);
            $this->redirectTo("aprendiz/view");
        }
    }

    public function delete($id) {
        $aprendizObj = new AprendizModel();
        $aprendizInfo = $aprendizObj->getAprendiz($id);
        $data = [
            "aprendiz" => $aprendizInfo,
            "title" => "Eliminar Aprendiz"
        ];
        $this->render('aprendiz/deleteAprendiz.php', $data);
    }

    public function remove() {
        if (isset($_POST['txtId'])) {
            $id = $_POST['txtId'] ?? null;
            $aprendizObj = new AprendizModel();
            $aprendizObj->removeAprendiz($id);
            $this->redirectTo("aprendiz/view");
        }
    }
}
?>