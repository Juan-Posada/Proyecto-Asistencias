<?php

require_once '../models/Instructor.php';

class InstructorController {
    public function index() {
        $instructor = new Instructor();
        $instructores = $instructor->getAll();
        require_once '../views/instructor/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $ficha_id = $_POST['ficha_id'];
            $instructor = new Instructor();
            $instructor->create($nombre, $ficha_id);
            header('Location: index.php');
        } else {
            require_once '../views/instructor/create.php';
        }
    }

    public function edit($id) {
        $instructor = new Instructor();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $ficha_id = $_POST['ficha_id'];
            $instructor->update($id, $nombre, $ficha_id);
            header('Location: ../index.php');
        } else {
            $instructorData = $instructor->getById($id);
            require_once '../views/instructor/edit.php';
        }
    }

    public function delete($id) {
        $instructor = new Instructor();
        $instructor->delete($id);
        header('Location: ../index.php');
    }
}