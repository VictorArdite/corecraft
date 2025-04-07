-- Añadir columnas de preguntas de seguridad si no existen
ALTER TABLE usuarios
ADD COLUMN IF NOT EXISTS pregunta_seguridad VARCHAR(255),
ADD COLUMN IF NOT EXISTS respuesta_seguridad VARCHAR(255);

-- Actualizar la tabla password_resets
DROP TABLE IF EXISTS password_resets;
CREATE TABLE password_resets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    token VARCHAR(64) NOT NULL,
    expires_at DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
); 