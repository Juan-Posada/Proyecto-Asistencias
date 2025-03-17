<?php

namespace App\Controllers;

use App\Models\CentroModel;
use App\Models\RegionalModel;

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

    public function viewOne($id) {
        $centroObj = new CentroModel();
        $centroInfo = $centroObj->getCentro($id);
        
        // Obtener el nombre de la regional
        $regionalObj = new RegionalModel();
        $regionalInfo = $regionalObj->getRegional($centroInfo->id_regional);
        
        $data = [
            "centro" => $centroInfo,
            "regional" => $regionalInfo->nombre, // Agregar el nombre de la regional
            "title" => "Detalles del Centro"
        ];
        $this->render('centro/viewOneCentro.php', $data);
    }

    public function new() {
        $regionalObj = new RegionalModel();
        $regionales = $regionalObj->getAll();
        $data = [
            "title" => "Nuevo Centro",
            "regionales" => $regionales
        ];
        $this->render('centro/newCentro.php', $data);
    }

    public function create() {
        if (isset($_POST['txtNombre'], $_POST['txtIdRegional'])) {
            $nombre = $_POST['txtNombre'] ?? null;
            $id_regional = $_POST['txtIdRegional'] ?? null;
            $centroObj = new CentroModel();
            $centroObj->saveCentro($nombre, $id_regional);
            $this->redirectTo("centro/view");
        }
    }

    public function edit($id) {
        $centroObj = new CentroModel();
        $centroInfo = $centroObj->getCentro($id);
        $regionalObj = new RegionalModel();
        $regionales = $regionalObj->getAll();
        $data = [
            "centro" => $centroInfo,
            "regionales" => $regionales,
            "title" => "Editar Centro"
        ];
        $this->render('centro/editCentro.php', $data);
    }

    public function update() {
        if (isset($_POST['txtId'], $_POST['txtNombre'], $_POST['txtIdRegional'])) {
            $id = $_POST['txtId'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $id_regional = $_POST['txtIdRegional'] ?? null;
            $centroObj = new CentroModel();
            $centroObj->editCentro($id, $nombre, $id_regional);
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