<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . '../models/BaseModel.php';

class AprendizModel extends BaseModel {
    public function __construct() {
        $this->table = "aprendices"; // Nombre de la tabla en la base de datos
        parent::__construct();
    }

    public function saveAprendiz($nombre, $email, $id_ficha) {
        try {
            $sql = "INSERT INTO $this->table (nombre, email, id_ficha) VALUES (:nombre, :email, :id_ficha)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':id_ficha', $id_ficha, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar el aprendiz>" . $ex->getMessage();
        }
    }

    public function getAprendiz($id) {
        try {
            $sql = "SELECT * FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo "Error al obtener el aprendiz>" . $ex->getMessage();
        }
    }

    public function editAprendiz($id, $nombre, $email, $id_ficha) {
        try {
            $sql = "UPDATE $this->table SET nombre=:nombre, email=:email, id_ficha=:id_ficha WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":email", $email, PDO::PARAM_STR);
            $statement->bindParam(":id_ficha", $id_ficha, PDO::PARAM_INT);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al editar el aprendiz>" . $ex->getMessage();
        }
    }

    public function removeAprendiz($id) {
        try {
            $sql = "DELETE FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar el aprendiz: " . $ex->getMessage();
            return false;
        }
    }
    
    // Nuevo método para obtener aprendices por ficha
    public function getAprendicesByFicha($id_ficha) {
        try {
            $sql = "SELECT * FROM $this->table WHERE id_ficha=:id_ficha";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id_ficha", $id_ficha, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo "Error al obtener los aprendices por ficha>" . $ex->getMessage();
            return [];
        }
    }
}