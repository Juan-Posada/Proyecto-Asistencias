<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . '../models/BaseModel.php';

class AsistenciaModel extends BaseModel {
    public function __construct() {
        $this->table = "asistencias"; // Nombre de la tabla en la base de datos
        parent::__construct();
    }

    public function saveAsistencia($id_aprendiz, $fecha, $estado) {
        try {
            $sql = "INSERT INTO $this->table (id_aprendiz, fecha, estado) VALUES (:id_aprendiz, :fecha, :estado)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(':id_aprendiz', $id_aprendiz, PDO::PARAM_INT);
            $statement->bindParam(':fecha', $fecha, PDO::PARAM_STR);
            $statement->bindParam(':estado', $estado, PDO::PARAM_STR);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar la asistencia>" . $ex->getMessage();
        }
    }

    public function getAsistencia($id) {
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

    public function editAsistencia($id, $id_aprendiz, $fecha, $estado) {
        try {
            $sql = "UPDATE $this->table SET id_aprendiz=:id_aprendiz, fecha=:fecha, estado=:estado WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id_aprendiz", $id_aprendiz, PDO::PARAM_INT);
            $statement->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $statement->bindParam(":estado", $estado, PDO::PARAM_STR);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al editar la asistencia>" . $ex->getMessage();
        }
    }

    public function removeAsistencia($id) {
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
    
    // Nuevo método para obtener asistencias de un grupo de aprendices
    public function getAsistenciasByAprendices($aprendices) {
        if (empty($aprendices)) {
            return [];
        }
        
        try {
            // Extraer los IDs de los aprendices
            $aprendicesIds = array_map(function($aprendiz) {
                return $aprendiz->id;
            }, $aprendices);
            
            // Crear marcadores de posición para la consulta SQL
            $placeholders = implode(',', array_fill(0, count($aprendicesIds), '?'));
            
            $sql = "SELECT * FROM $this->table WHERE id_aprendiz IN ($placeholders)";
            $statement = $this->dbConnection->prepare($sql);
            
            // Vincular los IDs a los marcadores de posición
            foreach ($aprendicesIds as $i => $id) {
                $statement->bindValue($i + 1, $id, PDO::PARAM_INT);
            }
            
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo "Error al obtener las asistencias por aprendices>" . $ex->getMessage();
            return [];
        }
    }
}