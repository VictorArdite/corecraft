<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Sobre Nosotros</title>
    <link rel="stylesheet" href="css/global.css"> <!-- Estilos globales -->
    <link rel="stylesheet" href="css/footer.css"> <!-- Estilos específicos -->
    <link rel="stylesheet" href="css/nosotros.css"> <!-- Estilos específicos para la página Nosotros -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Header igual que home.php -->
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

   
   <!-- Sección "Sobre Nosotros" -->
   <section class="about-us">
        <!-- Hero principal: imagen de fondo con texto superpuesto -->
        <div class="section-title">
        <h1>Sobre Nosotros</h1>
    </div>
        <div class="hero-container">
            <!-- Sugerencia: utiliza una imagen de alta calidad que transmita energía y motivación, por ejemplo, una imagen de personas entrenando en un gimnasio o al aire libre -->
            <img src="img/principal.jpg" alt="Imagen principal de CoreCraft" class="hero-image">

        </div>

        <!-- Bloque de descripción general -->
        <div class="description-container">
            <h2>Descripción de la empresa</h2>
            <p>
                CoreCraft es una empresa líder en rutinas de fitness, planes de suplementación y seguimiento personalizado. Nuestro objetivo es ayudar a las personas a alcanzar sus metas de salud y bienestar 
            </p>
        </div>

        <!-- Bloque de "tarjetas" o columnas informativas -->
        <div class="features-container">
            <!-- Tarjeta "Sobre nosotros" -->
            <div class="feature">
            <img src="img/sobre.jpg" alt="Sobre nosotros">

                <h3>Sobre nosotros</h3>
                <p>
                En CoreCraft vamos más allá de ser una empresa de fitness. Nos especializamos en desarrollar rutinas de gimnasio personalizadas y en ofrecer información precisa sobre suplementación, todo respaldado por un equipo de expertos comprometidos con la innovación y la excelencia.
                </p>
            </div>
            <!-- Tarjeta "Objetivos" (antes Servicio integral) -->
            <div class="feature">
            <img src="img/objetivos.jpg" alt="Objetivos">

                <h3>Objetivos</h3>
                <p>
                Nuestro objetivo es liderar el sector mediante soluciones innovadoras y un enfoque en la mejora continua, consolidando nuestra presencia en el mercado.
                </p>
            </div>
            <!-- Tarjeta "Metas" (antes Sostenibilidad) -->
            <div class="feature">
            <img src="img/metas.png" alt="Metas">

                <h3>Metas</h3>
                <p>
                Las metas de CoreCraft se centran en alcanzar un crecimiento sostenible y potenciar el desarrollo de proyectos vanguardistas que marcan tendencia.
                </p>
            </div>
        </div>
    </section>


  <!-- Footer igual que home.php -->
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
</body>
</html>
