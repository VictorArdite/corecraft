<?php
class CalendarioController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function index() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }

        $mes = isset($_GET['mes']) ? $_GET['mes'] : date('m');
        $anio = isset($_GET['anio']) ? $_GET['anio'] : date('Y');

        // Obtener los días de entrenamiento del usuario con sus detalles
        $stmt = $this->db->prepare("
            SELECT fecha, tipo_entrenamiento, duracion, notas 
            FROM dias_entrenamiento 
            WHERE user_id = :user_id 
            AND MONTH(fecha) = :mes 
            AND YEAR(fecha) = :anio
        ");
        $stmt->execute([
            'user_id' => $_SESSION['user_id'],
            'mes' => $mes,
            'anio' => $anio
        ]);
        $dias_entrenamiento = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . '/../views/calendario.php';
    }

    public function toggleDia() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'No autorizado']);
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fecha = $_POST['fecha'];
            $user_id = $_SESSION['user_id'];
            $tipo_entrenamiento = $_POST['tipo_entrenamiento'] ?? 'fuerza';
            $duracion = $_POST['duracion'] ?? 60;
            $notas = $_POST['notas'] ?? '';

            try {
                // Verificar si el día ya está marcado
                $stmt = $this->db->prepare("
                    SELECT id FROM dias_entrenamiento 
                    WHERE user_id = :user_id AND fecha = :fecha
                ");
                $stmt->execute(['user_id' => $user_id, 'fecha' => $fecha]);
                $existe = $stmt->fetch();

                if ($existe) {
                    // Eliminar el día
                    $stmt = $this->db->prepare("
                        DELETE FROM dias_entrenamiento 
                        WHERE user_id = :user_id AND fecha = :fecha
                    ");
                    $stmt->execute(['user_id' => $user_id, 'fecha' => $fecha]);
                    echo json_encode(['success' => true, 'action' => 'removed']);
                } else {
                    // Agregar el día con detalles
                    $stmt = $this->db->prepare("
                        INSERT INTO dias_entrenamiento 
                        (user_id, fecha, tipo_entrenamiento, duracion, notas) 
                        VALUES 
                        (:user_id, :fecha, :tipo_entrenamiento, :duracion, :notas)
                    ");
                    $stmt->execute([
                        'user_id' => $user_id,
                        'fecha' => $fecha,
                        'tipo_entrenamiento' => $tipo_entrenamiento,
                        'duracion' => $duracion,
                        'notas' => $notas
                    ]);
                    echo json_encode(['success' => true, 'action' => 'added']);
                }
            } catch (PDOException $e) {
                error_log("Error en toggleDia: " . $e->getMessage());
                echo json_encode(['success' => false, 'message' => 'Error en el servidor']);
            }
        }
    }
} 