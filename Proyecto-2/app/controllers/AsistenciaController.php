<?php

namespace App\Controllers;

use App\Models\AprendizModel;
use App\Models\AsistenciaModel;

require_once 'baseController.php';
require_once MAIN_APP_ROUTE . '../models/AsistenciaModel.php';

class AsistenciaController extends BaseController {
    public function __construct() {
        $this->layout = "admin_layout";
        parent::__construct();
    }

    public function view() {
        $asistenciaObj = new AsistenciaModel();
        $asistencias = $asistenciaObj->getAll();
        $aprendizObj = new AprendizModel();
        $aprendices = $aprendizObj->getAll();
        
        $data = [
            "asistencias" => $asistencias,
            "aprendices" => $aprendices, // Pasar todos los aprendices
            "title" => "Asistencias"
        ];
        $this->render('asistencia/viewAsistencia.php', $data);
    }

    public function viewOne($id) {
        $asistenciaObj = new AsistenciaModel();
        $asistenciaInfo = $asistenciaObj->getAsistencia($id);
        
        // Obtener el nombre del aprendiz
        $aprendizObj = new AprendizModel();
        $aprendizInfo = $aprendizObj->getAprendiz($asistenciaInfo->id_aprendiz);
        
        $data = [
            "asistencia" => $asistenciaInfo,
            "aprendiz" => $aprendizInfo->nombre, // Agregar el nombre del aprendiz
            "title" => "Detalles de la Asistencia"
        ];
        $this->render('asistencia/viewOneAsistencia.php', $data);
    }

    public function new() {
        $aprendizObj = new AprendizModel();
        $aprendices = $aprendizObj->getAll();
        $data = [
            "title" => "Nueva Asistencia",
            "aprendices" => $aprendices
        ];
        $this->render('asistencia/newAsistencia.php', $data);
    }

    public function create() {
        if (isset($_POST['txtIdAprendiz'], $_POST['txtFecha'], $_POST['txtEstado'])) {
            $id_aprendiz = $_POST['txtIdAprendiz'] ?? null;
            $fecha = $_POST['txtFecha'] ?? null;
            $estado = $_POST['txtEstado'] ?? null;
            $asistenciaObj = new AsistenciaModel();
            $asistenciaObj->saveAsistencia($id_aprendiz, $fecha, $estado);
            $this->redirectTo("asistencia/view");
        }
    }

    public function edit($id) {
        $asistenciaObj = new AsistenciaModel();
        $asistenciaInfo = $asistenciaObj->getAsistencia($id);
        $aprendizObj = new AprendizModel();
        $aprendices = $aprendizObj->getAll();
        $data = [
            "asistencia" => $asistenciaInfo,
            "aprendices" => $aprendices,
            "title" => "Editar Asistencia"
        ];
        $this->render('asistencia/editAsistencia.php', $data);
    }

    public function update() {
        if (isset($_POST['txtId'], $_POST['txtIdAprendiz'], $_POST['txtFecha'], $_POST['txtEstado'])) {
            $id = $_POST['txtId'] ?? null;
            $id_aprendiz = $_POST['txtIdAprendiz'] ?? null;
            $fecha = $_POST['txtFecha'] ?? null;
            $estado = $_POST['txtEstado'] ?? null;
            $asistenciaObj = new AsistenciaModel();
            $asistenciaObj->editAsistencia($id, $id_aprendiz, $fecha, $estado);
            $this->redirectTo("asistencia/view");
        }
    }

    public function delete($id) {
        $asistenciaObj = new AsistenciaModel();
        $asistenciaInfo = $asistenciaObj->getAsistencia($id);
        $data = [
            "asistencia" => $asistenciaInfo,
            "title" => "Eliminar Asistencia"
        ];
        $this->render('asistencia/deleteAsistencia.php', $data);
    }

    public function remove() {
        if (isset($_POST['txtId'])) {
            $id = $_POST['txtId'] ?? null;
            $asistenciaObj = new AsistenciaModel();
            $asistenciaObj->removeAsistencia($id);
            $this->redirectTo("asistencia/view");
        }
    }
}