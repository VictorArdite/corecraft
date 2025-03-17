<?php
class RegistroPeso {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function guardarRegistro($userId, $ejercicio, $peso, $fecha, $repeticiones) {
        try {
            $stmt = $this->db->prepare("
                INSERT INTO entrenamientos (usuario_id, rutina, peso, fecha, repeticiones) 
                VALUES (:usuario_id, :ejercicio, :peso, :fecha, :repeticiones)
            ");
            
            $stmt->bindParam(':usuario_id', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':ejercicio', $ejercicio, PDO::PARAM_STR);
            $stmt->bindParam(':peso', $peso, PDO::PARAM_STR);
            $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
            $stmt->bindParam(':repeticiones', $repeticiones, PDO::PARAM_INT);
            
            $result = $stmt->execute();
            
            if (!$result) {
                error_log("Error al guardar registro: " . implode(", ", $stmt->errorInfo()));
                return false;
            }
            
            return true;
        } catch (PDOException $e) {
            error_log("Error de base de datos al guardar registro: " . $e->getMessage());
            throw $e;
        }
    }

    public function obtenerHistorialEjercicio($userId, $ejercicio) {
        try {
            $stmt = $this->db->prepare("
                SELECT * FROM entrenamientos 
                WHERE usuario_id = :usuario_id AND rutina = :ejercicio 
                ORDER BY fecha DESC
            ");
            
            $stmt->bindParam(':usuario_id', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':ejercicio', $ejercicio, PDO::PARAM_STR);
            
            if (!$stmt->execute()) {
                error_log("Error al obtener historial: " . implode(", ", $stmt->errorInfo()));
                return [];
            }
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error de base de datos al obtener historial: " . $e->getMessage());
            throw $e;
        }
    }

    public function obtenerUltimoRegistro($userId, $ejercicio) {
        try {
            $stmt = $this->db->prepare("
                SELECT * FROM entrenamientos 
                WHERE usuario_id = :usuario_id AND rutina = :ejercicio 
                ORDER BY fecha DESC LIMIT 1
            ");
            
            $stmt->bindParam(':usuario_id', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':ejercicio', $ejercicio, PDO::PARAM_STR);
            
            if (!$stmt->execute()) {
                error_log("Error al obtener último registro: " . implode(", ", $stmt->errorInfo()));
                return null;
            }
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error de base de datos al obtener último registro: " . $e->getMessage());
            throw $e;
        }
    }
}
?> 