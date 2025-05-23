<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Inicio</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease-in-out;
            width: 100%;
        }

        .carousel-item {
            width: 100vw;
            flex-shrink: 0;
            height: 48vw; /* o la altura que prefieras */
            max-height: 600px;
            min-height: 260px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .carousel-item img {
            width: 100vw;
            height: 100%;
            object-fit: cover;
            display: block;
        }
    </style>
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
    <div class="carousel-wrapper">
        <div class="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/prueba.jpg" alt="Imagen nueva 1">
                </div>
                <div class="carousel-item">
                    <img src="img/prueba2.jpg" alt="Imagen nueva 2">
                </div>
                <div class="carousel-item">
                    <img src="img/prueba3.jpg" alt="Imagen nueva 3">
                </div>
            </div>
            <button class="carousel-control prev" onclick="prevSlide()">&#10094;</button>
            <button class="carousel-control next" onclick="nextSlide()">&#10095;</button>
        </div>
    </div>
    <main>
        <!-- Mensaje Motivacional justo arriba del carrusel -->
        <!-- <div class="motivational-message">
            <p>Supera tus límites. Con dedicación, esfuerzo y constancia, tu mejor versión está más cerca de lo que imaginas.</p>
        </div> -->

        <!-- Recuadros informativos -->
        <div class="info-cards">
            <div class="info-card">
                <img src="img/crear.png" alt="Crea tu Rutina" class="card-img">
                <h3>Crea tu Rutina</h3>
                <p>Diseña tu propio plan de entrenamiento personalizado según tus objetivos y nivel de experiencia. ¡Tú decides cómo alcanzar tus metas!</p>
                <a href="index.php?action=rutinas" class="card-button">Crear Rutina</a>
            </div>
            
            <div class="info-card">
                <img src="img/calcular.jpg" alt="Calcula tu Nivel" class="card-img">
                <h3>Calcula tu Nivel</h3>
                <p>Descubre tu nivel actual de entrenamiento con nuestra calculadora especializada. Optimiza tu progreso con rutinas adaptadas a ti.</p>
                <a href="index.php?action=calculadora-nivel" class="card-button">Calcular Nivel</a>
            </div>
            
            <div class="info-card">
                <img src="img/suplem.jpg" alt="Suplementación" class="card-img">
                <h3>Suplementación</h3>
                <p>Aprende todo sobre suplementos deportivos: qué tomar, cuándo y por qué. Maximiza tus resultados con la nutrición adecuada.</p>
                <a href="index.php?action=suplementacion" class="card-button">Saber Más</a>
            </div>
        </div>
    </main>
    
<!-- Footer -->
<footer>
    <div class="footer-container">
        <!-- Apartado Compañía -->
        <div class="footer-section">
            <h4>Compañía</h4>
            <div class="footer-links">
                <a href="index.php?action=nosotros">Nosotros</a>
                <a href="index.php?action=services">Nuestros servicios</a>
                <a href="index.php?action=privacy">Política de privacidad</a>
            </div>
        </div>
        <!-- Apartado Ayuda -->
        <div class="footer-section">
            <h4>Ayuda</h4>
            <div class="footer-links">
                <a href="index.php?action=faq">Preguntas frecuentes</a>
                <a href="index.php?action=contact">Contacto</a>
            </div>
        </div>
        <!-- Apartado Síguenos -->
        <div class="footer-section">
            <h4>Síguenos</h4>
            <div class="footer-social">
                <a href="https://www.facebook.com/profile.php?id=61574264483708" target="_blank">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="https://www.instagram.com/corecraft__/" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://x.com/Corecraft__" target="_blank">
                    <span class="fa-x-twitter">X</span>
                </a>
            </div>
        </div>
    </div>
    <p>&copy; 2025 CoreCraft. Todos los derechos reservados.</p>
</footer>


    
    <script src="js/carousel.js"></script>
</body>
</html>
