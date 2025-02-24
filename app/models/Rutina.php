<?php
class Rutina {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function obtenerRutinasAgrupadas() {
        $stmt = $this->db->prepare("SELECT nombre, COUNT(DISTINCT dia) AS dias FROM rutinas GROUP BY nombre");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerRutinaPorNombre($nombre) {
        $stmt = $this->db->prepare("SELECT * FROM rutinas WHERE nombre = :nombre AND id <= 10 ORDER BY dia, id");
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>