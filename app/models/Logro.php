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
                SELECT l.*, ul.fecha_obtencion as fecha_obtencion 
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
            error_log("Verificando logro para usuario $userId con requisito $requisito");

            // Primero verificar si el logro existe
            $stmt = $this->db->prepare("
                SELECT id, tipo_requisito, valor_requisito, unidad_requisito 
                FROM logros 
                WHERE requisito = :requisito
            ");
            $stmt->execute(['requisito' => $requisito]);
            $logro = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$logro) {
                error_log("No se encontró el logro con requisito $requisito");
                return false;
            }

            error_log("Encontrado logro con ID: " . $logro['id']);

            // Verificar si el usuario ya tiene el logro
            $stmt = $this->db->prepare("
                SELECT COUNT(*) as total 
                FROM usuario_logros 
                WHERE usuario_id = :usuario_id AND logro_id = :logro_id
            ");
            $stmt->execute([
                'usuario_id' => $userId,
                'logro_id' => $logro['id']
            ]);
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($resultado['total'] > 0) {
                error_log("El usuario $userId ya tiene el logro con ID " . $logro['id']);
                return false;
            }

            // Verificar requisitos específicos según el tipo
            if ($logro['tipo_requisito'] === 'peso') {
                // Obtener el último registro de peso del usuario
                $stmt = $this->db->prepare("
                    SELECT peso 
                    FROM registros_peso 
                    WHERE user_id = :usuario_id 
                    ORDER BY fecha DESC 
                    LIMIT 1
                ");
                $stmt->execute(['usuario_id' => $userId]);
                $ultimoPeso = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$ultimoPeso) {
                    error_log("No se encontró registro de peso para el usuario $userId");
                    return false;
                }

                // Verificar si cumple con el requisito de peso
                if ($logro['valor_requisito'] && $ultimoPeso['peso'] < $logro['valor_requisito']) {
                    error_log("El peso actual ({$ultimoPeso['peso']}) no cumple con el requisito ({$logro['valor_requisito']})");
                    return false;
                }
            }

            // Asignar el logro al usuario
            $stmt = $this->db->prepare("
                INSERT INTO usuario_logros (usuario_id, logro_id, fecha_obtencion)
                VALUES (:usuario_id, :logro_id, NOW())
            ");
            $resultado = $stmt->execute([
                'usuario_id' => $userId,
                'logro_id' => $logro['id']
            ]);

            if ($resultado) {
                error_log("Logro asignado exitosamente al usuario $userId");
                return true;
            } else {
                error_log("Error al asignar el logro al usuario $userId");
                return false;
            }
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