<?php
require_once __DIR__ . '/../config/Database.php';

class Logro {
    private $db;

    public function __construct() {
        $database = Database::getInstance();
        $this->db = $database->getConnection();
    }

    public function obtenerLogrosUsuario($userId) {
        try {
            $stmt = $this->db->prepare("
                SELECT l.*, ul.fecha_logro as fecha_obtencion 
                FROM logros l
                LEFT JOIN usuario_logros ul ON l.id = ul.logro_id AND ul.usuario_id = :usuario_id
                ORDER BY l.id
            ");
            $stmt->execute(['usuario_id' => $userId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error al obtener logros del usuario: " . $e->getMessage());
            return [];
        }
    }

    public function verificarLogro($userId, $requisito) {
        try {
            // Verificar si el usuario ya tiene el logro
            $stmt = $this->db->prepare("
                SELECT l.id 
                FROM logros l
                JOIN usuario_logros ul ON l.id = ul.logro_id
                WHERE ul.usuario_id = :usuario_id AND l.requisito = :requisito
            ");
            $stmt->execute([
                'usuario_id' => $userId,
                'requisito' => $requisito
            ]);
            
            if ($stmt->fetch()) {
                return false; // Ya tiene el logro
            }

            // Obtener el ID del logro
            $stmt = $this->db->prepare("SELECT id FROM logros WHERE requisito = :requisito");
            $stmt->execute(['requisito' => $requisito]);
            $logro = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$logro) {
                return false; // No existe el logro
            }

            // Asignar el logro al usuario
            $stmt = $this->db->prepare("
                INSERT INTO usuario_logros (usuario_id, logro_id, fecha_logro)
                VALUES (:usuario_id, :logro_id, NOW())
            ");
            return $stmt->execute([
                'usuario_id' => $userId,
                'logro_id' => $logro['id']
            ]);
        } catch (PDOException $e) {
            error_log("Error al verificar logro: " . $e->getMessage());
            return false;
        }
    }

    public function obtenerPuntosUsuario($userId) {
        try {
            $stmt = $this->db->prepare("
                SELECT SUM(l.puntos) as total_puntos
                FROM logros l
                JOIN usuario_logros ul ON l.id = ul.logro_id
                WHERE ul.usuario_id = :usuario_id
            ");
            $stmt->execute(['usuario_id' => $userId]);
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado['total_puntos'] ?? 0;
        } catch (PDOException $e) {
            error_log("Error al obtener puntos del usuario: " . $e->getMessage());
            return 0;
        }
    }
}