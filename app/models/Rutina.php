<?php
require_once __DIR__ . '/../config/Database.php';

class Rutina {
    private $db;

    public function __construct() {
        $database = Database::getInstance();
        $this->db = $database->getConnection();
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

    public function obtenerTodosLosEjercicios() {
        $stmt = $this->db->prepare("
            SELECT DISTINCT ejercicio,
                   (SELECT repeticiones 
                    FROM rutinas r2 
                    WHERE r2.ejercicio = r1.ejercicio 
                    GROUP BY repeticiones 
                    ORDER BY COUNT(*) DESC 
                    LIMIT 1) as repeticiones
            FROM rutinas r1
            WHERE ejercicio IS NOT NULL AND ejercicio != ''
            ORDER BY ejercicio ASC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function completarRutina($usuarioId, $rutinaId) {
        try {
            // Verificar si es el primer entrenamiento del usuario
            $stmt = $this->db->prepare("
                SELECT COUNT(*) as total 
                FROM entrenamientos 
                WHERE usuario_id = :usuario_id
            ");
            $stmt->execute(['usuario_id' => $usuarioId]);
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $esPrimerEntrenamiento = $resultado['total'] == 0;

            // Registrar el entrenamiento
            $stmt = $this->db->prepare("
                INSERT INTO entrenamientos (usuario_id, rutina, fecha)
                VALUES (:usuario_id, :rutina, NOW())
            ");
            $stmt->execute([
                'usuario_id' => $usuarioId,
                'rutina' => $rutinaId
            ]);

            // Si es el primer entrenamiento, verificar el logro
            if ($esPrimerEntrenamiento) {
                $logroModel = new Logro();
                $logroModel->verificarLogro($usuarioId, 'completar_primer_entrenamiento');
            }

            // Verificar streak de 5 días
            $this->verificarStreak($usuarioId);

            return true;
        } catch (PDOException $e) {
            error_log("Error al completar rutina: " . $e->getMessage());
            return false;
        }
    }

    private function verificarStreak($usuarioId) {
        try {
            $stmt = $this->db->prepare("
                SELECT COUNT(DISTINCT DATE(fecha)) as dias_consecutivos
                FROM entrenamientos
                WHERE usuario_id = :usuario_id
                AND fecha >= DATE_SUB(CURDATE(), INTERVAL 5 DAY)
            ");
            $stmt->execute(['usuario_id' => $usuarioId]);
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($resultado['dias_consecutivos'] >= 5) {
                $logroModel = new Logro();
                $logroModel->verificarLogro($usuarioId, 'streak_5_dias');
            }
        } catch (PDOException $e) {
            error_log("Error al verificar streak: " . $e->getMessage());
        }
    }
}
?>