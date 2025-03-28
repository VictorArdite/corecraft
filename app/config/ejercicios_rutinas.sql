-- Primero eliminamos los ejercicios existentes para evitar duplicados
DELETE FROM ejercicios;

-- Ejercicios de Pecho
INSERT INTO ejercicios (nombre, descripcion, grupo_muscular, dificultad, instrucciones) VALUES
('Press inclinado', 'Ejercicio para la parte superior del pecho', 'Pecho', 'Intermedio', 'Acuéstate en el banco inclinado y empuja la barra hacia arriba'),
('Press en máquina', 'Ejercicio guiado para el pecho', 'Pecho', 'Principiante', 'Siéntate en la máquina y empuja las palancas hacia adelante'),
('Aperturas pecho', 'Ejercicio de aislamiento para el pecho', 'Pecho', 'Principiante', 'Acuéstate en el banco y abre los brazos con las mancuernas'),
('Press Katana', 'Variación del press de banca con agarre especial', 'Pecho', 'Intermedio', 'Realiza el press de banca con un agarre más cerrado');

-- Ejercicios de Espalda
INSERT INTO ejercicios (nombre, descripcion, grupo_muscular, dificultad, instrucciones) VALUES
('Jalón abierto', 'Ejercicio fundamental para la espalda', 'Espalda', 'Intermedio', 'Tira de la barra hacia el pecho con un agarre amplio'),
('Remo gironda', 'Ejercicio para la espalda media', 'Espalda', 'Intermedio', 'Inclínate y tira de la barra hacia el abdomen'),
('Remo en T', 'Ejercicio para la espalda baja', 'Espalda', 'Avanzado', 'Inclínate y tira de la barra en T hacia el abdomen'),
('Jalón unilateral en polea', 'Ejercicio de aislamiento para la espalda', 'Espalda', 'Intermedio', 'Realiza el jalón con un solo brazo');

-- Ejercicios de Piernas
INSERT INTO ejercicios (nombre, descripcion, grupo_muscular, dificultad, instrucciones) VALUES
('Jaca o sentadilla', 'Ejercicio fundamental para las piernas', 'Piernas', 'Avanzado', 'Realiza sentadillas con peso libre o en máquina'),
('Extension cuadriceps', 'Ejercicio de aislamiento para los cuádriceps', 'Piernas', 'Principiante', 'Siéntate en la máquina y extiende las piernas'),
('Curls femoral sentado', 'Ejercicio para los isquiotibiales', 'Piernas', 'Intermedio', 'Siéntate en la máquina y flexiona las piernas'),
('Curl tumbado', 'Variación del curl femoral', 'Piernas', 'Intermedio', 'Acuéstate boca abajo y flexiona las piernas'),
('Aduptor', 'Ejercicio para los músculos aductores', 'Piernas', 'Principiante', 'Siéntate en la máquina y junta las piernas'),
('Gemelos', 'Ejercicio para las pantorrillas', 'Piernas', 'Principiante', 'De pie, eleva los talones del suelo');

-- Ejercicios de Hombros
INSERT INTO ejercicios (nombre, descripcion, grupo_muscular, dificultad, instrucciones) VALUES
('Laterales con mancuerna', 'Ejercicio para los deltoides laterales', 'Hombros', 'Principiante', 'De pie, eleva las mancuernas hasta la altura de los hombros'),
('Laterales polea', 'Variación de laterales con polea', 'Hombros', 'Principiante', 'De pie, eleva el brazo con la polea hasta la altura del hombro'),
('Hombro posterior', 'Ejercicio para la parte posterior del hombro', 'Hombros', 'Intermedio', 'Inclínate y eleva los brazos hacia atrás');

-- Ejercicios de Bíceps
INSERT INTO ejercicios (nombre, descripcion, grupo_muscular, dificultad, instrucciones) VALUES
('Curl bayensia', 'Ejercicio para bíceps con rotación', 'Bíceps', 'Intermedio', 'De pie, flexiona los brazos con rotación de muñeca'),
('Curl predicador', 'Ejercicio de aislamiento para bíceps', 'Bíceps', 'Intermedio', 'Apoya los brazos en el banco predicador y realiza el curl'),
('Curl Martillo', 'Variación del curl con mancuernas', 'Bíceps', 'Principiante', 'Realiza el curl con las palmas de las manos enfrentadas');

-- Ejercicios de Tríceps
INSERT INTO ejercicios (nombre, descripcion, grupo_muscular, dificultad, instrucciones) VALUES
('Press frances', 'Ejercicio fundamental para tríceps', 'Tríceps', 'Intermedio', 'Acostado, baja la barra detrás de la cabeza'),
('Extension triceps', 'Ejercicio de aislamiento para tríceps', 'Tríceps', 'Principiante', 'De pie, extiende los brazos por encima de la cabeza'),
('Extension triceps polea', 'Variación de extensiones con polea', 'Tríceps', 'Intermedio', 'De pie, extiende los brazos con la polea'); 