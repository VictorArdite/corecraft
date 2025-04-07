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
                peso FLOAT,
                altura FLOAT,
                objetivo VARCHAR(100),
                pregunta_seguridad VARCHAR(255),
                respuesta_seguridad VARCHAR(255),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )");

            // Crear tabla de reseteo de contraseñas
            $this->conn->exec("CREATE TABLE IF NOT EXISTS password_resets (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(100) NOT NULL,
                token VARCHAR(64) NOT NULL,
                expires_at DATETIME NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )");
        } catch (PDOException $e) {
            die("Error al crear las tablas: " . $e->getMessage());
        }
    }
} 