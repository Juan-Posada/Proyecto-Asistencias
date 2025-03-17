<?php

namespace App\Controllers;

use App\Models\ProgramaFormacionModel;
use App\Models\UsuarioModel;

require_once 'baseController.php';
require_once MAIN_APP_ROUTE . '../models/ProgramaFormacionModel.php';

class ProgramaFormacionController extends BaseController {
    public function __construct() {
        $this->layout = "admin_layout";
        parent::__construct();
    }

    public function view() {
        $programaObj = new ProgramaFormacionModel();
        $programas = $programaObj->getAll();
        $data = [
            "programas" => $programas,
            "title" => "Programas de Formación" // Corregido aquí
        ];
        $this->render('programaFormacion/viewProgramaFormacion.php', $data);
    }
    public function viewOne($id) {
        $programaObj = new ProgramaFormacionModel();
        $programaInfo = $programaObj->getProgramaFormacion($id);
        $data = [
            "programa" => $programaInfo,
            "title" => "Detalles del Programa de Formación"
        ];
        $this->render('programaFormacion/viewOneProgramaFormacion.php', $data);
    }

    public function new() {
        $coordinadorObj = new UsuarioModel();
        $coordinadores = $coordinadorObj->getAll();
        $data = [
            "title" => "Nuevo Programa de Formación",
            "coordinadores" => $coordinadores
        ];
        $this->render('programaFormacion/newProgramaFormacion.php', $data);
    }

    public function create() {
        if (isset($_POST['txtNombre'], $_POST['txtIdCoordinador'])) {
            $nombre = $_POST['txtNombre'] ?? null;
            $id_coordinador = $_POST['txtIdCoordinador'] ?? null;
            $programaObj = new ProgramaFormacionModel();
            $programaObj->saveProgramaFormacion($nombre, $id_coordinador);
            $this->redirectTo("programaFormacion/view");
        }
    }

    public function edit($id) {
        $programaObj = new ProgramaFormacionModel();
        $programaInfo = $programaObj->getProgramaFormacion($id);
        $coordinadorObj = new UsuarioModel();
        $coordinadores = $coordinadorObj->getAll();
        $data = [
            "programa" => $programaInfo,
            "coordinadores" => $coordinadores,
            "title" => "Editar Programa de Formación"
        ];
        $this->render('programaFormacion/editProgramaFormacion.php', $data);
    }

    public function update() {
        if (isset($_POST['txtId'], $_POST['txtNombre'], $_POST['txtIdCoordinador'])) {
            $id = $_POST['txtId'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $id_coordinador = $_POST['txtIdCoordinador'] ?? null;
            $programaObj = new ProgramaFormacionModel();
            $programaObj->editProgramaFormacion($id, $nombre, $id_coordinador);
            $this->redirectTo("programaFormacion/view");
        }
    }

    public function delete($id) {
        $programaObj = new ProgramaFormacionModel();
        $programaInfo = $programaObj->getProgramaFormacion($id);
        $data = [
            "programa" => $programaInfo,
            "title" => "Eliminar Programa de Formación"
        ];
        $this->render('programaFormacion/deleteProgramaFormacion.php', $data);
    }

    public function remove() {
        if (isset($_POST['txtId'])) {
            $id = $_POST['txtId'] ?? null;
            $programaObj = new ProgramaFormacionModel();
            $programaObj->removeProgramaFormacion($id);
            $this->redirectTo("programaFormacion/view");
        }
    }
}