<?php

namespace App\Controllers;

use App\Models\AmbienteModel;
use App\Models\ProgramaFormacionModel;

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

    public function viewOne($id) {
        $ambienteObj = new AmbienteModel();
        $ambienteInfo = $ambienteObj->getAmbiente($id);
        
        // Obtener el nombre del programa
        $programaObj = new ProgramaFormacionModel();
        $programaInfo = $programaObj->getProgramaFormacion($ambienteInfo->id_programa);
        
        $data = [
            "ambiente" => $ambienteInfo,
            "programa" => $programaInfo->nombre, // Agregar el nombre del programa
            "title" => "Detalles del Ambiente"
        ];
        $this->render('ambiente/viewOneAmbiente.php', $data);
    }

    public function new() {
        $programaObj = new ProgramaFormacionModel();
        $programas = $programaObj->getAll();
        $data = [
            "title" => "Nuevo Ambiente",
            "programas" => $programas
        ];
        $this->render('ambiente/newAmbiente.php', $data);
    }

    public function create() {
        if (isset($_POST['txtNombre'], $_POST['txtTipo'], $_POST['txtIdPrograma'])) {
            $nombre = $_POST['txtNombre'] ?? null;
            $tipo = $_POST['txtTipo'] ?? null;
            $id_programa = $_POST['txtIdPrograma'] ?? null;
            $ambienteObj = new AmbienteModel();
            $ambienteObj->saveAmbiente($nombre, $tipo, $id_programa);
            $this->redirectTo("ambiente/view");
        }
    }

    public function edit($id) {
        $ambienteObj = new AmbienteModel();
        $ambienteInfo = $ambienteObj->getAmbiente($id);
        $programaObj = new ProgramaFormacionModel();
        $programas = $programaObj->getAll();
        $data = [
            "ambiente" => $ambienteInfo,
            "programas" => $programas,
            "title" => "Editar Ambiente"
        ];
        $this->render('ambiente/editAmbiente.php', $data);
    }

    public function update() {
        if (isset($_POST['txtId'], $_POST['txtNombre'], $_POST['txtTipo'], $_POST['txtIdPrograma'])) {
            $id = $_POST['txtId'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $tipo = $_POST['txtTipo'] ?? null;
            $id_programa = $_POST['txtIdPrograma'] ?? null;
            $ambienteObj = new AmbienteModel();
            $ambienteObj->editAmbiente($id, $nombre, $tipo, $id_programa);
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