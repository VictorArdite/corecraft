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
            'Rutina 5 días Powerlifting' => [
                1 => [ // Día 1: Sentadilla y piernas
                    ['ejercicio' => 'Sentadilla (Squat)', 'series' => 5, 'repeticiones' => 5, 'descanso' => '3:00'],
                    ['ejercicio' => 'Prensa de piernas', 'series' => 4, 'repeticiones' => 8, 'descanso' => '2:00'],
                    ['ejercicio' => 'Extensiones de cuadriceps', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Curl femoral', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Gemelos en máquina', 'series' => 4, 'repeticiones' => 12, 'descanso' => '1:00'],
                ],
                2 => [ // Día 2: Press de banca y pecho
                    ['ejercicio' => 'Press de banca', 'series' => 5, 'repeticiones' => 5, 'descanso' => '3:00'],
                    ['ejercicio' => 'Press inclinado con barra', 'series' => 4, 'repeticiones' => 8, 'descanso' => '2:00'],
                    ['ejercicio' => 'Aperturas con mancuernas', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Fondos en paralelas', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Extensiones de tríceps en polea', 'series' => 3, 'repeticiones' => 12, 'descanso' => '1:00'],
                ],
                3 => [ // Día 3: Peso muerto y espalda
                    ['ejercicio' => 'Peso muerto convencional', 'series' => 5, 'repeticiones' => 5, 'descanso' => '3:00'],
                    ['ejercicio' => 'Remo con barra', 'series' => 4, 'repeticiones' => 8, 'descanso' => '2:00'],
                    ['ejercicio' => 'Dominadas o jalón al pecho', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Hiperextensiones', 'series' => 3, 'repeticiones' => 12, 'descanso' => '1:30'],
                    ['ejercicio' => 'Encogimientos de hombros', 'series' => 4, 'repeticiones' => 12, 'descanso' => '1:00'],
                ],
                4 => [ // Día 4: Press militar y hombros
                    ['ejercicio' => 'Press militar', 'series' => 5, 'repeticiones' => 5, 'descanso' => '3:00'],
                    ['ejercicio' => 'Elevaciones laterales', 'series' => 4, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Face pulls', 'series' => 3, 'repeticiones' => 12, 'descanso' => '1:30'],
                    ['ejercicio' => 'Press Arnold', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Encogimientos con mancuernas', 'series' => 4, 'repeticiones' => 12, 'descanso' => '1:00'],
                ],
                5 => [ // Día 5: Accesorios y fortalecimiento
                    ['ejercicio' => 'Sentadilla frontal', 'series' => 4, 'repeticiones' => 6, 'descanso' => '2:30'],
                    ['ejercicio' => 'Pull-ups o dominadas', 'series' => 3, 'repeticiones' => 8, 'descanso' => '1:30'],
                    ['ejercicio' => 'Peso muerto rumano', 'series' => 3, 'repeticiones' => 8, 'descanso' => '2:00'],
                    ['ejercicio' => 'Curl de bíceps con barra', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                    ['ejercicio' => 'Fondos en paralelas', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Plancha abdominal', 'series' => 3, 'repeticiones' => '60 segundos', 'descanso' => '1:00'],
                ],
            ],
            'Rutina 4 días Powerlifting' => [
                1 => [ // Día 1: Sentadilla y piernas
                    ['ejercicio' => 'Sentadilla (Squat)', 'series' => 5, 'repeticiones' => 5, 'descanso' => '3:00'],
                    ['ejercicio' => 'Prensa de piernas', 'series' => 4, 'repeticiones' => 8, 'descanso' => '2:00'],
                    ['ejercicio' => 'Extensiones de cuadriceps', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Curl femoral', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Gemelos en máquina', 'series' => 4, 'repeticiones' => 12, 'descanso' => '1:00'],
                ],
                2 => [ // Día 2: Press de banca y pecho
                    ['ejercicio' => 'Press de banca', 'series' => 5, 'repeticiones' => 5, 'descanso' => '3:00'],
                    ['ejercicio' => 'Press inclinado con barra', 'series' => 4, 'repeticiones' => 8, 'descanso' => '2:00'],
                    ['ejercicio' => 'Aperturas con mancuernas', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Fondos en paralelas', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Extensiones de tríceps en polea', 'series' => 3, 'repeticiones' => 12, 'descanso' => '1:00'],
                ],
                3 => [ // Día 3: Peso muerto y espalda
                    ['ejercicio' => 'Peso muerto convencional', 'series' => 5, 'repeticiones' => 5, 'descanso' => '3:00'],
                    ['ejercicio' => 'Remo con barra', 'series' => 4, 'repeticiones' => 8, 'descanso' => '2:00'],
                    ['ejercicio' => 'Dominadas o jalón al pecho', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Hiperextensiones', 'series' => 3, 'repeticiones' => 12, 'descanso' => '1:30'],
                    ['ejercicio' => 'Encogimientos de hombros', 'series' => 4, 'repeticiones' => 12, 'descanso' => '1:00'],
                ],
                4 => [ // Día 4: Press militar y accesorios
                    ['ejercicio' => 'Press militar', 'series' => 5, 'repeticiones' => 5, 'descanso' => '3:00'],
                    ['ejercicio' => 'Elevaciones laterales', 'series' => 4, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Face pulls', 'series' => 3, 'repeticiones' => 12, 'descanso' => '1:30'],
                    ['ejercicio' => 'Curl de bíceps con barra', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                    ['ejercicio' => 'Plancha abdominal', 'series' => 3, 'repeticiones' => '60 segundos', 'descanso' => '1:00'],
                ],
            ],
            'Rutina Piernas 3 días' => [
                1 => [
                    ['ejercicio' => 'Sentadilla con barra', 'series' => 4, 'repeticiones' => 8, 'descanso' => '2:00'],
                    ['ejercicio' => 'Prensa de piernas', 'series' => 4, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Zancadas con mancuernas', 'series' => 3, 'repeticiones' => 12, 'descanso' => '1:30'],
                    ['ejercicio' => 'Extensión de cuádriceps', 'series' => 3, 'repeticiones' => 12, 'descanso' => '1:00'],
                    ['ejercicio' => 'Elevación de talones (gemelos)', 'series' => 4, 'repeticiones' => 15, 'descanso' => '1:00'],
                ],
                2 => [
                    ['ejercicio' => 'Peso muerto rumano', 'series' => 4, 'repeticiones' => 8, 'descanso' => '2:00'],
                    ['ejercicio' => 'Curl femoral acostado', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Hip thrust', 'series' => 4, 'repeticiones' => 12, 'descanso' => '1:30'],
                    ['ejercicio' => 'Aductor en máquina', 'series' => 3, 'repeticiones' => 12, 'descanso' => '1:00'],
                    ['ejercicio' => 'Elevación de talones sentado', 'series' => 4, 'repeticiones' => 15, 'descanso' => '1:00'],
                ],
                3 => [
                    ['ejercicio' => 'Sentadilla búlgara', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Peso muerto sumo', 'series' => 4, 'repeticiones' => 8, 'descanso' => '2:00'],
                    ['ejercicio' => 'Puente de glúteo con barra', 'series' => 4, 'repeticiones' => 12, 'descanso' => '1:30'],
                    ['ejercicio' => 'Paso lateral con banda', 'series' => 3, 'repeticiones' => 15, 'descanso' => '1:00'],
                    ['ejercicio' => 'Elevación de talones en prensa', 'series' => 4, 'repeticiones' => 15, 'descanso' => '1:00'],
                ],
            ],
            'Rutina 3 días para estetica' => [
                1 => [
                    ['ejercicio' => 'Jalón al pecho en máquina', 'series' => 3, 'repeticiones' => '6-8', 'descanso' => '1:30'],
                    ['ejercicio' => 'Remo bajo en polea', 'series' => 3, 'repeticiones' => '8-10', 'descanso' => '1:30'],
                    ['ejercicio' => 'Curl de bíceps en polea baja o máquina', 'series' => 3, 'repeticiones' => '8', 'descanso' => '1:00'],
                    ['ejercicio' => 'Prensa inclinada', 'series' => 3, 'repeticiones' => '8', 'descanso' => '1:30'],
                    ['ejercicio' => 'Extensiones de piernas en máquina', 'series' => 3, 'repeticiones' => '10', 'descanso' => '1:30'],
                    ['ejercicio' => 'Elevación de talones en prensa', 'series' => 2, 'repeticiones' => '12-15', 'descanso' => '1:00'],
                ],
                2 => [
                    ['ejercicio' => 'Press de hombro en máquina', 'series' => 3, 'repeticiones' => '6-8', 'descanso' => '1:30'],
                    ['ejercicio' => 'Elevaciones laterales en polea baja', 'series' => 2, 'repeticiones' => '10-12', 'descanso' => '1:00'],
                    ['ejercicio' => 'Tríceps en polea', 'series' => 3, 'repeticiones' => '8', 'descanso' => '1:00'],
                    ['ejercicio' => 'Hip Thrust con barra en multipower', 'series' => 3, 'repeticiones' => '8-10', 'descanso' => '1:30'],
                    ['ejercicio' => 'Peso muerto rumano con barra o mancuernas', 'series' => 3, 'repeticiones' => '8', 'descanso' => '1:30'],
                    ['ejercicio' => 'Abductores en máquina', 'series' => 2, 'repeticiones' => '12', 'descanso' => '1:00'],
                ],
                3 => [
                    ['ejercicio' => 'Peso muerto sumo en máquina Smith', 'series' => 3, 'repeticiones' => '8', 'descanso' => '1:30'],
                    ['ejercicio' => 'Remo en máquina Hammer Strength', 'series' => 3, 'repeticiones' => '8', 'descanso' => '1:30'],
                    ['ejercicio' => 'Press de hombro con mancuernas o en máquina', 'series' => 3, 'repeticiones' => '8', 'descanso' => '1:30'],
                    ['ejercicio' => 'Sentadilla en máquina Hack o multipower', 'series' => 3, 'repeticiones' => '8', 'descanso' => '1:30'],
                    ['ejercicio' => 'Zancadas en multipower con peso', 'series' => 3, 'repeticiones' => '8 (cada pierna)', 'descanso' => '1:30'],
                    ['ejercicio' => 'Crunch en máquina de abdominales', 'series' => 3, 'repeticiones' => '12', 'descanso' => '1:00'],
                ],
            ],
            'Rutina Estiramientos' => [
                1 => [ // Día 1: Estiramientos generales
                    ['ejercicio' => 'Estiramiento de cuello', 'series' => 3, 'repeticiones' => 15, 'descanso' => '1:00'],
                    ['ejercicio' => 'Estiramiento de hombros', 'series' => 3, 'repeticiones' => 20, 'descanso' => '1:00'],
                    ['ejercicio' => 'Estiramiento de brazos', 'series' => 3, 'repeticiones' => 20, 'descanso' => '1:00'],
                    ['ejercicio' => 'Estiramiento de muñecas', 'series' => 3, 'repeticiones' => 20, 'descanso' => '1:00'],
                    ['ejercicio' => 'Estiramiento de espalda baja', 'series' => 3, 'repeticiones' => 15, 'descanso' => '1:30'],
                ],
                2 => [ // Día 2: Estiramientos de piernas
                    ['ejercicio' => 'Estiramiento de cuádriceps', 'series' => 3, 'repeticiones' => 20, 'descanso' => '1:00'],
                    ['ejercicio' => 'Estiramiento de isquiotibiales', 'series' => 3, 'repeticiones' => 20, 'descanso' => '1:00'],
                    ['ejercicio' => 'Estiramiento de aductores', 'series' => 3, 'repeticiones' => 20, 'descanso' => '1:00'],
                    ['ejercicio' => 'Estiramiento de gemelos', 'series' => 3, 'repeticiones' => 20, 'descanso' => '1:00'],
                    ['ejercicio' => 'Estiramiento de glúteos', 'series' => 3, 'repeticiones' => 20, 'descanso' => '1:00'],
                ],
                3 => [ // Día 3: Estiramientos de cuerpo completo
                    ['ejercicio' => 'Estiramiento de todo el cuerpo (de pie)', 'series' => 3, 'repeticiones' => 15, 'descanso' => '1:30'],
                    ['ejercicio' => 'Estiramiento de espalda media', 'series' => 3, 'repeticiones' => 20, 'descanso' => '1:00'],
                    ['ejercicio' => 'Estiramiento de cadera y glúteos', 'series' => 3, 'repeticiones' => 20, 'descanso' => '1:00'],
                    ['ejercicio' => 'Estiramiento de pierna cruzada', 'series' => 3, 'repeticiones' => 20, 'descanso' => '1:00'],
                    ['ejercicio' => 'Estiramiento de piernas en el suelo', 'series' => 3, 'repeticiones' => 20, 'descanso' => '1:00'],
                ],
            ],
            'Rutina Movilidad Reducida' => [
                1 => [ // Día 1: Parte superior del cuerpo y movilidad
                    ['ejercicio' => 'Elevación de hombros en silla', 'series' => 3, 'repeticiones' => 12, 'descanso' => '1:00'],
                    ['ejercicio' => 'Rotación de muñeca', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                    ['ejercicio' => 'Flexión de codo con banda elástica', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Estiramiento de cuello (lado a lado)', 'series' => 2, 'repeticiones' => 10, 'descanso' => '1:00'],
                    ['ejercicio' => 'Extensión de espalda en silla', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:30'],
                    ['ejercicio' => 'Aperturas de pecho (con banda elástica)', 'series' => 3, 'repeticiones' => 12, 'descanso' => '1:00'],
                ],
                2 => [ // Día 2: Parte inferior del cuerpo y estiramientos
                    ['ejercicio' => 'Elevación de pierna sentado', 'series' => 3, 'repeticiones' => 12, 'descanso' => '1:30'],
                    ['ejercicio' => 'Extensión de rodilla (sentado)', 'series' => 3, 'repeticiones' => 12, 'descanso' => '1:30'],
                    ['ejercicio' => 'Flexión de tobillo (sentado)', 'series' => 3, 'repeticiones' => 15, 'descanso' => '1:00'],
                    ['ejercicio' => 'Estiramiento de gemelos (sentado)', 'series' => 2, 'repeticiones' => 10, 'descanso' => '1:00'],
                    ['ejercicio' => 'Abducción de cadera (sentado)', 'series' => 3, 'repeticiones' => 10, 'descanso' => '1:00'],
                    ['ejercicio' => 'Estiramiento de isquiotibiales (sentado)', 'series' => 2, 'repeticiones' => 10, 'descanso' => '1:00'],
                ],
            ],
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