<?php
class AuthController {
    public function login() {
        require_once '../app/views/auth/login.php';
    }

    public function authenticate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            global $conn;
            $stmt = $conn->prepare("SELECT * FROM usuarios WHERE nombre = :username");
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                header('Location: index.php?action=dashboard');
            } else {
                echo "Usuario o contraseña incorrectos";
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

            header('Location: index.php?action=login');
        } else {
            require_once '../app/views/auth/register.php';
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?action=home');
    }
}
?>