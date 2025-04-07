<?php
// app/controllers/DashboardController.php

class DashboardController {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
        
        require_once __DIR__ . '/../views/calculadora_nivel.php';
    }
}
?>