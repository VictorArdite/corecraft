<?php
require_once __DIR__ . '/../models/Rutina.php';

class RutinaController {
    private $model;

    public function __construct() {
        global $conn; // Asegúrate de que $conn esté disponible
        $this->model = new Rutina($conn);
    }

    public function index() {
        $this->listarRutinas();
    }

    public function listarRutinas() {
        $rutinas = $this->model->obtenerRutinas();
        require __DIR__ . '/../views/auth/rutinas.php';
    }

    public function verRutina($id) {
        $rutina = $this->model->obtenerRutinaPorId($id);
        require __DIR__ . '/../views/rutina_detalle.php';
    }
}
?>