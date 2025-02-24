<?php
require_once '/c:/xampp/htdocs/corecraft/app/models/Logro.php';
require_once '/c:/xampp/htdocs/corecraft/app/models/UserModel.php';
require_once '/c:/xampp/htdocs/corecraft/config/database.php';

class LogrosController {
    private $userModel;

    public function __construct() {
        global $conn;
        $this->userModel = new UserModel($conn);
    }

    public function index() {
        session_start();
        $usuarioId = $_SESSION['usuario_id'];
        $user = $this->userModel->getUserById($usuarioId);
        $logros = Logro::getByUser($usuarioId);
        require 'views/auth/perfil.php';
    }
}
?>