<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Suplementación</title>
    <link rel="stylesheet" href="css/global.css"> <!-- Estilos globales -->
    <link rel="stylesheet" href="css/suplementacion.css"> <!-- Estilos específicos -->
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php?action=home">
                <img src="img/logo.jpg" alt="CoreCraft Logo"> 
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php?action=home">Inicio</a></li>
                <li><a href="index.php?action=rutinas">Rutinas</a></li>
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
            <div class="content-wrapper">
                <!-- Contenido principal (izquierda) -->
                <div class="main-content">
                    <section class="supplement-tips">
                        <h2>Consejos de Suplementación</h2>
                        <ul>
                            <li>
                                <strong>Consejo 1: Consulta a un profesional de la salud antes de comenzar cualquier suplementación.</strong><br>
                                Es importante asegurarse de que los suplementos sean seguros y adecuados para ti.
                            </li>
                            <li>
                                <strong>Consejo 2: Elige suplementos respaldados por evidencia científica.</strong><br>
                                Opta por suplementos con estudios científicos que respalden su eficacia y seguridad. Algunos recomendados son: proteína en polvo, creatina y cafeína. Evita productos con ingredientes no comprobados o etiquetas engañosas.
                            </li>
                            <li>
                                <strong>Consejo 3: Personaliza tu suplementación según tus objetivos y necesidades.</strong><br>
                                Considera tu tipo de entrenamiento, dieta actual y metas (ganar masa muscular, perder grasa, mejorar el rendimiento). Si es posible, consulta a un nutricionista o especialista para una guía personalizada.
                            </li>
                        </ul>
                    </section>

                    <!-- Sección de Proteína -->
                    <div class="supplement-section">
                        <h3>Proteína en Polvo</h3>
                        <img src="img/proteina.png" alt="Proteína en Polvo" class="supplement-img">
                        <p>
                            La <strong>proteína en polvo</strong> es uno de los suplementos más populares y utilizados en el mundo del fitness. Sus principales beneficios incluyen:
                        </p>
                        <ul>
                            <li>Ayuda a la <strong>recuperación muscular</strong> después del entrenamiento.</li>
                            <li>Contribuye al <strong>crecimiento y mantenimiento de la masa muscular</strong>.</li>
                            <li>Es una fuente conveniente de proteínas, especialmente para quienes no pueden obtener suficiente proteína de alimentos sólidos.</li>
                        </ul>
                        <p>
                            <strong>Recomendación:</strong> Consume entre 20-30 gramos de proteína en polvo después de tu entrenamiento para maximizar la síntesis de proteínas musculares.
                        </p>
                    </div>

                    <!-- Sección de Creatina -->
                    <div class="supplement-section">
                        <h3>Creatina</h3>
                        <img src="img/creatina.png" alt="Creatina" class="supplement-img">
                        <p>
                            La <strong>creatina</strong> es un suplemento ampliamente estudiado y respaldado por la ciencia. Sus principales beneficios son:
                        </p>
                        <ul>
                            <li>Aumenta la <strong>fuerza y el rendimiento</strong> en ejercicios de alta intensidad y corta duración.</li>
                            <li>Mejora la <strong>recuperación</strong> entre series y entrenamientos.</li>
                            <li>Puede ayudar a <strong>aumentar la masa muscular</strong> a largo plazo.</li>
                        </ul>
                        <p>
                            <strong>Recomendación:</strong> Toma 3-5 gramos de creatina monohidratada al día, preferiblemente después del entrenamiento o con una comida.
                        </p>
                    </div>

                    <!-- Sección de Cafeína -->
                    <div class="supplement-section">
                        <h3>Cafeína</h3>
                        <img src="img/cafeina.png" alt="Cafeína" class="supplement-img">
                        <p>
                            La <strong>cafeína</strong> es un estimulante natural que puede mejorar el rendimiento deportivo. Sus principales beneficios incluyen:
                        </p>
                        <ul>
                            <li>Mejora la <strong>concentración y el enfoque</strong> durante el entrenamiento.</li>
                            <li>Aumenta la <strong>resistencia</strong> y retrasa la fatiga.</li>
                            <li>Puede ayudar a <strong>quemar grasa</strong> al aumentar el metabolismo.</li>
                        </ul>
                        <p>
                            <strong>Recomendación:</strong> Consume 3-6 mg de cafeína por kilogramo de peso corporal aproximadamente 30-60 minutos antes del entrenamiento.
                        </p>
                    </div>
                </div>

                <!-- Calculadora de Calorías (derecha) -->
                <div class="calculator">
                    <h2>Calculadora de Calorías</h2>
                    <form id="calorieForm">
                        <label for="weight">Peso (kg):</label>
                        <input type="number" id="weight" name="weight" required>
                        
                        <label for="height">Altura (cm):</label>
                        <input type="text" id="height" name="height" required>
                        
                        <label for="age">Edad:</label>
                        <input type="number" id="age" name="age" required>
                        
                        <label for="gender">Género:</label>
                        <select id="gender" name="gender" required>
                            <option value="male">Hombre</option>
                            <option value="female">Mujer</option>
                        </select>
                        
                        <label for="activity">Nivel de actividad:</label>
                        <select id="activity" name="activity" required>
                            <option value="sedentary">Sedentario</option>
                            <option value="light">Ligero</option>
                            <option value="moderate">Moderado</option>
                            <option value="active">Activo</option>
                            <option value="very_active">Muy Activo</option>
                        </select>
                        
                        <button type="submit">Calcular</button>
                    </form>
                    <div class="result">
                        <!-- Aquí se mostrarán los resultados -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="js/calculator.js"></script> <!-- Ruta al archivo JS -->
</body>
</html>