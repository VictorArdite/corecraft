<?php
// Cargar configuración de sesión primero
require_once __DIR__ . '/session.php';

// Configuración de la aplicación
define('BASE_URL', 'http://localhost/corecraft');

// Configuración de la base de datos para XAMPP
define('DB_HOST', 'localhost');
define('DB_NAME', 'corecraft');
define('DB_USER', 'root');
define('DB_PASS', ''); // XAMPP por defecto no tiene contraseña

// Configuración de la aplicación
define('APP_NAME', 'CoreCraft');
define('APP_VERSION', '1.0.0');

// Configuración de rutas
define('ROOT_PATH', dirname(dirname(__DIR__)));
define('APP_PATH', ROOT_PATH . '/app');
define('VIEWS_PATH', APP_PATH . '/views');
define('CONTROLLERS_PATH', APP_PATH . '/controllers');
define('MODELS_PATH', APP_PATH . '/models');

// Configuración de zona horaria
date_default_timezone_set('Europe/Madrid');

// Configuración de errores para desarrollo
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', APP_PATH . '/logs/error.log');

// Configuración de conexión a la base de datos
try {
    $db = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch(PDOException $e) {
    error_log("Error de conexión: " . $e->getMessage());
    die("Error de conexión a la base de datos. Por favor, inténtelo más tarde.");
} 