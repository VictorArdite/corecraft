<?php
// app/controllers/DashboardController.php

class DashboardController {
    public function index() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
        }
        require_once '../app/views/dashboard/index.php';
    }
}
?>