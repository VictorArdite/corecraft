DROP TABLE IF EXISTS entrenamientos;
CREATE TABLE entrenamientos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    rutina VARCHAR(255) NOT NULL,
    fecha DATETIME NOT NULL,
    peso DECIMAL(5,2) DEFAULT NULL,
    repeticiones INT DEFAULT 0,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- Tabla de logros disponibles
CREATE TABLE IF NOT EXISTS logros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    requisito VARCHAR(50) NOT NULL UNIQUE,
    puntos INT NOT NULL DEFAULT 0,
    icono VARCHAR(255) DEFAULT 'default.png',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de logros obtenidos por usuarios
CREATE TABLE IF NOT EXISTS usuario_logros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    logro_id INT NOT NULL,
    fecha_obtencion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (logro_id) REFERENCES logros(id) ON DELETE CASCADE,
    UNIQUE KEY unique_usuario_logro (usuario_id, logro_id)
);

-- Insertar logros predefinidos
INSERT INTO logros (nombre, descripcion, requisito, puntos, icono) VALUES
('Primer Entrenamiento', 'Completa tu primera rutina de entrenamiento', 'completar_primer_entrenamiento', 10, 'primer_entrenamiento.png'),
('Peso Objetivo', 'Alcanza tu peso objetivo', 'alcanzar_peso_objetivo', 100, 'peso_objetivo.png'),
('Rutina Streak', 'Completa 7 días seguidos de entrenamiento', 'streak_7_dias', 50, 'streak.png'),
('Peso Registrado', 'Registra tu primer peso', 'registrar_primer_peso', 5, 'peso_registrado.png'),
('Rutina Personalizada', 'Crea tu primera rutina personalizada', 'crear_rutina_personalizada', 20, 'rutina_personalizada.png'),
('Entrenamiento Intenso', 'Completa una rutina de alta intensidad', 'rutina_alta_intensidad', 30, 'intenso.png'),
('Peso Perdido', 'Pierde 5 kg desde tu peso inicial', 'perder_5kg', 75, 'peso_perdido.png'),
('Entrenamiento Social', 'Comparte una rutina con otro usuario', 'compartir_rutina', 15, 'social.png'); 