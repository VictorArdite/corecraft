<?php
require_once '../config/database.php';
require_once '../app/controllers/HomeController.php';
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/DashboardController.php';
require_once '../app/controllers/RutinaController.php'; // Incluir RutinaController

$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'auth':
        $controller = new AuthController();
        $controller->authenticate();
        break;
    case 'register':
        $controller = new AuthController();
        $controller->register();
        break;
    case 'rutinas':
        $controller = new RutinaController();
        $controller->index();
        break;
    case 'verRutinaPorNombre':
        $controller = new RutinaController();
        $controller->verRutinaPorNombre($_GET['nombre']);
        break;
    case 'dashboard':
        $controller = new DashboardController();
        $controller->index();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    default:
        echo "Página no encontrada";
        break;
}
?>