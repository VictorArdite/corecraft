<?php

class Database {
    private $host = 'localhost';
    private $db_name = 'corecraft';
    private $username = 'root';
    private $password = '';
    private $conn;
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        if ($this->conn === null) {
            try {
                $this->conn = new PDO(
                    'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                    $this->username,
                    $this->password,
                    [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]
                );
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                
                // Crear las tablas si no existen
                $this->createTables();
            } catch(PDOException $e) {
                throw new Exception('Error de conexión: ' . $e->getMessage());
            }
        }
        return $this->conn;
    }

    private function createTables() {
        try {
            // Crear tabla de usuarios si no existe
            $this->conn->exec("CREATE TABLE IF NOT EXISTS usuarios (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(100) NOT NULL,
                email VARCHAR(100) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL,
                edad INT,
                peso DECIMAL(5,2),
                altura DECIMAL(5,2),
                objetivo ENUM('perder_peso', 'ganar_masa_muscular', 'mejorar_resistencia') NOT NULL,
                peso_objetivo DECIMAL(5,2),
                creado_en TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
            )");

            // Crear tabla de reseteo de contraseñas
            $this->conn->exec("CREATE TABLE IF NOT EXISTS password_resets (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(100) NOT NULL,
                token VARCHAR(64) NOT NULL,
                expires_at DATETIME NOT NULL,
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
            )");

            // Crear tabla de logros si no existe
            $this->conn->exec("CREATE TABLE IF NOT EXISTS logros (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(100) NOT NULL,
                descripcion TEXT NOT NULL,
                requisito VARCHAR(50) NOT NULL UNIQUE,
                puntos INT NOT NULL DEFAULT 0,
                icono VARCHAR(255) DEFAULT 'default.png',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )");

            // Crear tabla de logros de usuario si no existe
            $this->conn->exec("CREATE TABLE IF NOT EXISTS usuario_logros (
                id INT AUTO_INCREMENT PRIMARY KEY,
                usuario_id INT NOT NULL,
                logro_id INT NOT NULL,
                fecha_obtencion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
                FOREIGN KEY (logro_id) REFERENCES logros(id) ON DELETE CASCADE,
                UNIQUE KEY unique_usuario_logro (usuario_id, logro_id)
            )");

            // Insertar logros predefinidos si no existen
            $this->conn->exec("INSERT IGNORE INTO logros (nombre, descripcion, requisito, puntos, icono, tipo_requisito, valor_requisito, unidad_requisito) VALUES
                ('Primer Entrenamiento', 'Completa tu primera rutina de entrenamiento', 'completar_primer_entrenamiento', 10, 'primer_entrenamiento.png', 'entrenamiento', NULL, NULL),
                ('Peso Objetivo', 'Alcanza tu peso objetivo', 'alcanzar_peso_objetivo', 100, 'peso_objetivo.png', 'peso', NULL, NULL),
                ('Rutina Streak', 'Completa 7 días seguidos de entrenamiento', 'completar_streak_7_dias', 50, 'streak.png', 'entrenamiento', 7, 'dias'),
                ('Peso Registrado', 'Registra tu primer peso', 'registrar_primer_peso', 5, 'peso_registrado.png', 'peso', 0, 'kg'),
                ('Rutina Personalizada', 'Crea tu primera rutina personalizada', 'crear_rutina_personalizada', 20, 'rutina_personalizada.png', 'personalizado', NULL, NULL),
                ('Entrenamiento Intenso', 'Completa una rutina de alta intensidad', 'completar_rutina_alta_intensidad', 30, 'intenso.png', 'entrenamiento', NULL, NULL),
                ('Peso Perdido', 'Pierde 5 kg desde tu peso inicial', 'perder_5kg', 75, 'peso_perdido.png', 'peso', 5, 'kg'),
                ('Entrenamiento Social', 'Comparte una rutina con otro usuario', 'compartir_rutina', 15, 'social.png', 'social', NULL, NULL)
            ");

        } catch (PDOException $e) {
            die("Error al crear las tablas: " . $e->getMessage());
        }
    }
} 