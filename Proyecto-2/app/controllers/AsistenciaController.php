<?php

namespace App\Controllers;

use App\Models\AsistenciaModel;

require_once 'baseController.php';
require_once MAIN_APP_ROUTE . '../models/AsistenciaModel.php';

class AsistenciaController extends BaseController
{
    public function __construct()
    {
        $this->layout = "admin_layout";
        parent::__construct();
    }

    public function view()
    {
        $asistenciaObj = new AsistenciaModel();
        $asistencias = $asistenciaObj->getAll();
        $data = [
            "asistencias" => $asistencias,
            "title" => "Asistencias"
        ];
        $this->render('asistencia/viewAsistencia.php', $data);
    }

    public function new()
    {
        $data = [
            "title" => "Nueva Asistencia"
        ];
        $this->render('asistencia/newAsistencia.php', $data);
    }

    public function create()
    {
        if (isset($_POST['txtFecha']) && isset($_POST['txtAprendizId'])) {
            $fecha = $_POST['txtFecha'] ?? null;
            $aprendizId = $_POST['txtAprendizId'] ?? null;
            $asistenciaObj = new AsistenciaModel();
            $asistenciaObj->saveAsistencia($fecha, $aprendizId);
            $this->redirectTo("asistencia/view");
        }
    }

    public function edit($id)
    {
        $asistenciaObj = new AsistenciaModel();
        $asistenciaInfo = $asistenciaObj->getAsistencia($id);
        $data = [
            "asistencia" => $asistenciaInfo,
            "title" => "Editar Asistencia"
        ];
        $this->render('asistencia/editAsistencia.php', $data);
    }

    public function update()
    {
        if (isset($_POST['txtId']) && isset($_POST['txtFecha']) && isset($_POST['txtAprendizId'])) {
            $id = $_POST['txtId'] ?? null;
            $fecha = $_POST['txtFecha'] ?? null;
            $aprendizId = $_POST['txtAprendizId'] ?? null;
            $asistenciaObj = new AsistenciaModel();
            $asistenciaObj->editAsistencia($id, $fecha, $aprendizId);
            $this->redirectTo("asistencia/view");
        }
    }

    public function delete($id)
    {
        $asistenciaObj = new AsistenciaModel();
        $asistenciaInfo = $asistenciaObj->getAsistencia($id);
        $data = [
            "asistencia" => $asistenciaInfo,
            "title" => "Eliminar Asistencia"
        ];
        $this->render('asistencia/deleteAsistencia.php', $data);
    }

    public function remove()
    {
        if (isset($_POST['txtId'])) {
            $id = $_POST['txtId'] ?? null;
            $asistenciaObj = new AsistenciaModel();
            $asistenciaObj->removeAsistencia($id);
            $this->redirectTo("asistencia/view");
        }
    }
}
