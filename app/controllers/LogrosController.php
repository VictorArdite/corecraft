<?php
require_once __DIR__ . '/../models/Logro.php';
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../config/Database.php';

class LogrosController {
    private $userModel;
    private $logroModel;

    public function __construct() {
        $database = Database::getInstance();
        $this->db = $database->getConnection();
        $this->userModel = new UserModel($this->db);
        $this->logroModel = new Logro();
    }

    public function index() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }

        $user = $this->userModel->getUserById($_SESSION['user_id']);
        $logros = $this->logroModel->obtenerLogrosUsuario($_SESSION['user_id']);
        $puntos = $this->logroModel->obtenerPuntosUsuario($_SESSION['user_id']);
        
        require __DIR__ . '/../views/auth/perfil.php';
    }
}
?>