<?php

class Centro {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $result = $this->db->query("SELECT * FROM centros");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM centros WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($nombre, $regional_id) {
        $stmt = $this->db->prepare("INSERT INTO centros (nombre, regional_id) VALUES (?, ?)");
        $stmt->bind_param("si", $nombre, $regional_id);
        return $stmt->execute();
    }

    public function update($id, $nombre, $regional_id) {
        $stmt = $this->db->prepare("UPDATE centros SET nombre = ?, regional_id = ? WHERE id = ?");
        $stmt->bind_param("sii", $nombre, $regional_id, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM centros WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}