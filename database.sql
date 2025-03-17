-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS corecraft;
USE corecraft;

-- Crear la tabla usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    edad INT,
    peso DECIMAL(5,2),
    altura DECIMAL(5,2),
    objetivo TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insertar un usuario de prueba
-- Contraseña: test123
INSERT INTO usuarios (nombre, email, password, edad, peso, altura, objetivo)
VALUES ('Usuario Test', 'test@test.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 25, 70.5, 175.0, 'Ganar músculo'); 