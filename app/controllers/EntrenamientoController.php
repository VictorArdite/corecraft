<?php
require_once __DIR__ . '/../models/Logro.php';

class EntrenamientoController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function registrarPeso() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuarioId = $_SESSION['user_id'];
            $ejercicio = $_POST['ejercicio'] ?? '';
            $peso = $_POST['peso'] ?? 0;
            $repeticiones = $_POST['repeticiones'] ?? 0;

            try {
                // Verificar si es el primer registro de peso del usuario
                $stmt = $this->db->prepare("
                    SELECT COUNT(*) as total 
                    FROM registros_peso 
                    WHERE user_id = :user_id
                ");
                $stmt->execute(['user_id' => $usuarioId]);
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $esPrimerPeso = $resultado['total'] == 0;

                // Registrar el peso
                $stmt = $this->db->prepare("
                    INSERT INTO registros_peso (user_id, ejercicio, peso, repeticiones, fecha)
                    VALUES (:user_id, :ejercicio, :peso, :repeticiones, NOW())
                ");
                $stmt->execute([
                    'user_id' => $usuarioId,
                    'ejercicio' => $ejercicio,
                    'peso' => $peso,
                    'repeticiones' => $repeticiones
                ]);

                // Si es el primer peso registrado, verificar el logro
                if ($esPrimerPeso) {
                    $logroModel = new Logro();
                    $logroModel->verificarLogro($usuarioId, 'registrar_primer_peso');
                }

                header('Location: index.php?action=entrenamientos&success=peso_registrado');
            } catch (PDOException $e) {
                error_log("Error al registrar peso: " . $e->getMessage());
                header('Location: index.php?action=entrenamientos&error=registro_fallido');
            }
            exit();
        }
    }
} 