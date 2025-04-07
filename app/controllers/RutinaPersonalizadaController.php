<?php
require_once __DIR__ . '/../models/Rutina.php';
require_once __DIR__ . '/../models/Logro.php';
require_once __DIR__ . '/../models/Ejercicio.php';

class RutinaPersonalizadaController {
    private $db;
    private $ejercicioModel;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
        $this->ejercicioModel = new Ejercicio($this->db);
    }

    public function mostrarFormulario() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }

        // Obtener todos los ejercicios disponibles
        $ejercicios = $this->ejercicioModel->obtenerTodos();
        
        // Pasar los ejercicios a la vista
        require_once __DIR__ . '/../views/rutina_personalizada.php';
    }

    public function mostrarMisRutinas() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }

        // Obtener las rutinas personalizadas del usuario
        $stmt = $this->db->prepare("
            SELECT rp.*
            FROM rutinas_personalizadas rp
            WHERE rp.usuario_id = ?
            ORDER BY rp.fecha_creacion DESC
        ");
        $stmt->execute([$_SESSION['user_id']]);
        $rutinas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Obtener los ejercicios para cada rutina
        foreach ($rutinas as &$rutina) {
            $stmt = $this->db->prepare("
                SELECT erp.*, e.nombre, e.descripcion, e.grupo_muscular
                FROM ejercicios_rutina_personalizada erp
                JOIN ejercicios e ON erp.ejercicio_id = e.id
                WHERE erp.rutina_id = ?
            ");
            $stmt->execute([$rutina['id']]);
            $rutina['ejercicios'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        require_once __DIR__ . '/../views/mis_rutinas.php';
    }

    public function verRutina($id) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }

        // Obtener la información de la rutina
        $stmt = $this->db->prepare("
            SELECT rp.*, u.nombre as nombre_usuario
            FROM rutinas_personalizadas rp
            JOIN usuarios u ON rp.usuario_id = u.id
            WHERE rp.id = ? AND rp.usuario_id = ?
        ");
        $stmt->execute([$id, $_SESSION['user_id']]);
        $rutina = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$rutina) {
            $_SESSION['error'] = "Rutina no encontrada.";
            header('Location: index.php?action=mis-rutinas');
            exit;
        }

        // Obtener los ejercicios de la rutina
        $stmt = $this->db->prepare("
            SELECT erp.*, e.nombre, e.descripcion, e.grupo_muscular
            FROM ejercicios_rutina_personalizada erp
            JOIN ejercicios e ON erp.ejercicio_id = e.id
            WHERE erp.rutina_id = ?
        ");
        $stmt->execute([$id]);
        $ejercicios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . '/../views/ver_rutina.php';
    }

    public function guardarRutina() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $ejercicios = json_decode($_POST['ejercicios'] ?? '[]', true);

            if (empty($nombre) || empty($ejercicios)) {
                $_SESSION['error'] = "Por favor, complete todos los campos requeridos.";
                header('Location: index.php?action=rutina-personalizada');
                exit;
            }

            try {
                $this->db->beginTransaction();

                // Insertar la rutina
                $stmt = $this->db->prepare("INSERT INTO rutinas_personalizadas (usuario_id, nombre, descripcion) VALUES (?, ?, ?)");
                $stmt->execute([$_SESSION['user_id'], $nombre, $descripcion]);
                $rutinaId = $this->db->lastInsertId();

                // Insertar los ejercicios de la rutina
                $stmt = $this->db->prepare("INSERT INTO ejercicios_rutina_personalizada (rutina_id, ejercicio_id, series, repeticiones) VALUES (?, ?, ?, ?)");
                foreach ($ejercicios as $ejercicio) {
                    $stmt->execute([
                        $rutinaId,
                        $ejercicio['id'],
                        $ejercicio['series'],
                        $ejercicio['repeticiones']
                    ]);
                }

                // Verificar si es la primera rutina personalizada del usuario
                $stmt = $this->db->prepare("SELECT COUNT(*) FROM rutinas_personalizadas WHERE usuario_id = ?");
                $stmt->execute([$_SESSION['user_id']]);
                $totalRutinas = $stmt->fetchColumn();

                if ($totalRutinas === 1) {
                    // Asignar el logro de primera rutina personalizada
                    $logroModel = new Logro();
                    $logroModel->verificarLogro($_SESSION['user_id'], 'crear_rutina_personalizada');
                }

                $this->db->commit();
                $_SESSION['success'] = "Rutina personalizada creada exitosamente.";
                header('Location: index.php?action=rutinas');
                exit;

            } catch (Exception $e) {
                $this->db->rollBack();
                $_SESSION['error'] = "Error al crear la rutina: " . $e->getMessage();
                header('Location: index.php?action=rutina-personalizada');
                exit;
            }
        }
    }

    public function borrarRutina() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rutina_id'])) {
            $rutina_id = $_POST['rutina_id'];
            $usuario_id = $_SESSION['user_id'];

            // Verificar que la rutina pertenece al usuario
            $stmt = $this->db->prepare("SELECT * FROM rutinas_personalizadas WHERE id = ? AND usuario_id = ?");
            $stmt->execute([$rutina_id, $usuario_id]);
            $rutina = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($rutina) {
                // Borrar la rutina
                $stmt = $this->db->prepare("DELETE FROM rutinas_personalizadas WHERE id = ?");
                $stmt->execute([$rutina_id]);
                $stmt = $this->db->prepare("DELETE FROM ejercicios_rutina_personalizada WHERE rutina_id = ?");
                $stmt->execute([$rutina_id]);
                $_SESSION['mensaje'] = "Rutina borrada correctamente";
            } else {
                $_SESSION['error'] = "No tienes permiso para borrar esta rutina";
            }
        }

        header('Location: index.php?action=mis-rutinas');
        exit;
    }
} 