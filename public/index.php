<?php
require_once '../config/database.php';
require_once '../app/controllers/HomeController.php';
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/DashboardController.php';
require_once '../app/controllers/RutinaController.php';
require_once '../app/controllers/SuplementacionController.php';
require_once '../app/controllers/PerfilController.php'; // Incluir PerfilController

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
    case 'suplementacion':
        $controller = new SuplementacionController();
        $controller->index();
        break;
    case 'perfil':
        $controller = new PerfilController();
        $controller->index();
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
    case 'nosotros':
            require_once '../app/controllers/NosotrosController.php';
            $controller = new NosotrosController();
            $controller->index();
            break;
        
    case 'services':
            require_once '../app/controllers/ServiciosController.php';
            $controller = new ServiciosController();
            $controller->index();
        break;
    case 'privacy':
            require_once '../app/controllers/PoliticaController.php';
            $controller = new PoliticaController();
            $controller->index();
            break;
    case 'faq':
                require_once '../app/controllers/FaqController.php';
                $controller = new FaqController();
                $controller->index();
                break;
    case 'contact':
                    require_once '../app/controllers/ContactoController.php';
                    $controller = new ContactoController();
                    $controller->index();
                    break;
                
            
        
            
            
}
?>