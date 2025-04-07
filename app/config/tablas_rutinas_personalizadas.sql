-- Primero creamos la tabla de ejercicios
CREATE TABLE IF NOT EXISTS ejercicios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    grupo_muscular VARCHAR(100),
    dificultad ENUM('principiante', 'intermedio', 'avanzado') DEFAULT 'intermedio',
    instrucciones TEXT,
    imagen_url VARCHAR(255),
    video_url VARCHAR(255),
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertamos algunos ejercicios básicos
INSERT INTO ejercicios (nombre, descripcion, grupo_muscular, dificultad, instrucciones) VALUES
('Press de Banca', 'Ejercicio básico para el desarrollo del pecho', 'Pecho', 'intermedio', 'Acuéstate en el banco, baja la barra hasta el pecho y empuja hacia arriba'),
('Sentadillas', 'Ejercicio fundamental para las piernas', 'Piernas', 'principiante', 'Ponte de pie, flexiona las rodillas y baja el cuerpo'),
('Dominadas', 'Ejercicio para espalda y brazos', 'Espalda', 'avanzado', 'Cuelga de la barra y tira hacia arriba hasta que el mentón pase la barra'),
('Curl de Bíceps', 'Ejercicio para bíceps', 'Brazos', 'principiante', 'De pie, flexiona los brazos llevando el peso hacia los hombros'),
('Extensiones de Tríceps', 'Ejercicio para tríceps', 'Brazos', 'intermedio', 'Extiende los brazos por encima de la cabeza con el peso');

-- Luego creamos la tabla de ejercicios en rutinas personalizadas
CREATE TABLE IF NOT EXISTS ejercicios_rutina_personalizada (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rutina_id INT NOT NULL,
    ejercicio_id INT NOT NULL,
    series INT NOT NULL DEFAULT 3,
    repeticiones INT NOT NULL DEFAULT 12,
    FOREIGN KEY (rutina_id) REFERENCES rutinas_personalizadas(id) ON DELETE CASCADE,
    FOREIGN KEY (ejercicio_id) REFERENCES ejercicios(id) ON DELETE CASCADE
); 