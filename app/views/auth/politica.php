<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Política de Privacidad</title>
    <link rel="stylesheet" href="css/global.css"> <!-- Estilos globales -->
    <link rel="stylesheet" href="css/footer.css"> <!-- Estilos específicos -->
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

   <!-- Sección Política de Privacidad -->
<section class="privacy-policy">
    <div class="privacy-policy-container">
        <h1>Política de Privacidad</h1>

        <p>En CoreCraft, la privacidad de nuestros usuarios es muy importante para nosotros. Esta política de privacidad describe cómo recopilamos, usamos, almacenamos y protegemos la información personal de nuestros usuarios. Al utilizar nuestros servicios, aceptas las prácticas descritas en esta política.</p>

        <h3>Información que recopilamos</h3>
        <p>Recopilamos información personal cuando te registras en nuestro sitio, completas formularios o interactúas con nuestros servicios. La información recopilada puede incluir, pero no se limita a:</p>
        <ul>
            <li>Nombre completo y apellidos</li>
            <li>Dirección de correo electrónico</li>
            <li>Datos demográficos (edad, género, ubicación)</li>
            <li>Información sobre tu salud y estado físico: peso, altura, nivel de actividad física</li>
            <li>Historial de entrenamiento, rutinas de ejercicio y objetivos personales</li>
            <li>Datos sobre suplementación y hábitos alimenticios</li>
            <li>Información de navegación y cookies para mejorar tu experiencia</li>
        </ul>

        <h3>Uso de la información</h3>
        <p>La información recopilada se utiliza para personalizar tu experiencia y mejorar nuestros servicios. Entre los usos específicos se incluyen:</p>
        <ul>
            <li>Diseñar rutinas de ejercicio personalizadas y recomendaciones de suplementación.</li>
            <li>Ofrecer asesoramiento y seguimiento de tu progreso.</li>
            <li>Enviar actualizaciones, promociones y novedades relacionadas con el fitness y la salud.</li>
            <li>Realizar análisis estadísticos para optimizar el contenido y la funcionalidad del sitio.</li>
            <li>Gestionar solicitudes, consultas y soporte al usuario.</li>
        </ul>

        <h3>Uso de Cookies y Tecnologías Similares</h3>
        <p>Utilizamos cookies y tecnologías de seguimiento para mejorar la experiencia del usuario, analizar el tráfico del sitio y personalizar el contenido. Las cookies son pequeños archivos de texto que se almacenan en tu dispositivo. Puedes gestionar las preferencias de cookies a través de la configuración de tu navegador.</p>

        <h3>Protección y Seguridad de la Información</h3>
        <p>Nos comprometemos a proteger la información personal que nos proporcionas. Implementamos medidas de seguridad técnicas y organizativas para evitar el acceso no autorizado, la alteración, divulgación o destrucción de tus datos. Entre estas medidas se incluyen el uso de cifrado, firewalls y controles de acceso restringido.</p>

        <h3>Compartir la Información con Terceros</h3>
        <p>No compartimos tu información personal con terceros, salvo en los siguientes casos:</p>
        <ul>
            <li>Cuando sea necesario para cumplir con los servicios solicitados, como la entrega de productos o servicios relacionados con tus rutinas y suplementación.</li>
            <li>Si la divulgación es requerida por la ley o por una autoridad competente.</li>
            <li>Con proveedores de servicios que colaboran con nosotros, quienes están obligados a mantener la confidencialidad de tus datos.</li>
        </ul>

        <h3>Retención de Datos</h3>
        <p>Conservamos tus datos personales durante el tiempo necesario para cumplir con los fines para los que fueron recopilados, incluyendo el cumplimiento de obligaciones legales y contractuales. Una vez concluido este período, tus datos serán eliminados o anonimizados.</p>

        <h3>Tus Derechos como Usuario</h3>
        <p>De acuerdo con la normativa vigente en materia de protección de datos, tienes derecho a:</p>
        <ul>
            <li>Acceder a tus datos personales que poseemos.</li>
            <li>Solicitar la rectificación de datos inexactos o incompletos.</li>
            <li>Solicitar la eliminación o supresión de tus datos.</li>
            <li>Oponerte al tratamiento de tus datos en determinadas circunstancias.</li>
            <li>Solicitar la portabilidad de tus datos.</li>
            <li>Retirar el consentimiento otorgado para el tratamiento de tus datos en cualquier momento.</li>
        </ul>

        <h3>Privacidad de los Menores</h3>
        <p>Nuestros servicios están dirigidos a adultos. No recopilamos intencionadamente información personal de menores de edad. Si tienes conocimiento de que un menor ha proporcionado sus datos sin el consentimiento de sus padres o tutores, por favor contáctanos para tomar las medidas pertinentes.</p>

        <h3>Transferencias Internacionales</h3>
        <p>Tus datos pueden ser transferidos y almacenados en servidores ubicados en otros países fuera del Espacio Económico Europeo (EEE). Nos aseguramos de que estas transferencias cumplan con la normativa aplicable y cuenten con garantías adecuadas para proteger tus datos.</p>

        <h3>Cambios en la Política de Privacidad</h3>
        <p>Nos reservamos el derecho de modificar esta política de privacidad en cualquier momento. Cualquier cambio será notificado mediante un aviso en nuestro sitio web y, en casos relevantes, a través de comunicación directa. Te recomendamos revisar esta política periódicamente para estar al tanto de cualquier actualización.</p>

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
                    <i class="fab fa-twitter"></i>
                </a>
            </div>
        </div>
    </div>
    <p>&copy; 2025 CoreCraft. Todos los derechos reservados.</p>
</footer>
</body>
</html>
