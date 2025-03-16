<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . '../models/BaseModel.php';

class RegionalModel extends BaseModel {
    public function __construct() {
        $this->table = "regionales"; // Nombre de la tabla en la base de datos
        parent::__construct();
    }

    public function saveRegional($nombre) {
        try {
            $sql = "INSERT INTO $this->table (nombre) VALUES (:nombre)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar la regional>" . $ex->getMessage();
        }
    }

    public function getRegional($id) {
        try {
            $sql = "SELECT * FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo "Error al obtener la regional>" . $ex->getMessage();
        }
    }

    public function editRegional($id, $nombre) {
        try {
            $sql = "UPDATE $this->table SET nombre=:nombre WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al editar la regional>" . $ex->getMessage();
        }
    }

    public function removeRegional($id) {
        try {
            $sql = "DELETE FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar la regional: " . $ex->getMessage();
            return false;
        }
    }
}