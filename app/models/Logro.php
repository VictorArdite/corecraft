<?php
require_once '/c:/xampp/htdocs/corecraft/config/database.php';

class Logro {
    public static function getAll() {
        global $conn;
        $stmt = $conn->query("SELECT * FROM logros");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getByUser($usuarioId) {
        global $conn;
        $stmt = $conn->prepare("SELECT l.* FROM logros l
                              JOIN usuario_logros ul ON l.id = ul.logro_id
                              WHERE ul.usuario_id = ?");
        $stmt->execute([$usuarioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}