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
            try {
                $username = $_POST['username'];
                $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $age = (int)$_POST['age'];
                $weight = (float)$_POST['weight'];
                $height = (float)$_POST['height'];
                $goal = $_POST['goal'];

                if (!$email) {
                    throw new Exception("Email inválido");
                }

                $stmt = $this->db->prepare("INSERT INTO usuarios (nombre, email, password, edad, peso, altura, objetivo) 
                                          VALUES (:username, :email, :password, :age, :weight, :height, :goal)");
                
                $stmt->execute([
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                    'age' => $age,
                    'weight' => $weight,
                    'height' => $height,
                    'goal' => $goal
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

    public function sendResetLink() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?action=forgot-password');
            exit;
        }

        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        if (!$email) {
            header('Location: index.php?action=forgot-password&error=Email inválido');
            exit;
        }

        try {
            // Verificar si el email existe
            $stmt = $this->db->prepare("SELECT id FROM usuarios WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if (!$user) {
                header('Location: index.php?action=forgot-password&error=No existe una cuenta con este email');
                exit;
            }

            // Generar token único
            $token = bin2hex(random_bytes(32));
            $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

            // Guardar el token en la base de datos
            $stmt = $this->db->prepare("INSERT INTO password_resets (user_id, token, expiry) VALUES (?, ?, ?)");
            $stmt->execute([$user['id'], $token, $expiry]);

            // Redirigir con mensaje de éxito
            header('Location: index.php?action=forgot-password&message=Se ha enviado un correo con las instrucciones para restablecer tu contraseña');
            exit;

        } catch (Exception $e) {
            error_log($e->getMessage());
            header('Location: index.php?action=forgot-password&error=Error del sistema');
            exit;
        }
    }

    public function resetPassword() {
        if (!isset($_GET['token'])) {
            header('Location: index.php?action=login');
            exit;
        }

        $token = $_GET['token'];
        require __DIR__ . '/../views/auth/reset-password.php';
    }

    public function updatePassword() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?action=login');
            exit;
        }

        $token = $_POST['token'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($password !== $confirmPassword) {
            header('Location: index.php?action=reset-password&token=' . $token . '&error=Las contraseñas no coinciden');
            exit;
        }

        try {
            // Verificar token y que no haya expirado
            $stmt = $this->db->prepare("SELECT user_id FROM password_resets WHERE token = ? AND expiry > NOW() AND used = 0");
            $stmt->execute([$token]);
            $reset = $stmt->fetch();

            if (!$reset) {
                header('Location: index.php?action=forgot-password&error=El enlace ha expirado o no es válido');
                exit;
            }

            // Actualizar contraseña
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $this->db->prepare("UPDATE usuarios SET password = ? WHERE id = ?");
            $stmt->execute([$hashedPassword, $reset['user_id']]);

            // Marcar token como usado
            $stmt = $this->db->prepare("UPDATE password_resets SET used = 1 WHERE token = ?");
            $stmt->execute([$token]);

            header('Location: index.php?action=login&message=Tu contraseña ha sido actualizada');
            exit;

        } catch (Exception $e) {
            error_log($e->getMessage());
            header('Location: index.php?action=reset-password&token=' . $token . '&error=Error del sistema');
            exit;
        }
    }
}
?>