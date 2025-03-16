<?php

namespace App\Controllers;

use App\Models\ProgramaFormacionModel;

require_once 'baseController.php';
require_once MAIN_APP_ROUTE . '../models/ProgramaFormacionModel.php';

class ProgramaFormacionController extends BaseController
{
    public function __construct()
    {
        $this->layout = "admin_layout";
        parent::__construct();
    }

    public function view()
    {
        $programaObj = new ProgramaFormacionModel();
        $programas = $programaObj->getAll(); // Obtiene todos los programas

        // Añadir esta línea para depurar
        echo "<pre>";
        print_r($programas);
        echo "</pre>";

        $data = [
            "programas" => $programas,
            "title" => "Programas de Formación"
        ];
        $this->render('programaFormacion/viewProgramaFormacion.php', $data); // Renderiza la vista
    }

    public function new()
    {
        $data = [
            "title" => "Nuevo Programa de Formación"
        ];
        $this->render('programaFormacion/newProgramaFormacion.php', $data);
    }

    public function create()
    {
        if (isset($_POST['txtCodigo']) && isset($_POST['txtNombre'])) {
            $codigo = $_POST['txtCodigo'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $programaObj = new ProgramaFormacionModel();
            $programaObj->saveProgramaFormacion($codigo, $nombre);
            $this->redirectTo("programaFormacion/view");
        }
    }

    public function edit($id)
    {
        $programaObj = new ProgramaFormacionModel();
        $programaInfo = $programaObj->getProgramaFormacion($id);
        $data = [
            "programa" => $programaInfo,
            "title" => "Editar Programa de Formación"
        ];
        $this->render('programaFormacion/editProgramaFormacion.php', $data);
    }

    public function update()
    {
        if (isset($_POST['txtId']) && isset($_POST['txtCodigo']) && isset($_POST['txtNombre'])) {
            $id = $_POST['txtId'] ?? null;
            $codigo = $_POST['txtCodigo'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $programaObj = new ProgramaFormacionModel();
            $programaObj->editProgramaFormacion($id, $codigo, $nombre);
            $this->redirectTo("programaFormacion/view");
        }
    }

    public function delete($id)
    {
        $programaObj = new ProgramaFormacionModel();
        $programaInfo = $programaObj->getProgramaFormacion($id);
        $data = [
            "programa" => $programaInfo,
            "title" => "Eliminar Programa de Formación"
        ];
        $this->render('programaFormacion/deleteProgramaFormacion.php', $data);
    }

    public function remove()
    {
        if (isset($_POST['txtId'])) {
            $id = $_POST['txtId'] ?? null;
            $programaObj = new ProgramaFormacionModel();
            $programaObj->removeProgramaFormacion($id);
            $this->redirectTo("programaFormacion/view");
        }
    }
}
