<?php

namespace App\Controllers;

use App\Models\FichaModel;
use App\Models\ProgramaFormacionModel;

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

    public function viewOne($id) {
        $fichaObj = new FichaModel();
        $fichaInfo = $fichaObj->getFicha($id);
        
        // Obtener el nombre del programa
        $programaObj = new ProgramaFormacionModel();
        $programaInfo = $programaObj->getProgramaFormacion($fichaInfo->id_programa);
        
        $data = [
            "ficha" => $fichaInfo,
            "programa" => $programaInfo->nombre, // Agregar el nombre del programa
            "title" => "Detalles de la Ficha"
        ];
        $this->render('ficha/viewOneFicha.php', $data);
    }

    public function new() {
        $programaObj = new ProgramaFormacionModel();
        $programas = $programaObj->getAll();
        $data = [
            "title" => "Nueva Ficha",
            "programas" => $programas
        ];
        $this->render('ficha/newFicha.php', $data);
    }

    public function create() {
        if (isset($_POST['txtNombre'], $_POST['txtIdPrograma'])) {
            $nombre = $_POST['txtNombre'] ?? null;
            $id_programa = $_POST['txtIdPrograma'] ?? null;
            $fichaObj = new FichaModel();
            $fichaObj->saveFicha($nombre, $id_programa);
            $this->redirectTo("ficha/view");
        }
    }

    public function edit($id) {
        $fichaObj = new FichaModel();
        $fichaInfo = $fichaObj->getFicha($id);
        $programaObj = new ProgramaFormacionModel();
        $programas = $programaObj->getAll();
        $data = [
            "ficha" => $fichaInfo,
            "programas" => $programas,
            "title" => "Editar Ficha"
        ];
        $this->render('ficha/editFicha.php', $data);
    }

    public function update() {
        if (isset($_POST['txtId'], $_POST['txtNombre'], $_POST['txtIdPrograma'])) {
            $id = $_POST['txtId'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $id_programa = $_POST['txtIdPrograma'] ?? null;
            $fichaObj = new FichaModel();
            $fichaObj->editFicha($id, $nombre, $id_programa);
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