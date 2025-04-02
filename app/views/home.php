<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Inicio</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/home.css"> <!-- Ruta al archivo CSS -->
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
                <li><a href="index.php?action=rutinas">Rutinas</a></li>
                <li><a href="index.php?action=consultaEjercicios">Ejercicios</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="index.php?action=registro-peso">Registro de Pesos</a></li>
                <?php endif; ?>
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
        <!-- Mensaje Motivacional justo arriba del carrusel -->
        <div class="motivational-message">
            <p>Supera tus límites. Con dedicación, esfuerzo y constancia, tu mejor versión está más cerca de lo que imaginas.</p>
        </div>

        <!-- Carrusel de imágenes -->
        <div class="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img src="img/banca.png" alt="Banca">
                </div>
                <div class="carousel-item">
                    <img src="img/sentadilla.png" alt="Sentadilla">
                </div>
                <div class="carousel-item">
                    <img src="img/pesomuerto.png" alt="Peso Muerto">
                </div>
                <div class="carousel-item">
                    <img src="img/halterofilia.png" alt="Halterofilia">
                </div>
                <div class="carousel-item">
                    <img src="img/banca.png" alt="Banca">
                </div>
                <div class="carousel-item">
                    <img src="img/sentadilla.png" alt="Sentadilla">
                </div>
                <div class="carousel-item">
                    <img src="img/pesomuerto.png" alt="Peso Muerto">
                </div>
                <div class="carousel-item">
                    <img src="img/halterofilia.png" alt="Halterofilia">
                </div>
            </div>
            <button class="carousel-control prev" onclick="prevSlide()">&#10094;</button>
            <button class="carousel-control next" onclick="nextSlide()">&#10095;</button>
        </div>

        <!-- Mensaje complementario debajo del carrusel -->
        <div class="motivational-message">
            <p>¡No esperes más! Empieza hoy mismo tu camino hacia el cambio. Aprovecha nuestras rutinas diseñadas especialmente para ti y tus objetivos. ¡El momento de transformar tu vida es ahora!</p>
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
                    <i class="fab fa-twitter"></i>
                </a>
            </div>
        </div>
    </div>
    <p>&copy; 2025 CoreCraft. Todos los derechos reservados.</p>
</footer>


    
    <script src="js/carousel.js"></script> <!-- Ruta al archivo JS -->
</body>
</html>
