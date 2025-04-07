-- Tabla de rutinas personalizadas
CREATE TABLE IF NOT EXISTS rutinas_personalizadas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Tabla de ejercicios en rutinas personalizadas
CREATE TABLE IF NOT EXISTS ejercicios_rutina_personalizada (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rutina_id INT NOT NULL,
    ejercicio_id INT NOT NULL,
    series INT NOT NULL DEFAULT 3,
    repeticiones INT NOT NULL DEFAULT 12,
    FOREIGN KEY (rutina_id) REFERENCES rutinas_personalizadas(id) ON DELETE CASCADE,
    FOREIGN KEY (ejercicio_id) REFERENCES ejercicios(id) ON DELETE CASCADE
); 