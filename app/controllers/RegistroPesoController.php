<?php
require_once __DIR__ . '/../models/RegistroPeso.php';
require_once __DIR__ . '/../models/Rutina.php';
require_once __DIR__ . '/../models/Logro.php';

class RegistroPesoController {
    private $registroPesoModel;
    private $rutinaModel;
    private $logroModel;
    private $db;

    public function __construct($db) {
        $this->db = $db;
        $this->registroPesoModel = new RegistroPeso($db);
        $this->rutinaModel = new Rutina($db);
        $this->logroModel = new Logro();
    }

    public function mostrarFormulario() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }

        $ejercicios = $this->rutinaModel->obtenerTodosLosEjercicios();
        $rutinas = $this->rutinaModel->obtenerRutinasAgrupadas();
        
        require __DIR__ . '/../views/registro_peso.php';
    }

    public function guardarRegistro() {
        header('Content-Type: application/json');
        
        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
            return;
        }

        if (!isset($_POST['ejercicio']) || !isset($_POST['peso'])) {
            echo json_encode(['success' => false, 'message' => 'Datos incompletos']);
            return;
        }

        // Validar que el peso sea un número válido
        if (!is_numeric($_POST['peso']) || $_POST['peso'] <= 0) {
            echo json_encode(['success' => false, 'message' => 'El peso debe ser un número positivo']);
            return;
        }

        // Validar que las repeticiones sean un número válido
        $repeticiones = isset($_POST['repeticiones']) ? intval($_POST['repeticiones']) : 0;
        if ($repeticiones < 0) {
            echo json_encode(['success' => false, 'message' => 'Las repeticiones no pueden ser negativas']);
            return;
        }

        try {
            // Verificar si es el primer registro de peso del usuario
            $stmt = $this->db->prepare("
                SELECT COUNT(*) as total 
                FROM registros_peso 
                WHERE user_id = :user_id
            ");
            $stmt->execute(['user_id' => $_SESSION['user_id']]);
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $esPrimerPeso = $resultado['total'] == 0;

            $resultado = $this->registroPesoModel->guardarRegistro(
                $_SESSION['user_id'],
                $_POST['ejercicio'],
                floatval($_POST['peso']),
                date('Y-m-d H:i:s'),
                $repeticiones
            );

            if ($resultado) {
                // Si es el primer peso registrado, verificar el logro
                if ($esPrimerPeso) {
                    $this->logroModel->verificarLogro($_SESSION['user_id'], 'registrar_primer_peso');
                }
                echo json_encode(['success' => true, 'message' => 'Registro guardado exitosamente']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al guardar en la base de datos']);
            }
        } catch (Exception $e) {
            error_log("Error al guardar registro de peso: " . $e->getMessage());
            echo json_encode(['success' => false, 'message' => 'Error interno del servidor']);
        }
    }

    public function obtenerHistorial() {
        header('Content-Type: application/json');
        
        if (!isset($_SESSION['user_id']) || !isset($_GET['ejercicio'])) {
            echo json_encode(['success' => false, 'message' => 'Datos incompletos']);
            return;
        }

        try {
            $historial = $this->registroPesoModel->obtenerHistorialEjercicio(
                $_SESSION['user_id'],
                $_GET['ejercicio']
            );

            echo json_encode(['success' => true, 'data' => $historial]);
        } catch (Exception $e) {
            error_log("Error al obtener historial: " . $e->getMessage());
            echo json_encode(['success' => false, 'message' => 'Error al obtener el historial']);
        }
    }
}
?> 