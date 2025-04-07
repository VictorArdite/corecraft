<?php

require_once dirname(__DIR__) . '/config/Database.php';

class AuthController {
    private $db;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        try {
            $database = Database::getInstance();
            $this->db = $database->getConnection();
        } catch (Exception $e) {
            die("Error al conectar con la base de datos: " . $e->getMessage());
        }
    }

    public function login() {
        if (isset($_SESSION['authenticated'])) {
            header('Location: index.php?action=home');
            exit;
        }
        require __DIR__ . '/../views/auth/login.php';
    }

    public function authenticate() {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                error_log("Método no es POST");
                header('Location: index.php?action=login');
                exit;
            }

            $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
            $password = $_POST['password'] ?? '';

            error_log("Intento de login - Email: " . $email);

            if (!$email) {
                error_log("Email inválido");
                header('Location: index.php?action=login&error=invalid_email');
                exit;
            }

            $stmt = $this->db->prepare("SELECT id, nombre, email, password, edad, peso, altura, objetivo FROM usuarios WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            error_log("Usuario encontrado: " . ($user ? "Sí" : "No"));
            
            if ($user) {
                error_log("Verificando contraseña para usuario: " . $user['email']);
                $passwordValid = password_verify($password, $user['password']);
                error_log("Contraseña válida: " . ($passwordValid ? "Sí" : "No"));

                if ($passwordValid) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['nombre'];
                    $_SESSION['user_email'] = $user['email'];
                    $_SESSION['user_edad'] = $user['edad'];
                    $_SESSION['user_peso'] = $user['peso'];
                    $_SESSION['user_altura'] = $user['altura'];
                    $_SESSION['user_objetivo'] = $user['objetivo'];
                    $_SESSION['authenticated'] = true;
                    
                    error_log("Sesión iniciada para usuario: " . $user['email']);
                    error_log("SESSION data: " . print_r($_SESSION, true));
                    
                    header('Location: index.php?action=home');
                    exit;
                }
            }

            error_log("Credenciales inválidas");
            header('Location: index.php?action=login&error=invalid_credentials');
            exit;

        } catch (Exception $e) {
            error_log("Error de autenticación: " . $e->getMessage());
            error_log("Stack trace: " . $e->getTraceAsString());
            header('Location: index.php?action=login&error=system_error');
            exit;
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $age = $_POST['age'] ?? null;
            $weight = $_POST['weight'] ?? null;
            $height = $_POST['height'] ?? null;
            $goal = $_POST['goal'] ?? '';
            $pregunta_seguridad = $_POST['pregunta_seguridad'] ?? '';
            $respuesta_seguridad = $_POST['respuesta_seguridad'] ?? '';

            if (empty($username) || empty($email) || empty($password) || 
                empty($pregunta_seguridad) || empty($respuesta_seguridad)) {
                header('Location: index.php?action=register&error=2');
                exit();
            }

            try {
                // Verificar si el email ya existe
                $stmt = $this->db->prepare("SELECT id FROM usuarios WHERE email = ?");
                $stmt->execute([$email]);
                if ($stmt->fetch()) {
                    header('Location: index.php?action=register&error=3');
                    exit();
                }

                // Hash de la contraseña
                $password = password_hash($password, PASSWORD_DEFAULT);

                $stmt = $this->db->prepare("INSERT INTO usuarios (nombre, email, password, edad, peso, altura, objetivo, pregunta_seguridad, respuesta_seguridad) 
                                          VALUES (:username, :email, :password, :age, :weight, :height, :goal, :pregunta_seguridad, :respuesta_seguridad)");
                
                $stmt->execute([
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                    'age' => $age,
                    'weight' => $weight,
                    'height' => $height,
                    'goal' => $goal,
                    'pregunta_seguridad' => $pregunta_seguridad,
                    'respuesta_seguridad' => $respuesta_seguridad
                ]);

                $_SESSION['user_id'] = $this->db->lastInsertId();
                $_SESSION['user_name'] = $username;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_edad'] = $age;
                $_SESSION['user_peso'] = $weight;
                $_SESSION['user_altura'] = $height;
                $_SESSION['user_objetivo'] = $goal;
                $_SESSION['authenticated'] = true;

                header('Location: index.php?action=home');
                exit();
            } catch (Exception $e) {
                error_log($e->getMessage());
                header('Location: index.php?action=register&error=1');
                exit();
            }
        } else {
            require_once __DIR__ . '/../views/auth/register.php';
        }
    }

    public function logout() {
        if (session_status() === PHP_SESSION_ACTIVE) {
            $_SESSION = array();
            session_destroy();
            setcookie(session_name(), '', time() - 3600, '/');
        }
        header("Location: index.php?action=login");
        exit();
    }

    public function forgotPassword() {
        require __DIR__ . '/../views/auth/forgot-password.php';
    }

    public function verifySecurity() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?action=forgot-password');
            exit;
        }

        $email = $_POST['email'] ?? '';
        $pregunta = $_POST['pregunta_seguridad'] ?? '';
        $respuesta = $_POST['respuesta_seguridad'] ?? '';

        if (empty($email) || empty($pregunta) || empty($respuesta)) {
            header('Location: index.php?action=forgot-password&error=Todos los campos son obligatorios');
            exit;
        }

        try {
            // Verificar si el usuario existe y la respuesta de seguridad es correcta
            $stmt = $this->db->prepare("SELECT id FROM usuarios WHERE email = ? AND pregunta_seguridad = ? AND respuesta_seguridad = ?");
            $stmt->execute([$email, $pregunta, $respuesta]);
            $user = $stmt->fetch();

            if (!$user) {
                header('Location: index.php?action=forgot-password&error=Email o respuesta de seguridad incorrecta');
                exit;
            }

            // Si la verificación es correcta, mostrar el formulario de nueva contraseña
            header('Location: index.php?action=forgot-password&step=2&email=' . urlencode($email));
            exit;
        } catch (Exception $e) {
            error_log("Error en verifySecurity: " . $e->getMessage());
            header('Location: index.php?action=forgot-password&error=Error al verificar la información. Por favor, inténtalo de nuevo más tarde.');
            exit;
        }
    }

    public function updatePassword() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?action=forgot-password');
            exit;
        }

        $email = $_POST['email'] ?? '';
        $new_password = $_POST['new_password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';

        if (empty($email) || empty($new_password) || empty($confirm_password)) {
            header('Location: index.php?action=forgot-password&step=2&email=' . urlencode($email) . '&error=Todos los campos son obligatorios');
            exit;
        }

        if ($new_password !== $confirm_password) {
            header('Location: index.php?action=forgot-password&step=2&email=' . urlencode($email) . '&error=Las contraseñas no coinciden');
            exit;
        }

        try {
            // Hash de la nueva contraseña
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Actualizar la contraseña
            $stmt = $this->db->prepare("UPDATE usuarios SET password = ? WHERE email = ?");
            $stmt->execute([$hashed_password, $email]);

            // Mostrar mensaje de confirmación
            require_once __DIR__ . '/../views/auth/password-changed.php';
            exit;
        } catch (Exception $e) {
            error_log("Error en updatePassword: " . $e->getMessage());
            header('Location: index.php?action=forgot-password&step=2&email=' . urlencode($email) . '&error=Error al actualizar la contraseña. Por favor, inténtalo de nuevo más tarde.');
            exit;
        }
    }
}
?>