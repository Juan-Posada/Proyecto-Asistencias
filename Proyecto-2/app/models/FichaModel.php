<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . '../models/BaseModel.php';

class FichaModel extends BaseModel {
    public function __construct() {
        $this->table = "fichas"; // Nombre de la tabla en la base de datos
        parent::__construct();
    }

    public function saveFicha($nombre) {
        try {
            $sql = "INSERT INTO $this->table (nombre) VALUES (:nombre)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar la ficha>" . $ex->getMessage();
        }
    }

    public function getFicha($id) {
        try {
            $sql = "SELECT * FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo "Error al obtener la ficha>" . $ex->getMessage();
        }
    }

    public function editFicha($id, $nombre) {
        try {
            $sql = "UPDATE $this->table SET nombre=:nombre WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al editar la ficha>" . $ex->getMessage();
        }
    }

    public function removeFicha($id) {
        try {
            $sql = "DELETE FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar la ficha: " . $ex->getMessage();
            return false;
        }
    }
}