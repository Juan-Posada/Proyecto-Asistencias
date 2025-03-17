<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . '../models/BaseModel.php';

class ProgramaFormacionModel extends BaseModel {
    public function __construct() {
        $this->table = "programas"; // Nombre de la tabla en la base de datos
        parent::__construct();
    }

    public function saveProgramaFormacion($nombre, $id_coordinador) {
        try {
            $sql = "INSERT INTO $this->table (nombre, id_coordinador) VALUES (:nombre, :id_coordinador)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $statement->bindParam(':id_coordinador', $id_coordinador, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar el programa de formación>" . $ex->getMessage();
        }
    }

    public function getProgramaFormacion($id) {
        try {
            $sql = "SELECT * FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo "Error al obtener el programa de formación>" . $ex->getMessage();
        }
    }

    public function editProgramaFormacion($id, $nombre, $id_coordinador) {
        try {
            $sql = "UPDATE $this->table SET nombre=:nombre, id_coordinador=:id_coordinador WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":id_coordinador", $id_coordinador, PDO::PARAM_INT);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al editar el programa de formación>" . $ex->getMessage();
        }
    }

    public function removeProgramaFormacion($id) {
        try {
            $sql = "DELETE FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar el programa de formación: " . $ex->getMessage();
            return false;
        }
    }
}