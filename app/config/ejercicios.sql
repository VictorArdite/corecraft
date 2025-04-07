-- Tabla de ejercicios disponibles
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

-- Insertar algunos ejercicios básicos
INSERT INTO ejercicios (nombre, descripcion, grupo_muscular, dificultad, instrucciones) VALUES
('Press de Banca', 'Ejercicio básico para el desarrollo del pecho', 'Pecho', 'intermedio', 'Acuéstate en el banco, baja la barra hasta el pecho y empuja hacia arriba'),
('Sentadillas', 'Ejercicio fundamental para las piernas', 'Piernas', 'principiante', 'Ponte de pie, flexiona las rodillas y baja el cuerpo'),
('Dominadas', 'Ejercicio para espalda y brazos', 'Espalda', 'avanzado', 'Cuelga de la barra y tira hacia arriba hasta que el mentón pase la barra'),
('Curl de Bíceps', 'Ejercicio para bíceps', 'Brazos', 'principiante', 'De pie, flexiona los brazos llevando el peso hacia los hombros'),
('Extensiones de Tríceps', 'Ejercicio para tríceps', 'Brazos', 'intermedio', 'Extiende los brazos por encima de la cabeza con el peso');

-- Ejercicios para Pecho
INSERT INTO ejercicios (nombre, descripcion, grupo_muscular, dificultad, instrucciones) VALUES
('Press de Banca', 'Ejercicio fundamental para el desarrollo del pecho', 'Pecho', 'Intermedio', 'Acuéstate en el banco, baja la barra hasta el pecho y empuja hacia arriba'),
('Press de Banca Inclinado', 'Variación del press de banca que enfatiza la parte superior del pecho', 'Pecho', 'Intermedio', 'Ajusta el banco a 30-45 grados y realiza el movimiento'),
('Aperturas con Mancuernas', 'Ejercicio de aislamiento para el pecho', 'Pecho', 'Principiante', 'Acuéstate en el banco y abre los brazos con las mancuernas'),
('Flexiones', 'Ejercicio básico para el pecho que no requiere equipamiento', 'Pecho', 'Principiante', 'Mantén el cuerpo recto y baja hasta que el pecho casi toque el suelo');

-- Ejercicios para Espalda
INSERT INTO ejercicios (nombre, descripcion, grupo_muscular, dificultad, instrucciones) VALUES
('Dominadas', 'Ejercicio fundamental para la espalda', 'Espalda', 'Avanzado', 'Cuelga de la barra y tira hacia arriba hasta que el mentón pase la barra'),
('Remo con Barra', 'Ejercicio compuesto para la espalda', 'Espalda', 'Intermedio', 'Inclínate hacia adelante y tira de la barra hacia el abdomen'),
('Peso Muerto', 'Ejercicio fundamental para espalda y piernas', 'Espalda', 'Avanzado', 'Mantén la espalda recta y levanta la barra desde el suelo'),
('Pull-ups', 'Variación de las dominadas con agarre más amplio', 'Espalda', 'Avanzado', 'Similar a las dominadas pero con un agarre más amplio');

-- Ejercicios para Piernas
INSERT INTO ejercicios (nombre, descripcion, grupo_muscular, dificultad, instrucciones) VALUES
('Sentadillas', 'Ejercicio fundamental para las piernas', 'Piernas', 'Intermedio', 'Mantén la espalda recta y baja hasta que los muslos estén paralelos al suelo'),
('Prensa de Piernas', 'Ejercicio de máquina para las piernas', 'Piernas', 'Principiante', 'Siéntate en la máquina y empuja el peso con las piernas'),
('Zancadas', 'Ejercicio para piernas que también trabaja el equilibrio', 'Piernas', 'Intermedio', 'Da un paso adelante y baja la rodilla trasera'),
('Extensiones de Cuádriceps', 'Ejercicio de aislamiento para los cuádriceps', 'Piernas', 'Principiante', 'Siéntate en la máquina y extiende las piernas');

-- Ejercicios para Hombros
INSERT INTO ejercicios (nombre, descripcion, grupo_muscular, dificultad, instrucciones) VALUES
('Press Militar', 'Ejercicio fundamental para los hombros', 'Hombros', 'Intermedio', 'De pie, empuja la barra por encima de la cabeza'),
('Elevaciones Laterales', 'Ejercicio de aislamiento para los hombros', 'Hombros', 'Principiante', 'De pie, eleva las mancuernas hasta la altura de los hombros'),
('Press Arnold', 'Variación del press militar con rotación', 'Hombros', 'Intermedio', 'Empieza con las mancuernas frente a ti y rota mientras subes');

-- Ejercicios para Bíceps
INSERT INTO ejercicios (nombre, descripcion, grupo_muscular, dificultad, instrucciones) VALUES
('Curl de Bíceps con Barra', 'Ejercicio fundamental para los bíceps', 'Bíceps', 'Principiante', 'De pie, flexiona los brazos levantando la barra'),
('Curl de Bíceps con Mancuernas', 'Variación del curl con barra', 'Bíceps', 'Principiante', 'Alterna el movimiento con cada brazo'),
('Curl de Bíceps en Banco Scott', 'Ejercicio de aislamiento para los bíceps', 'Bíceps', 'Intermedio', 'Apoya los brazos en el banco y realiza el curl');

-- Ejercicios para Tríceps
INSERT INTO ejercicios (nombre, descripcion, grupo_muscular, dificultad, instrucciones) VALUES
('Extensiones de Tríceps', 'Ejercicio fundamental para los tríceps', 'Tríceps', 'Principiante', 'Extiende los brazos por encima de la cabeza'),
('Fondos en Paralelas', 'Ejercicio compuesto para tríceps y pecho', 'Tríceps', 'Avanzado', 'Baja el cuerpo entre las barras paralelas'),
('Press Francés', 'Ejercicio de aislamiento para los tríceps', 'Tríceps', 'Intermedio', 'Acostado, baja la barra detrás de la cabeza');

-- Ejercicios para Abdomen
INSERT INTO ejercicios (nombre, descripcion, grupo_muscular, dificultad, instrucciones) VALUES
('Crunches', 'Ejercicio básico para el abdomen', 'Abdomen', 'Principiante', 'Acostado, eleva el torso hacia las rodillas'),
('Plancha', 'Ejercicio isométrico para el core', 'Abdomen', 'Intermedio', 'Mantén el cuerpo recto apoyado en antebrazos y puntas de pies'),
('Elevación de Piernas', 'Ejercicio para la parte inferior del abdomen', 'Abdomen', 'Intermedio', 'Acostado, eleva las piernas rectas hacia arriba');

-- Ejercicios para Pantorrillas
INSERT INTO ejercicios (nombre, descripcion, grupo_muscular, dificultad, instrucciones) VALUES
('Elevación de Talones', 'Ejercicio fundamental para las pantorrillas', 'Pantorrillas', 'Principiante', 'De pie, eleva los talones del suelo'),
('Elevación de Talones Sentado', 'Variación del ejercicio para pantorrillas', 'Pantorrillas', 'Principiante', 'Sentado, eleva los talones usando una máquina'); 