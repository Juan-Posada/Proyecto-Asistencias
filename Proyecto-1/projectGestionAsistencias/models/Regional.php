<?php

class Regional {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $result = $this->db->query("SELECT * FROM regionales");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM regionales WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($nombre) {
        $stmt = $this->db->prepare("INSERT INTO regionales (nombre) VALUES (?)");
        $stmt->bind_param("s", $nombre);
        return $stmt->execute();
    }

    public function update($id, $nombre) {
        $stmt = $this->db->prepare("UPDATE regionales SET nombre = ? WHERE id = ?");
        $stmt->bind_param("si", $nombre, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM regionales WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}