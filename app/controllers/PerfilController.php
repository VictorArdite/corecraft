<?php
require_once __DIR__ . '/../models/Logro.php';

class PerfilController {
    private $db;
    private $logroModel;

    public function __construct($db) {
        $this->db = $db;
        $this->logroModel = new Logro();
    }

    public function index() {
        // Iniciar la sesión si no está iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Verificar si el usuario está logueado
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }

        try {
            // Obtener los datos del usuario desde la base de datos
            $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
            $stmt->execute(['id' => $_SESSION['user_id']]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                // Si no se encuentra el usuario, redirigir al login
                header('Location: index.php?action=login');
                exit();
            }

            // Obtener el último registro de peso
            $stmt = $this->db->prepare("
                SELECT peso 
                FROM registros_peso 
                WHERE user_id = :user_id 
                ORDER BY fecha DESC 
                LIMIT 1
            ");
            $stmt->execute(['user_id' => $_SESSION['user_id']]);
            $ultimoPeso = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificar si ha alcanzado su objetivo
            if ($user['objetivo'] === 'perder peso' && $ultimoPeso && $ultimoPeso['peso'] <= $user['peso_objetivo']) {
                $this->logroModel->verificarLogro($_SESSION['user_id'], 'alcanzar_objetivo');
            } elseif ($user['objetivo'] === 'ganar músculo' && $ultimoPeso && $ultimoPeso['peso'] >= $user['peso_objetivo']) {
                $this->logroModel->verificarLogro($_SESSION['user_id'], 'alcanzar_objetivo');
            }

            // Obtener los logros del usuario
            $logros = $this->logroModel->obtenerLogrosUsuario($_SESSION['user_id']);
            
            // Obtener los puntos totales del usuario
            $puntos = $this->logroModel->obtenerPuntosUsuario($_SESSION['user_id']);

            require __DIR__ . '/../views/auth/perfil.php';
        } catch (PDOException $e) {
            error_log("Error al obtener datos del perfil: " . $e->getMessage());
            // Manejar el error de manera elegante
            header('Location: index.php?action=home&error=perfil');
            exit();
        }
    }
}
?>