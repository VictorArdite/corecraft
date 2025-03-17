<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Nuestros Servicios</title>
    <link rel="stylesheet" href="css/global.css"> <!-- Estilos globales -->
    <link rel="stylesheet" href="css/footer.css"> <!-- Estilos del footer -->
    <link rel="stylesheet" href="css/nosotros.css"> <!-- Estilos específicos para la página Nosotros -->
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
                <li><a href="index.php?action=suplementacion">Suplementación</a></li>
                <li><a href="index.php?action=perfil">Perfil</a></li>
            </ul>
        </nav>
    </header>

    <!-- Sección Nuestros Servicios -->
    <section class="about-us">
        <!-- Título de sección -->
        <div class="section-title">
            <h1>Nuestros Servicios</h1>
        </div>

        <!-- Hero principal: imagen de fondo con texto superpuesto -->
        <div class="hero-container">
            <!-- Utiliza una imagen de alta calidad que represente tus servicios -->
            <img src="img/gy.jpg" alt="Imagen principal de Nuestros Servicios" class="hero-image">
        </div>

        <!-- Bloque de descripción general -->
        <div class="description-container">
            <h2>Lo que ofrecemos</h2>
            <p>
                En CoreCraft, nos especializamos en rutinas personalizadas y en brindar asesoramiento experto en suplementación para optimizar tu rendimiento y bienestar.
            </p>
        </div>

        <!-- Bloque de "tarjetas" o columnas informativas -->
        <div class="features-container">
            <!-- Tarjeta "Rutinas Personalizadas" -->
            <div class="feature">
                <img src="img/rutinas.jpg" alt="Rutinas Personalizadas">
                <h3>Rutinas Personalizadas</h3>
                <p>
                    Diseñamos planes de entrenamiento únicos adaptados a las características y objetivos de cada persona.
                </p>
            </div>
            <!-- Tarjeta "Suplementación" -->
            <div class="feature">
                <img src="img/suple.jpg" alt="Suplementación">
                <h3>Suplementación</h3>
                <p>
                    Ofrecemos asesoramiento experto para elegir los suplementos que complementen tu dieta y potencien tus resultados.
                </p>
            </div>
            <!-- Tarjeta "Atención Personalizada" -->
            <div class="feature">
                <img src="img/perso.jpg" alt="Atención Personalizada">
                <h3>Atención Personalizada</h3>
                <p>
                    Nuestro equipo de profesionales te acompaña en cada paso, ajustando tus planes según tus necesidades y evolución.
                </p>
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
        </div>
    </footer>
</body>
</html>