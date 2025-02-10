<?php
class Rutina {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function obtenerRutinas() {
        $stmt = $this->db->prepare("SELECT * FROM rutinas");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerRutinaPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM rutinas WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>