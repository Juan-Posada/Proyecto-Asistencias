<?php

namespace App\Controllers;

use App\Models\AprendizModel;
use App\Models\FichaModel;

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

    public function viewOne($id) {
        $aprendizObj = new AprendizModel();
        $aprendizInfo = $aprendizObj->getAprendiz($id);
        
        // Obtener el nombre de la ficha
        $fichaObj = new FichaModel();
        $fichaInfo = $fichaObj->getFicha($aprendizInfo->id_ficha);
        
        $data = [
            "aprendiz" => $aprendizInfo,
            "ficha" => $fichaInfo->nombre, // Agregar el nombre de la ficha
            "title" => "Detalles del Aprendiz"
        ];
        $this->render('aprendiz/viewOneAprendiz.php', $data);
    }

    public function new() {
        $fichaObj = new FichaModel();
        $fichas = $fichaObj->getAll();
        $data = [
            "title" => "Nuevo Aprendiz",
            "fichas" => $fichas
        ];
        $this->render('aprendiz/newAprendiz.php', $data);
    }

    public function create() {
        if (isset($_POST['txtNombre'], $_POST['txtEmail'], $_POST['txtIdFicha'])) {
            $nombre = $_POST['txtNombre'] ?? null;
            $email = $_POST['txtEmail'] ?? null;
            $id_ficha = $_POST['txtIdFicha'] ?? null;
            $aprendizObj = new AprendizModel();
            $aprendizObj->saveAprendiz($nombre, $email, $id_ficha);
            $this->redirectTo("aprendiz/view");
        }
    }

    public function edit($id) {
        $aprendizObj = new AprendizModel();
        $aprendizInfo = $aprendizObj->getAprendiz($id);
        $fichaObj = new FichaModel();
        $fichas = $fichaObj->getAll();
        $data = [
            "aprendiz" => $aprendizInfo,
            "fichas" => $fichas,
            "title" => "Editar Aprendiz"
        ];
        $this->render('aprendiz/editAprendiz.php', $data);
    }

    public function update() {
        if (isset($_POST['txtId'], $_POST['txtNombre'], $_POST['txtEmail'], $_POST['txtIdFicha'])) {
            $id = $_POST['txtId'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $email = $_POST['txtEmail'] ?? null;
            $id_ficha = $_POST['txtIdFicha'] ?? null;
            $aprendizObj = new AprendizModel();
            $aprendizObj->editAprendiz($id, $nombre, $email, $id_ficha);
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