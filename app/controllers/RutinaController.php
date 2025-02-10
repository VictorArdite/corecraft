<?php

class RutinaController {
    private $rutinas;

    public function __construct() {
        $this->rutinas = [
            'Rutina 2 días' => [
                1 => [
                    ['ejercicio' => 'Press inclinado', 'series' => 4, 'repeticiones' => 10, 'descanso' => '1:00'],
                    ['ejercicio' => 'Jaca o sentadilla', 'series' => 3, 'repeticiones' => 8, 'descanso' => '2:00'],
                    ['ejercicio' => 'Press maquina', 'series' => 3, 'repeticiones' => 8, 'descanso' => '1:30'],
                    ['ejercicio' => 'Extension cuadriceps', 'series' => 4, 'repeticiones' => 10, 'descanso' => '2:00'],
                    ['ejercicio' => 'Apertuda maquina', 'series' => 4, 'repeticiones' => 8, 'descanso' => '1:30'],
                    ['ejercicio' => 'Laterales Polea', 'series' => 4, 'repeticiones' => 8, 'descanso' => '1:00'],
                    ['ejercicio' => 'Press Francess', 'series' => 3, 'repeticiones' => 8, 'descanso' => '1:00'],
                ],
                2 => [
                    ['ejercicio' => 'Jalon abierto', 'series' => 4, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Curls sentado', 'series' => 3, 'repeticiones' => 8, 'descanso' => '1:30'],
                    ['ejercicio' => 'Remo gironda', 'series' => 3, 'repeticiones' => 8, 'descanso' => '1:00'],
                    ['ejercicio' => 'Curl tumbado', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Remo en T', 'series' => 2, 'repeticiones' => 6, 'descanso' => '2:00'],
                    ['ejercicio' => 'Curl bayersian', 'series' => 4, 'repeticiones' => 12, 'descanso' => '1:30'],
                    ['ejercicio' => 'Aduptor', 'series' => 2, 'repeticiones' => 12, 'descanso' => '1:00'],
                    ['ejercicio' => 'Gemelos', 'series' => 2, 'repeticiones' => 12, 'descanso' => '1:00'],
                ],
            ],
            'Rutina 3 días' => [
                1 => [
                    ['ejercicio' => 'Press inclinado', 'series' => 3, 'repeticiones' => 8, 'descanso' => '1:30'],
                    ['ejercicio' => 'Laterales con mancuerna', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                    ['ejercicio' => 'Press en maquina', 'series' => 2, 'repeticiones' => 8, 'descanso' => '1:30'],
                    ['ejercicio' => 'Laterales polea', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Aperturas pecho', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                    ['ejercicio' => 'Press frances', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                    ['ejercicio' => 'Extension triceps', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                ],
                2 => [
                    ['ejercicio' => 'Jalon abierto', 'series' => 3, 'repeticiones' => 8, 'descanso' => '1:30'],
                    ['ejercicio' => 'Remo gironda', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                    ['ejercicio' => 'Remon en T', 'series' => 2, 'repeticiones' => 8, 'descanso' => '1:30'],
                    ['ejercicio' => 'Jalon unilateral en polea', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Hombro posterior', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                    ['ejercicio' => 'Curl bayensian', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                    ['ejercicio' => 'Curl predicador', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                ],
                3 => [
                    ['ejercicio' => 'Jaca o sentadilla', 'series' => 2, 'repeticiones' => 8, 'descanso' => '2:30'],
                    ['ejercicio' => 'Curls femoral sentado', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Extension de cuadriceps', 'series' => 3, 'repeticiones' => 10, 'descanso' => '2:00'],
                    ['ejercicio' => 'Curl tumbado', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Aduptor', 'series' => 2, 'repeticiones' => 12, 'descanso' => '1:00'],
                    ['ejercicio' => 'Gemelos', 'series' => 2, 'repeticiones' => 12, 'descanso' => '1:00'],
                ],
            ],
            'Rutina 4 días' => [
                1 => [
                    ['ejercicio' => 'Press inclinado', 'series' => 3, 'repeticiones' => 8, 'descanso' => '1:30'],
                    ['ejercicio' => 'Laterales con mancuerna', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                    ['ejercicio' => 'Press en maquina', 'series' => 2, 'repeticiones' => 8, 'descanso' => '1:30'],
                    ['ejercicio' => 'Laterales polea', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Aperturas pecho', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                ],
                2 => [
                    ['ejercicio' => 'Jalon abierto', 'series' => 3, 'repeticiones' => 8, 'descanso' => '1:30'],
                    ['ejercicio' => 'Remo gironda', 'series' => 3, 'repeticiones' => 8, 'descanso' => '1:30'],
                    ['ejercicio' => 'Remon en T', 'series' => 2, 'repeticiones' => 8, 'descanso' => '2:00'],
                    ['ejercicio' => 'Jalon unilateral en polea', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Hombro posterior', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                ],
                3 => [
                    ['ejercicio' => 'Jaca o sentadilla', 'series' => 2, 'repeticiones' => 8, 'descanso' => '2:30'],
                    ['ejercicio' => 'Curls femoral sentado', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Extension de cuadriceps', 'series' => 3, 'repeticiones' => 10, 'descanso' => '2:00'],
                    ['ejercicio' => 'Curl tumbado', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Aduptor', 'series' => 2, 'repeticiones' => 12, 'descanso' => '1:00'],
                    ['ejercicio' => 'Gemelos', 'series' => 2, 'repeticiones' => 12, 'descanso' => '1:00'],
                ],
                4 => [
                    ['ejercicio' => 'Curl bayensia', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                    ['ejercicio' => 'Press frances', 'series' => 2, 'repeticiones' => 8, 'descanso' => '1:30'],
                    ['ejercicio' => 'Curl Martillo', 'series' => 2, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Extension triceps polea', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Curl predicador', 'series' => 2, 'repeticiones' => 8, 'descanso' => '1:00'],
                    ['ejercicio' => 'Press Katana', 'series' => 2, 'repeticiones' => 10, 'descanso' => '1:00'],
                ],
            ],
            'Rutina 5 días' => [
                1 => [
                    ['ejercicio' => 'Press inclinado', 'series' => 3, 'repeticiones' => 8, 'descanso' => '1:30'],
                    ['ejercicio' => 'Laterales con mancuerna', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                    ['ejercicio' => 'Press en maquina', 'series' => 2, 'repeticiones' => 8, 'descanso' => '1:30'],
                    ['ejercicio' => 'Laterales polea', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Aperturas pecho', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                ],
                2 => [
                    ['ejercicio' => 'Jalon abierto', 'series' => 3, 'repeticiones' => 8, 'descanso' => '1:30'],
                    ['ejercicio' => 'Remo gironda', 'series' => 3, 'repeticiones' => 8, 'descanso' => '1:30'],
                    ['ejercicio' => 'Remon en T', 'series' => 2, 'repeticiones' => 8, 'descanso' => '2:00'],
                    ['ejercicio' => 'Jalon unilateral en polea', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Hombro posterior', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                ],
                3 => [
                    ['ejercicio' => 'Jaca o sentadilla', 'series' => 2, 'repeticiones' => 8, 'descanso' => '2:30'],
                    ['ejercicio' => 'Curls femoral sentado', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Extension de cuadriceps', 'series' => 3, 'repeticiones' => 10, 'descanso' => '2:00'],
                    ['ejercicio' => 'Curl tumbado', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Aduptor', 'series' => 2, 'repeticiones' => 12, 'descanso' => '1:00'],
                    ['ejercicio' => 'Gemelos', 'series' => 2, 'repeticiones' => 12, 'descanso' => '1:00'],
                ],
                4 => [
                    ['ejercicio' => 'Curl bayensia', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                    ['ejercicio' => 'Press frances', 'series' => 2, 'repeticiones' => 8, 'descanso' => '1:30'],
                    ['ejercicio' => 'Curl Martillo', 'series' => 2, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Extension triceps polea', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Curl predicador', 'series' => 2, 'repeticiones' => 8, 'descanso' => '1:00'],
                    ['ejercicio' => 'Press Katana', 'series' => 2, 'repeticiones' => 10, 'descanso' => '1:00'],
                ],
                5 => [
                    ['ejercicio' => 'Press inclinado', 'series' => 3, 'repeticiones' => 8, 'descanso' => '1:30'],
                    ['ejercicio' => 'Jalon abierto', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                    ['ejercicio' => 'Remo gironda', 'series' => 2, 'repeticiones' => 8, 'descanso' => '1:30'],
                    ['ejercicio' => 'Curl bayensia', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Extension triceps polea', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                ],
            ],
            // Define otras rutinas aquí
        ];
    }

    public function index() {
        $rutinas = array_keys($this->rutinas);
        require __DIR__ . '/../views/auth/rutinas.php';
    }

    public function verRutinaPorNombre($nombre) {
        $rutina = $this->rutinas[$nombre] ?? null;
        require __DIR__ . '/../views/rutina_detalle.php';
    }
}
?>