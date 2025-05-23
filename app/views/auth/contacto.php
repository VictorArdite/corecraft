<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Contacto</title>
    <link rel="stylesheet" href="css/global.css"> <!-- Estilos globales -->
    <link rel="stylesheet" href="css/footer.css"> <!-- Estilos específicos -->
    <link rel="stylesheet" href="css/nosotros.css"> <!-- Estilos específicos para la página Nosotros -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main, .contact {
            flex: 1 0 auto;
        }
        footer {
            flex-shrink: 0;
        }
        /* Estilo opcional para el contenedor del mapa */
        .map-container {
            max-width: 600px;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <!-- Encabezado -->
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

    <!-- Sección Contacto -->
    <section class="contact">
        <div class="contact-container">
            <h1>Contacto</h1>

            <p>En CoreCraft, estamos aquí para ayudarte. Si tienes alguna pregunta o necesitas más información sobre nuestros servicios, no dudes en ponerte en contacto con nosotros. A continuación, te mostramos nuestros canales de contacto:</p>

            <ul>
                <li><strong>Teléfono:</strong> +34 123 456 789</li>
                <li><strong>Correo Electrónico:</strong> <a href="mailto:contacto@corecraft.com">corecraft.fv@gmail.com</a></li>
                <li><strong>Dirección:</strong> Calle Clot, 123, Barcelona,España</li>
            </ul>

            <!-- Mapa de Google Maps -->
            <div class="map-container">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2992.6245047126245!2d2.1450833157406277!3d41.40255197926205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4a3d412345678%3A0x89abcdef01234567!2sCarrer%20de%20Clot%2C%20Barcelona!5e0!3m2!1ses!2ses!4v1682000000000"
                  width="600"
                  height="450"
                  style="border:0;"
                  allowfullscreen=""
                  loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

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
</body>
</html>
