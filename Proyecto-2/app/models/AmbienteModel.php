<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . '../models/BaseModel.php';

class AmbienteModel extends BaseModel {
    public function __construct() {
        $this->table = "ambientes"; // Nombre de la tabla en la base de datos
        parent::__construct();
    }

    public function saveAmbiente($nombre) {
        try {
            $sql = "INSERT INTO $this->table (nombre) VALUES (:nombre)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar el ambiente>" . $ex->getMessage();
        }
    }

    public function getAmbiente($id) {
        try {
            $sql = "SELECT * FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo "Error al obtener el ambiente>" . $ex->getMessage();
        }
    }

    public function editAmbiente($id, $nombre) {
        try {
            $sql = "UPDATE $this->table SET nombre=:nombre WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al editar el ambiente>" . $ex->getMessage();
        }
    }

    public function removeAmbiente($id) {
        try {
            $sql = "DELETE FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar el ambiente: " . $ex->getMessage();
            return false;
        }
    }
}