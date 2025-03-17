<?php

namespace App\Controllers;

use App\Models\AprendizModel;
use App\Models\AsistenciaModel;
use App\Models\FichaModel;

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
        $fichaObj = new FichaModel(); // Crear instancia del modelo de Ficha
        $fichas = $fichaObj->getAll(); // Obtener todas las fichas
        
        // Obtener los parámetros de filtrado
        $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : 'todos';
        $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : '';
        $aprendiz_id = isset($_GET['aprendiz_id']) ? $_GET['aprendiz_id'] : '';
        $ficha_id = isset($_GET['ficha_id']) ? $_GET['ficha_id'] : ''; // Nuevo filtro por ficha
        
        // Filtrar las asistencias según los parámetros
        $asistenciasFiltradas = $asistencias;
        
        if ($filtro == 'fecha' && !empty($fecha)) {
            $asistenciasFiltradas = array_filter($asistencias, function($asistencia) use ($fecha) {
                return $asistencia->fecha == $fecha;
            });
            $asistenciasFiltradas = array_values($asistenciasFiltradas); // Reindexar el array
        }
        
        if ($filtro == 'aprendiz' && !empty($aprendiz_id)) {
            $asistenciasFiltradas = array_filter($asistencias, function($asistencia) use ($aprendiz_id) {
                return $asistencia->id_aprendiz == $aprendiz_id;
            });
            $asistenciasFiltradas = array_values($asistenciasFiltradas); // Reindexar el array
        }

        // Filtrar por ficha
        if ($filtro == 'ficha' && !empty($ficha_id)) {
            $asistenciasFiltradas = array_filter($asistencias, function($asistencia) use ($ficha_id) {
                return $asistencia->id_ficha == $ficha_id;
            });
            $asistenciasFiltradas = array_values($asistenciasFiltradas); // Reindexar el array
        }
        
        $data = [
            "asistencias" => $asistenciasFiltradas,
            "asistenciasOriginal" => $asistencias, // Mantener el original para referencia
            "aprendices" => $aprendices,
            "fichas" => $fichas, // Pasar las fichas a la vista
            "filtro" => $filtro,
            "fecha" => $fecha,
            "aprendiz_id" => $aprendiz_id,
            "ficha_id" => $ficha_id, // Pasar el id de ficha a la vista
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
        
        // Obtener el nombre de la ficha
        $fichaObj = new FichaModel();
        $fichaInfo = $fichaObj->getFicha($asistenciaInfo->id_ficha);
        
        $data = [
            "asistencia" => $asistenciaInfo,
            "aprendiz" => $aprendizInfo->nombre, // Agregar el nombre del aprendiz
            "ficha" => $fichaInfo->nombre, // Agregar el nombre de la ficha
            "title" => "Detalles de la Asistencia"
        ];
        $this->render('asistencia/viewOneAsistencia.php', $data);
    }

    public function new() {
        $aprendizObj = new AprendizModel();
        $aprendices = $aprendizObj->getAll();
        
        $fichaObj = new FichaModel(); // Crear instancia del modelo de Ficha
        $fichas = $fichaObj->getAll(); // Obtener todas las fichas
        
        $data = [
            "title" => "Nueva Asistencia",
            "aprendices" => $aprendices,
            "fichas" => $fichas // Pasar las fichas a la vista
        ];
        $this->render('asistencia/newAsistencia.php', $data);
    }


    public function create() {
        if (isset($_POST['txtIdAprendiz'], $_POST['txtFecha'], $_POST['txtEstado'], $_POST['txtIdFicha'])) {
            $id_aprendiz = $_POST['txtIdAprendiz'] ?? null;
            $fecha = $_POST['txtFecha'] ?? null;
            $estado = $_POST['txtEstado'] ?? null;
            $id_ficha = $_POST['txtIdFicha'] ?? null; // Obtener el id_ficha
            $asistenciaObj = new AsistenciaModel();
            $asistenciaObj->saveAsistencia($id_aprendiz, $fecha, $estado, $id_ficha); // Pasar id_ficha
            $this->redirectTo("asistencia/view");
        }
    }

    public function edit($id) {
        $asistenciaObj = new AsistenciaModel();
        $asistenciaInfo = $asistenciaObj->getAsistencia($id);
        $aprendizObj = new AprendizModel();
        $aprendices = $aprendizObj->getAll();
        
        $fichaObj = new FichaModel(); // Crear instancia del modelo de Ficha
        $fichas = $fichaObj->getAll(); // Obtener todas las fichas
        
        $data = [
            "asistencia" => $asistenciaInfo,
            "aprendices" => $aprendices,
            "fichas" => $fichas, // Pasar las fichas a la vista
            "title" => "Editar Asistencia"
        ];
        $this->render('asistencia/editAsistencia.php', $data);
    }

    public function update() {
        if (isset($_POST['txtId'], $_POST['txtIdAprendiz'], $_POST['txtFecha'], $_POST['txtEstado'], $_POST['txtIdFicha'])) {
            $id = $_POST['txtId'] ?? null;
            $id_aprendiz = $_POST['txtIdAprendiz'] ?? null;
            $fecha = $_POST['txtFecha'] ?? null;
            $estado = $_POST['txtEstado'] ?? null;
            $id_ficha = $_POST['txtIdFicha'] ?? null; // Obtener el id_ficha
            $asistenciaObj = new AsistenciaModel();
            $asistenciaObj->editAsistencia($id, $id_aprendiz, $fecha, $estado, $id_ficha); // Pasar id_ficha
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