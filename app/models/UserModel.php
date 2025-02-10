<?php
class UserModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getUserByUsername($username) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($data) {
        $stmt = $this->conn->prepare("INSERT INTO users (username, password, age, weight, height, activity_level, goal) VALUES (:username, :password, :age, :weight, :height, :activity_level, :goal)");
        return $stmt->execute($data);
    }
}
?>