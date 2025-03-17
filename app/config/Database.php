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
} 