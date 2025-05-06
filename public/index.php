<?php
// Cargar configuración de sesión primero
require_once __DIR__ . '/config/session.php';

// Cargar el resto de la configuración
require_once __DIR__ . '/config/config.php';

require_once __DIR__ . '/../app/config/Database.php';
require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/DashboardController.php';
require_once __DIR__ . '/../app/controllers/RutinaController.php';
require_once __DIR__ . '/../app/controllers/SuplementacionController.php';
require_once __DIR__ . '/../app/controllers/PerfilController.php';
require_once __DIR__ . '/../app/controllers/RegistroPesoController.php';
require_once __DIR__ . '/../app/controllers/ConsultaEjerciciosController.php';
require_once __DIR__ . '/../app/controllers/RutinaPersonalizadaController.php';

// Obtener la conexión a la base de datos
$database = Database::getInstance();
$db = $database->getConnection();

// Verificar si el usuario está autenticado
$public_actions = ['login', 'auth', 'register', 'home', 'consultaEjercicios', 'forgot-password', 'verify-security', 'update-password', 'calculadora-nivel'];
$action = $_GET['action'] ?? 'home';

// Si el usuario no está autenticado y la acción no es pública, redirigir al login
if (!isset($_SESSION['authenticated']) && !in_array($action, $public_actions)) {
    header('Location: index.php?action=login');
    exit;
}

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
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'forgot-password':
        $controller = new AuthController();
        $controller->forgotPassword();
        break;
    case 'verify-security':
        $controller = new AuthController();
        $controller->verifySecurity();
        break;
    case 'update-password':
        $controller = new AuthController();
        $controller->updatePassword();
        break;
    case 'dashboard':
        $controller = new DashboardController();
        $controller->index();
        break;
    case 'calculadora-nivel':
        $controller = new DashboardController();
        $controller->calculadoraNivel();
        break;
    case 'perfil':
        $controller = new PerfilController($db);
        $controller->index();
        break;
    case 'rutinas':
        $controller = new RutinaController();
        $controller->index();
        break;
    case 'rutina-personalizada':
        $controller = new RutinaPersonalizadaController();
        $controller->mostrarFormulario();
        break;
    case 'rutina-personalizada/guardar':
        $controller = new RutinaPersonalizadaController();
        $controller->guardarRutina();
        break;
    case 'mis-rutinas':
        $controller = new RutinaPersonalizadaController();
        $controller->mostrarMisRutinas();
        break;
    case 'borrar-rutina':
        $controller = new RutinaPersonalizadaController();
        $controller->borrarRutina();
        break;
    case 'ver-rutina':
        $controller = new RutinaPersonalizadaController();
        $id = $_GET['id'] ?? null;
        if ($id) {
            $controller->verRutina($id);
        } else {
            header('Location: index.php?action=mis-rutinas');
        }
        break;
    case 'verRutinaPorNombre':
        $controller = new RutinaController();
        $controller->verRutinaPorNombre($_GET['nombre']);
        break;
    case 'suplementacion':
        $controller = new SuplementacionController();
        $controller->index();
        break;
    case 'registro-peso':
        $controller = new RegistroPesoController($db);
        $controller->mostrarFormulario();
        break;
    case 'registro-peso/guardar':
        $controller = new RegistroPesoController($db);
        $controller->guardarRegistro();
        break;
    case 'registro-peso/historial':
        $controller = new RegistroPesoController($db);
        $controller->obtenerHistorial();
        break;
    case 'consultaEjercicios':
        $controller = new ConsultaEjerciciosController();
        $controller->index();
        break;
    case 'ejercicio':
        $controller = new ConsultaEjerciciosController();
        $id = $_GET['id'] ?? null;
        if ($id) {
            $controller->verEjercicio($id);
        } else {
            header('Location: index.php?action=consultaEjercicios');
        }
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
    case 'dietas':
        require_once '../app/controllers/DietasController.php';
        $controller = new DietasController();
        $controller->index();
        break;                
                
            
        
            
            
}
?>