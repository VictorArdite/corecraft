<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Inicio</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/home.css"> <!-- Ruta correcta al archivo CSS -->
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php?action=home">
                <img src="img/logo.jpg" alt="CoreCraft Logo"> <!-- Asegúrate de que la ruta de la imagen sea correcta -->
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php?action=home">Inicio</a></li>
                <li><a href="index.php?action=login">Iniciar Sesión</a></li>
                <li><a href="index.php?action=register">Registrarse</a></li>
                <li><a href="index.php?action=rutinas">Rutinas</a></li>
                <li><a href="index.php?action=suplementacion">Suplementación</a></li>
                <li><a href="index.php?action=perfil">Perfil</a></li>
            </ul>
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
            <div class="footer-logo">
                <img src="img/logo.jpg" alt="CoreCraft Logo">
            </div>
            <div class="footer-contact">
                <p><strong>Contacto:</strong></p>
                <p>Email: contacto@corecraft.com</p>
                <p>Teléfono: +34 123 456 789</p>
            </div>
            <div class="footer-links">
                <a href="index.php?action=about">Sobre nosotros</a>
                <a href="index.php?action=terms">Términos y condiciones</a>
                <a href="index.php?action=privacy">Política de privacidad</a>
            </div>
        </div>
        <p>&copy; 2025 CoreCraft. Todos los derechos reservados.</p>
    </footer>
    
    <script src="js/carousel.js"></script> <!-- Ruta correcta al archivo JS -->
</body>
</html>
