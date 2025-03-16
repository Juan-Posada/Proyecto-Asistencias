<?php

class Ficha {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $result = $this->db->query("SELECT * FROM fichas");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM fichas WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($codigo, $programa_id, $ambiente_id) {
        $stmt = $this->db->prepare("INSERT INTO fichas (codigo, programa_id, ambiente_id) VALUES (?, ?, ?)");
        $stmt->bind_param("sii", $codigo, $programa_id, $ambiente_id);
        return $stmt->execute();
    }

    public function update($id, $codigo, $programa_id, $ambiente_id) {
        $stmt = $this->db->prepare("UPDATE fichas SET codigo = ?, programa_id = ?, ambiente_id = ? WHERE id = ?");
        $stmt->bind_param("siii", $codigo, $programa_id, $ambiente_id, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM fichas WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}