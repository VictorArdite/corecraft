<?php require_once __DIR__ . '/../../public/config/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Nivel de Entrenamiento - CoreCraft</title>
    <link rel="stylesheet" href="/corecraft/public/css/global.css">
    <link rel="stylesheet" href="/corecraft/public/css/calculadora_nivel.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php?action=home">
                <img src="/corecraft/public/img/logo.jpg" alt="CoreCraft Logo">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php?action=home">Inicio</a></li>
                <li><a href="index.php?action=rutinas">Rutinas</a></li>
                <li><a href="index.php?action=consultaEjercicios">Ejercicios</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="index.php?action=registro-peso">Registro de Pesos</a></li>
                <?php endif; ?>
                <li><a href="index.php?action=mis-rutinas">Mis Rutinas</a></li>
                <li><a href="index.php?action=calculadora-nivel">Calculadora de Nivel</a></li>
                <li><a href="index.php?action=suplementacion">Suplementación</a></li>
                <li><a href="index.php?action=perfil">Perfil</a></li>
            </ul>
            <?php if (!isset($_SESSION['user_id'])): ?>
            <div class="auth-buttons">
                <a href="index.php?action=login" class="auth-button">Iniciar Sesión</a>
                <a href="index.php?action=register" class="auth-button">Registrarse</a>
            </div>
            <?php else: ?>
            <div class="auth-buttons">
                <a href="index.php?action=logout" class="auth-button">Cerrar Sesión</a>
            </div>
            <?php endif; ?>
        </nav>
    </header>

    <main>
        <div class="container">
            <h1>Calculadora de Nivel de Entrenamiento</h1>
            <p class="subtitle">Evalúa tu nivel de entrenamiento con esta calculadora automática</p>

            <form id="calculadoraForm" class="calculadora-form">
                <div class="form-group">
                    <label for="sexo">Tu sexo</label>
                    <select id="sexo" name="sexo" required>
                        <option value="">Selecciona tu sexo</option>
                        <option value="hombre">Hombre</option>
                        <option value="mujer">Mujer</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="peso">Tu peso (kg)</label>
                    <input type="number" id="peso" name="peso" step="0.1" required>
                </div>

                <div class="form-group">
                    <label for="experiencia">¿Cuántos años llevas entrenando?</label>
                    <select id="experiencia" name="experiencia" required>
                        <option value="">Selecciona una opción</option>
                        <option value="1">Menos de 1 año</option>
                        <option value="2">Entre 1 y 3 años</option>
                        <option value="3">Entre 3 y 8 años</option>
                        <option value="4">Más de 8 años</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dominadas">1RM en dominadas (sumando lastre + tu peso corporal) (kg)</label>
                    <input type="number" id="dominadas" name="dominadas" step="0.1" required>
                </div>

                <div class="form-group">
                    <label for="press_banca">1RM press banca (kg)</label>
                    <input type="number" id="press_banca" name="press_banca" step="0.1" required>
                </div>

                <div class="form-group">
                    <label for="sentadillas">1RM en sentadillas (kg)</label>
                    <input type="number" id="sentadillas" name="sentadillas" step="0.1" required>
                </div>

                <div class="form-group">
                    <label for="peso_muerto">1RM en peso muerto (kg)</label>
                    <input type="number" id="peso_muerto" name="peso_muerto" step="0.1" required>
                </div>

                <div class="form-group">
                    <label for="tecnica">¿Cómo dirías que es tu ejecución técnica en la mayoría de ejercicios?</label>
                    <select id="tecnica" name="tecnica" required>
                        <option value="">Selecciona una opción</option>
                        <option value="1">Pobre</option>
                        <option value="2">Buena</option>
                        <option value="3">Muy buena</option>
                        <option value="4">Excelente</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="progreso">¿Cada cuánto tiempo mejoras alrededor de un 3-5% tu masa muscular y/o tu fuerza?</label>
                    <select id="progreso" name="progreso" required>
                        <option value="">Selecciona una opción</option>
                        <option value="4">Prácticamente cada semana</option>
                        <option value="3">Cada 2 – 4 semanas</option>
                        <option value="2">Cada 4 – 8 semanas</option>
                        <option value="1">Cada 8 – 12 semanas</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="formacion">Nivel de formación y conocimientos en el mundo del entrenamiento</label>
                    <select id="formacion" name="formacion" required>
                        <option value="">Selecciona una opción</option>
                        <option value="1">No tengo ninguna formación sobre entrenamiento</option>
                        <option value="2">Tengo alguna formación sobre entrenamiento. Me interesa un poco este mundo</option>
                        <option value="3">Tengo bastante formación sobre entrenamiento y me actualizo con frecuencia</option>
                        <option value="4">Tengo estudios superiores sobre entrenamiento y estoy siempre actualizado</option>
                    </select>
                </div>

                <button type="submit" class="btn-calcular">Calcular mi nivel</button>
            </form>

            <div id="resultado" class="resultado-container" style="display: none;">
                <h2>Tu nivel es: <span id="nivel-resultado"></span></h2>
                <div class="nivel-descripcion">
                    <p id="descripcion-nivel"></p>
                </div>
            </div>

            <div class="info-adicional">
                <h3>A tener en cuenta:</h3>
                <ul>
                    <li>Se tienen en cuenta diversos factores como los años de entrenamiento, la fuerza relativa en ejercicios básicos, la calidad técnica, la frecuencia de progreso y los conocimientos en entrenamiento.</li>
                    <li>Cada uno de estos factores se puntúa del 1 al 4, y la suma total de puntos determina el nivel de entrenamiento: principiante, intermedio, avanzado o experto.</li>
                    <li>La consideración de múltiples variables, más allá de sólo los años de experiencia, permite una evaluación mucho más precisa y realista del nivel de entrenamiento de cada usuario.</li>
                </ul>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('calculadoraForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Obtener todos los valores
            const sexo = document.getElementById('sexo').value;
            const peso = parseFloat(document.getElementById('peso').value);
            const experiencia = parseInt(document.getElementById('experiencia').value);
            const dominadas = parseFloat(document.getElementById('dominadas').value);
            const pressBanca = parseFloat(document.getElementById('press_banca').value);
            const sentadillas = parseFloat(document.getElementById('sentadillas').value);
            const pesoMuerto = parseFloat(document.getElementById('peso_muerto').value);
            const tecnica = parseInt(document.getElementById('tecnica').value);
            const progreso = parseInt(document.getElementById('progreso').value);
            const formacion = parseInt(document.getElementById('formacion').value);

            // Calcular fuerza relativa
            const fuerzaRelativa = {
                dominadas: dominadas / peso,
                pressBanca: pressBanca / peso,
                sentadillas: sentadillas / peso,
                pesoMuerto: pesoMuerto / peso
            };

            // Calcular puntos de fuerza relativa
            let puntosFuerza = 0;
            if (sexo === 'hombre') {
                if (fuerzaRelativa.dominadas >= 1.5) puntosFuerza += 4;
                else if (fuerzaRelativa.dominadas >= 1.2) puntosFuerza += 3;
                else if (fuerzaRelativa.dominadas >= 1) puntosFuerza += 2;
                else puntosFuerza += 1;

                if (fuerzaRelativa.pressBanca >= 1.5) puntosFuerza += 4;
                else if (fuerzaRelativa.pressBanca >= 1.2) puntosFuerza += 3;
                else if (fuerzaRelativa.pressBanca >= 1) puntosFuerza += 2;
                else puntosFuerza += 1;

                if (fuerzaRelativa.sentadillas >= 2) puntosFuerza += 4;
                else if (fuerzaRelativa.sentadillas >= 1.5) puntosFuerza += 3;
                else if (fuerzaRelativa.sentadillas >= 1.2) puntosFuerza += 2;
                else puntosFuerza += 1;

                if (fuerzaRelativa.pesoMuerto >= 2.5) puntosFuerza += 4;
                else if (fuerzaRelativa.pesoMuerto >= 2) puntosFuerza += 3;
                else if (fuerzaRelativa.pesoMuerto >= 1.5) puntosFuerza += 2;
                else puntosFuerza += 1;
            } else {
                if (fuerzaRelativa.dominadas >= 1.2) puntosFuerza += 4;
                else if (fuerzaRelativa.dominadas >= 1) puntosFuerza += 3;
                else if (fuerzaRelativa.dominadas >= 0.8) puntosFuerza += 2;
                else puntosFuerza += 1;

                if (fuerzaRelativa.pressBanca >= 1.2) puntosFuerza += 4;
                else if (fuerzaRelativa.pressBanca >= 1) puntosFuerza += 3;
                else if (fuerzaRelativa.pressBanca >= 0.8) puntosFuerza += 2;
                else puntosFuerza += 1;

                if (fuerzaRelativa.sentadillas >= 1.5) puntosFuerza += 4;
                else if (fuerzaRelativa.sentadillas >= 1.2) puntosFuerza += 3;
                else if (fuerzaRelativa.sentadillas >= 1) puntosFuerza += 2;
                else puntosFuerza += 1;

                if (fuerzaRelativa.pesoMuerto >= 2) puntosFuerza += 4;
                else if (fuerzaRelativa.pesoMuerto >= 1.5) puntosFuerza += 3;
                else if (fuerzaRelativa.pesoMuerto >= 1.2) puntosFuerza += 2;
                else puntosFuerza += 1;
            }

            // Calcular total de puntos
            const totalPuntos = experiencia + puntosFuerza + tecnica + progreso + formacion;

            // Determinar nivel
            let nivel, descripcion;
            if (totalPuntos <= 12) {
                nivel = "Principiante";
                descripcion = "Estás en la fase inicial de tu entrenamiento. Enfócate en aprender la técnica correcta de los ejercicios y establecer una base sólida. Los progresos serán rápidos y notables.";
            } else if (totalPuntos <= 20) {
                nivel = "Intermedio";
                descripcion = "Ya tienes una buena base y conoces los fundamentos del entrenamiento. Es momento de empezar a periodizar tu entrenamiento y enfocarte en objetivos específicos.";
            } else if (totalPuntos <= 28) {
                nivel = "Avanzado";
                descripcion = "Tienes una gran experiencia y conocimientos. Los progresos son más lentos pero más significativos. Es importante mantener la motivación y seguir aprendiendo.";
            } else {
                nivel = "Experto";
                descripcion = "Eres un experto en el mundo del entrenamiento. Tus conocimientos y experiencia te permiten optimizar cada aspecto de tu entrenamiento. El progreso es más lento pero más refinado.";
            }

            // Mostrar resultado
            document.getElementById('nivel-resultado').textContent = nivel;
            document.getElementById('descripcion-nivel').textContent = descripcion;
            document.getElementById('resultado').style.display = 'block';
        });
    </script>
</body>
</html> 