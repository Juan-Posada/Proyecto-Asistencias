<?php

class Ambiente {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $result = $this->db->query("SELECT * FROM ambientes");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM ambientes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($nombre, $centro_id) {
        $stmt = $this->db->prepare("INSERT INTO ambientes (nombre, centro_id) VALUES (?, ?)");
        $stmt->bind_param("si", $nombre, $centro_id);
        return $stmt->execute();
    }

    public function update($id, $nombre, $centro_id) {
        $stmt = $this->db->prepare("UPDATE ambientes SET nombre = ?, centro_id = ? WHERE id = ?");
        $stmt->bind_param("sii", $nombre, $centro_id, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM ambientes WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}