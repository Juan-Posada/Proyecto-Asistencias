<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . '../models/BaseModel.php';

class AsistenciaModel extends BaseModel
{
    public function __construct()
    {
        $this->table = "asistencias"; // Nombre de la tabla en la base de datos
        parent::__construct();
    }

    public function saveAsistencia($fecha, $aprendizId)
    {
        try {
            $sql = "INSERT INTO $this->table (fecha, aprendiz_id) VALUES (:fecha, :aprendiz_id)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(':fecha', $fecha, PDO::PARAM_STR);
            $statement->bindParam(':aprendiz_id', $aprendizId, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar la asistencia>" . $ex->getMessage();
        }
    }

    public function getAsistencia($id)
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo "Error al obtener la asistencia>" . $ex->getMessage();
        }
    }

    public function editAsistencia($id, $fecha, $aprendizId)
    {
        try {
            $sql = "UPDATE $this->table SET fecha=:fecha, aprendiz_id=:aprendiz_id WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $statement->bindParam(":aprendiz_id", $aprendizId, PDO::PARAM_INT);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al editar la asistencia>" . $ex->getMessage();
        }
    }

    public function removeAsistencia($id)
    {
        try {
            $sql = "DELETE FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar la asistencia: " . $ex->getMessage();
            return false;
        }
    }
}
