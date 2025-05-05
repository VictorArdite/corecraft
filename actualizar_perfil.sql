ALTER TABLE usuarios
ADD COLUMN objetivo VARCHAR(50) DEFAULT 'mantenimiento',
ADD COLUMN peso_actual DECIMAL(5,2),
ADD COLUMN peso_objetivo DECIMAL(5,2),
ADD COLUMN altura DECIMAL(3,2),
ADD COLUMN fecha_nacimiento DATE,
ADD COLUMN genero ENUM('masculino', 'femenino', 'otro'),
ADD COLUMN nivel_actividad ENUM('sedentario', 'ligero', 'moderado', 'activo', 'muy_activo') DEFAULT 'moderado',
ADD COLUMN descripcion TEXT,
ADD COLUMN foto_perfil VARCHAR(255); 