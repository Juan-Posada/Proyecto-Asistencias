<?php

class Programa {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $result = $this->db->query("SELECT * FROM programas");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM programas WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($nombre, $coordinador_id) {
        $stmt = $this->db->prepare("INSERT INTO programas (nombre, coordinador_id) VALUES (?, ?)");
        $stmt->bind_param("si", $nombre, $coordinador_id);
        return $stmt->execute();
    }

    public function update($id, $nombre, $coordinador_id) {
        $stmt = $this->db->prepare("UPDATE programas SET nombre = ?, coordinador_id = ? WHERE id = ?");
        $stmt->bind_param("sii", $nombre, $coordinador_id, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM programas WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}