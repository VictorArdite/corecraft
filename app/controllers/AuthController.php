<?php

class AuthController {
    public function login() {
        require __DIR__ . '/../views/auth/login.php';
    }

    public function authenticate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verificar si los campos del formulario están definidos
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                global $conn;
                $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
                $stmt->execute(['email' => $email]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user && password_verify($password, $user['password'])) {
                    // Iniciar la sesión y almacenar los datos del usuario
                    session_start();
                    $_SESSION['user_id'] = $user['id']; // Almacenar solo el ID del usuario

                    // Redirigir a la página de inicio
                    header('Location: index.php?action=home');
                    exit();
                } else {
                    echo "Usuario o contraseña incorrectos";
                }
            } else {
                echo "Por favor, complete todos los campos.";
            }
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $age = $_POST['age'];
            $weight = $_POST['weight'];
            $height = $_POST['height'];
            $goal = $_POST['goal'];

            global $conn;
            $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password, edad, peso, altura, objetivo) VALUES (:username, :email, :password, :age, :weight, :height, :goal)");
            $stmt->execute([
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'age' => $age,
                'weight' => $weight,
                'height' => $height,
                'goal' => $goal
            ]);

            // Iniciar la sesión y almacenar el ID del usuario
            session_start();
            $_SESSION['user_id'] = $conn->lastInsertId();

            // Redirigir a la página de inicio
            header('Location: index.php?action=home');
            exit();
        } else {
            require_once '../app/views/auth/register.php';
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();

        // Redirigir al usuario a la página de inicio de sesión
        header("Location: index.php?action=login");
        exit();
    }
}
?>