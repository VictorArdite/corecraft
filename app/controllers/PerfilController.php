<?php
require_once __DIR__ . '/../models/Logro.php';

class PerfilController {
    private $db;
    private $logroModel;

    public function __construct($db) {
        $this->db = $db;
        $this->logroModel = new Logro();
    }

    public function index() {
        // Iniciar la sesión si no está iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Verificar si el usuario está logueado
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }

        try {
            // Obtener los datos del usuario desde la base de datos
            $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
            $stmt->execute(['id' => $_SESSION['user_id']]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                // Si no se encuentra el usuario, redirigir al login
                header('Location: index.php?action=login');
                exit();
            }

            // Obtener el último registro de peso
            $stmt = $this->db->prepare("
                SELECT peso 
                FROM registros_peso 
                WHERE user_id = :user_id 
                ORDER BY fecha DESC 
                LIMIT 1
            ");
            $stmt->execute(['user_id' => $_SESSION['user_id']]);
            $ultimoPeso = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificar si ha alcanzado su objetivo
            if ($user['objetivo'] === 'perder_peso' && $ultimoPeso && $ultimoPeso['peso'] <= $user['peso_objetivo']) {
                $this->logroModel->verificarLogro($_SESSION['user_id'], 'alcanzar_peso_objetivo');
            } elseif ($user['objetivo'] === 'ganar_masa_muscular' && $ultimoPeso && $ultimoPeso['peso'] >= $user['peso_objetivo']) {
                $this->logroModel->verificarLogro($_SESSION['user_id'], 'alcanzar_peso_objetivo');
            }

            // Verificar si ha perdido 5kg desde el peso inicial
            if ($user['objetivo'] === 'perder_peso' && $ultimoPeso) {
                $pesoInicial = $user['peso'];
                $pesoActual = $ultimoPeso['peso'];
                if (($pesoInicial - $pesoActual) >= 5) {
                    $this->logroModel->verificarLogro($_SESSION['user_id'], 'perder_5kg');
                }
            }

            // Obtener los logros del usuario
            $logros = $this->logroModel->obtenerLogrosUsuario($_SESSION['user_id']);
            
            // Obtener los puntos totales del usuario
            $puntos = $this->logroModel->obtenerPuntosUsuario($_SESSION['user_id']);

            require __DIR__ . '/../views/auth/perfil.php';
        } catch (PDOException $e) {
            error_log("Error al obtener datos del perfil: " . $e->getMessage());
            // Manejar el error de manera elegante
            header('Location: index.php?action=home&error=perfil');
            exit();
        }
    }

    public function actualizar() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }

        $user_id = $_SESSION['user_id'];
        
        // Validar y sanitizar los datos
        $datos = [
            'nombre' => filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING),
            'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
            'objetivo' => filter_input(INPUT_POST, 'objetivo', FILTER_SANITIZE_STRING),
            'peso' => filter_input(INPUT_POST, 'peso', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
            'altura' => filter_input(INPUT_POST, 'altura', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
            'peso_objetivo' => filter_input(INPUT_POST, 'peso_objetivo', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)
        ];

        // Actualizar datos en la base de datos
        $query = "UPDATE usuarios SET 
            nombre = :nombre,
            email = :email,
            objetivo = :objetivo,
            peso = :peso,
            altura = :altura,
            peso_objetivo = :peso_objetivo
            WHERE id = :user_id";

        $stmt = $this->db->prepare($query);
        $datos['user_id'] = $user_id;
        
        if ($stmt->execute($datos)) {
            // Si se actualizó el peso, registrar en el historial
            if (!empty($datos['peso'])) {
                $this->registrarPeso($user_id, $datos['peso']);
            }
            
            $_SESSION['success'] = "Perfil actualizado correctamente";
        } else {
            $_SESSION['error'] = "Error al actualizar el perfil";
        }

        header('Location: index.php?action=perfil');
        exit;
    }

    private function registrarPeso($user_id, $peso) {
        $query = "INSERT INTO registros_peso (user_id, ejercicio, peso, fecha) VALUES (?, 'Peso Corporal', ?, NOW())";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$user_id, $peso]);
    }

    public function actualizarFoto() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }

        if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
            $user_id = $_SESSION['user_id'];
            $file = $_FILES['foto_perfil'];
            
            // Validar tipo de archivo
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($file['type'], $allowed_types)) {
                $_SESSION['error'] = "Tipo de archivo no permitido";
                header('Location: index.php?action=perfil');
                exit;
            }

            // Crear directorio si no existe
            $upload_dir = __DIR__ . '/../../public/uploads/perfiles/';
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            // Generar nombre único para el archivo
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = $user_id . '_' . time() . '.' . $extension;
            $filepath = $upload_dir . $filename;

            if (move_uploaded_file($file['tmp_name'], $filepath)) {
                // Actualizar en la base de datos
                $query = "UPDATE usuarios SET foto_perfil = ? WHERE id = ?";
                $stmt = $this->db->prepare($query);
                if ($stmt->execute([$filename, $user_id])) {
                    $_SESSION['success'] = "Foto de perfil actualizada correctamente";
                } else {
                    $_SESSION['error'] = "Error al actualizar la foto de perfil";
                }
            } else {
                $_SESSION['error'] = "Error al subir la foto";
            }
        }

        header('Location: index.php?action=perfil');
        exit;
    }

    public function actualizarPesoObjetivo() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $updates = [];
                $params = ['user_id' => $_SESSION['user_id']];

                // Verificar y procesar peso actual
                if (isset($_POST['peso_actual'])) {
                    $peso_actual = filter_input(INPUT_POST, 'peso_actual', FILTER_VALIDATE_FLOAT);
                    if ($peso_actual === false || $peso_actual <= 0) {
                        $_SESSION['error'] = "El peso actual debe ser un número válido mayor que 0";
                        header('Location: index.php?action=perfil');
                        exit();
                    }
                    $updates[] = "peso = :peso_actual";
                    $params['peso_actual'] = $peso_actual;
                    
                    // Registrar el nuevo peso en la tabla registros_peso
                    $stmt = $this->db->prepare("INSERT INTO registros_peso (user_id, ejercicio, peso, repeticiones, fecha) VALUES (:user_id, 'Peso Corporal', :peso, 0, NOW())");
                    $stmt->execute([
                        'user_id' => $_SESSION['user_id'],
                        'peso' => $peso_actual
                    ]);
                }

                // Verificar y procesar peso objetivo
                if (isset($_POST['peso_objetivo'])) {
                    $peso_objetivo = filter_input(INPUT_POST, 'peso_objetivo', FILTER_VALIDATE_FLOAT);
                    if ($peso_objetivo === false || $peso_objetivo <= 0) {
                        $_SESSION['error'] = "El peso objetivo debe ser un número válido mayor que 0";
                        header('Location: index.php?action=perfil');
                        exit();
                    }
                    $updates[] = "peso_objetivo = :peso_objetivo";
                    $params['peso_objetivo'] = $peso_objetivo;
                }

                // Verificar y procesar objetivo
                if (isset($_POST['objetivo'])) {
                    $objetivo = filter_input(INPUT_POST, 'objetivo', FILTER_SANITIZE_STRING);
                    $objetivo = str_replace(' ', '_', $objetivo); // Convertir a formato de la BD
                    if (!in_array($objetivo, ['perder_peso', 'ganar_masa_muscular', 'mejorar_resistencia'])) {
                        $_SESSION['error'] = "Objetivo no válido";
                        header('Location: index.php?action=perfil');
                        exit();
                    }
                    $updates[] = "objetivo = :objetivo";
                    $params['objetivo'] = $objetivo;
                }

                if (!empty($updates)) {
                    $sql = "UPDATE usuarios SET " . implode(", ", $updates) . " WHERE id = :user_id";
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute($params);
                    $_SESSION['success'] = "Datos actualizados correctamente";
                }
            } catch (PDOException $e) {
                error_log("Error al actualizar datos: " . $e->getMessage());
                $_SESSION['error'] = "Error al actualizar los datos";
            }
        }

        header('Location: index.php?action=perfil');
        exit();
    }
}
?>