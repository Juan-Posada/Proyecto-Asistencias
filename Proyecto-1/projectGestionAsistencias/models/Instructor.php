<?php

class Instructor {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $result = $this->db->query("SELECT * FROM instructores");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM instructores WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($nombre, $ficha_id) {
        $stmt = $this->db->prepare("INSERT INTO instructores (nombre, ficha_id) VALUES (?, ?)");
        $stmt->bind_param("si", $nombre, $ficha_id);
        return $stmt->execute();
    }

    public function update($id, $nombre, $ficha_id) {
        $stmt = $this->db->prepare("UPDATE instructores SET nombre = ?, ficha_id = ? WHERE id = ?");
        $stmt->bind_param("sii", $nombre, $ficha_id, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM instructores WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}