<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Dietas</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/dietas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                <li><a href="index.php?action=calendario">Calendario</a></li>
                <li><a href="index.php?action=rutinas">Rutinas</a></li>
                <li><a href="index.php?action=consultaEjercicios">Ejercicios</a></li>
                <li><a href="index.php?action=dietas">Dietas</a></li>
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
        <div class="diet-container">
            <!--<h1 class="text-center mb-4">Planes de Alimentación</h1>-->
            
            <div class="diet-type-selector">
                <button class="diet-type-button active" onclick="showDiet('perdida-grasa')">Pérdida de Grasa</button>
                <button class="diet-type-button" onclick="showDiet('ganancia-muscular')">Ganancia Muscular</button>
            </div>

            <!-- Plan de Pérdida de Grasa -->
            <div id="perdida-grasa" class="diet-plan">
                <div class="macros-info">
                    <h4>Macronutrientes Diarios</h4>
                    <div class="macros-grid">
                        <div class="macro-item">
                            <h5>Proteínas</h5>
                            <p>1.6g - 2g por kg</p>
                        </div>
                        <div class="macro-item">
                            <h5>Carbohidratos</h5>
                            <p>2g - 3g por kg</p>
                        </div>
                        <div class="macro-item">
                            <h5>Grasas</h5>
                            <p>0.5g - 0.8g por kg</p>
                        </div>
                    </div>
                </div>

                <div class="meal-plan">
                    <h3>Desayuno (7:00 AM)</h3>
                    <div class="meal-item">
                        <span class="meal-time">Desayuno</span>
                        <span class="meal-description">Avena con claras de huevo y frutas</span>
                        <span class="meal-calories">350 kcal</span>
                    </div>
                </div>

                <div class="meal-plan">
                    <h3>Media Mañana (10:00 AM)</h3>
                    <div class="meal-item">
                        <span class="meal-time">Snack</span>
                        <span class="meal-description">Yogur griego con nueces</span>
                        <span class="meal-calories">200 kcal</span>
                    </div>
                </div>

                <div class="meal-plan">
                    <h3>Almuerzo (1:00 PM)</h3>
                    <div class="meal-item">
                        <span class="meal-time">Almuerzo</span>
                        <span class="meal-description">Pechuga de pollo a la plancha con ensalada y arroz integral</span>
                        <span class="meal-calories">450 kcal</span>
                    </div>
                </div>

                <div class="meal-plan">
                    <h3>Merienda (4:00 PM)</h3>
                    <div class="meal-item">
                        <span class="meal-time">Merienda</span>
                        <span class="meal-description">Batido de proteína con frutas</span>
                        <span class="meal-calories">250 kcal</span>
                    </div>
                </div>

                <div class="meal-plan">
                    <h3>Cena (7:00 PM)</h3>
                    <div class="meal-item">
                        <span class="meal-time">Cena</span>
                        <span class="meal-description">Pescado blanco con verduras al vapor</span>
                        <span class="meal-calories">350 kcal</span>
                    </div>
                </div>
            </div>

            <!-- Plan de Ganancia Muscular -->
            <div id="ganancia-muscular" class="diet-plan" style="display: none;">
                <div class="macros-info">
                    <h4>Macronutrientes Diarios</h4>
                    <div class="macros-grid">
                        <div class="macro-item">
                            <h5>Proteínas</h5>
                            <p>2g - 2.2g por kg</p>
                        </div>
                        <div class="macro-item">
                            <h5>Carbohidratos</h5>
                            <p>4g - 6g por kg</p>
                        </div>
                        <div class="macro-item">
                            <h5>Grasas</h5>
                            <p>0.8g - 1g por kg</p>
                        </div>
                    </div>
                </div>

                <div class="meal-plan">
                    <h3>Desayuno (7:00 AM)</h3>
                    <div class="meal-item">
                        <span class="meal-time">Desayuno</span>
                        <span class="meal-description">Avena con leche, huevos enteros y plátano</span>
                        <span class="meal-calories">600 kcal</span>
                    </div>
                </div>

                <div class="meal-plan">
                    <h3>Media Mañana (10:00 AM)</h3>
                    <div class="meal-item">
                        <span class="meal-time">Snack</span>
                        <span class="meal-description">Batido de proteína con avena y mantequilla de maní</span>
                        <span class="meal-calories">400 kcal</span>
                    </div>
                </div>

                <div class="meal-plan">
                    <h3>Almuerzo (1:00 PM)</h3>
                    <div class="meal-item">
                        <span class="meal-time">Almuerzo</span>
                        <span class="meal-description">Arroz con pollo y aguacate</span>
                        <span class="meal-calories">700 kcal</span>
                    </div>
                </div>

                <div class="meal-plan">
                    <h3>Merienda (4:00 PM)</h3>
                    <div class="meal-item">
                        <span class="meal-time">Merienda</span>
                        <span class="meal-description">Yogur griego con granola y frutas</span>
                        <span class="meal-calories">350 kcal</span>
                    </div>
                </div>

                <div class="meal-plan">
                    <h3>Cena (7:00 PM)</h3>
                    <div class="meal-item">
                        <span class="meal-time">Cena</span>
                        <span class="meal-description">Carne de res con patatas y verduras</span>
                        <span class="meal-calories">650 kcal</span>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
    function showDiet(dietType) {
        document.querySelectorAll('.diet-plan').forEach(plan => {
            plan.style.display = 'none';
        });
        
        document.getElementById(dietType).style.display = 'block';
        
        document.querySelectorAll('.diet-type-button').forEach(button => {
            button.classList.remove('active');
        });
        event.target.classList.add('active');
    }
    </script>
</body>
</html>
