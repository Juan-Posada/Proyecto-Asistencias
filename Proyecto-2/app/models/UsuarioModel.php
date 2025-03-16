<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . '../models/BaseModel.php';

class UsuarioModel extends BaseModel
{
    public function __construct()
    {
        $this->table = "usuarios"; // Nombre de la tabla en la base de datos
        parent::__construct();
    }

    public function saveUsuario($nombre)
    {
        try {
            $sql = "INSERT INTO $this->table (nombre) VALUES (:nombre)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar el usuario>" . $ex->getMessage();
        }
    }

    public function getUsuario($id)
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo "Error al obtener el usuario>" . $ex->getMessage();
        }
    }

    public function editUsuario($id, $nombre)
    {
        try {
            $sql = "UPDATE $this->table SET nombre=:nombre WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al editar el usuario>" . $ex->getMessage();
        }
    }

    public function removeUsuario($id)
    {
        try {
            $sql = "DELETE FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar el usuario: " . $ex->getMessage();
            return false;
        }
    }
    public function validarLogin($user, $password)
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE email = :email AND password = :password";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(':email', $user, PDO::PARAM_STR);
            $statement->bindParam(':password', $password, PDO::PARAM_STR);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ) !== false; // Retorna true si el usuario existe
        } catch (PDOException $ex) {
            echo "Error al validar el login: " . $ex->getMessage();
            return false;
        }
    }
}
