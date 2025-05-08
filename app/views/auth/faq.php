<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CoreCraft - Preguntas Frecuentes</title>
  <link rel="stylesheet" href="css/global.css"> <!-- Estilos globales -->
  <link rel="stylesheet" href="css/footer.css"> <!-- Estilos del footer -->
  <link rel="stylesheet" href="css/nosotros.css"> <!-- Estilos específicos para la página Nosotros -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    /* =============================
       Estilos adicionales para FAQ
       ============================= */

    .faq-container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    .faq-container h1 {
      text-align: center;
      font-size: 3em;
      margin-bottom: 30px;
    }

    .faq-item {
      border-bottom: 1px solid #ddd;
      padding: 15px 0;
      transition: all 0.3s ease;
    }

    .faq-question {
      display: flex;
      justify-content: space-between;
      align-items: center;
      cursor: pointer;
    }

    .faq-question h2 {
      font-size: 1.5em;
      margin: 0;
    }

    .faq-toggle {
      font-size: 2em;
      line-height: 1;
      transition: transform 0.3s ease;
    }

    .faq-answer {
      max-height: 0;
      overflow: hidden;
      opacity: 0;
      transition: all 0.3s ease;
    }

    .faq-answer p {
      margin: 10px 0 0;
      font-size: 1.2em;
      line-height: 1.6;
    }

    .faq-item.active .faq-answer {
      max-height: 500px; /* Valor suficientemente alto para mostrar el contenido */
      opacity: 1;
      padding-top: 10px;
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

  <!-- Sección Preguntas Frecuentes -->
  <section class="faq">
    <div class="faq-container">
      <h1>Preguntas Frecuentes</h1>

      <div class="faq-item">
        <div class="faq-question">
          <h2>¿Cómo obtengo una rutina personalizada?</h2>
          <span class="faq-toggle">+</span>
        </div>
        <div class="faq-answer">
          <p>Para obtener una rutina personalizada, solo tienes que completar un formulario en nuestra web con tu información básica (edad, peso, altura, días que practicas deporte, estado de forma y objetivos) y nuestro equipo diseñará una rutina ajustada a tus necesidades.</p>
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          <h2>¿Qué tipo de suplementos necesito tomar?</h2>
          <span class="faq-toggle">+</span>
        </div>
        <div class="faq-answer">
          <p>La suplementación depende de tus objetivos. Tenemos una secció de suplementación que te explica en profundidad que se recomienda tomar segun tus objetivos</p>
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          <h2>¿Cuánto tiempo necesito entrenar cada semana?</h2>
          <span class="faq-toggle">+</span>
        </div>
        <div class="faq-answer">
          <p>El tiempo recomendado depende de tus objetivos. Segun lo que hayas rellenado en el formulario se te habrá otorgado la rutina con los dias que tendrías que hacer.</p>
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          <h2>¿Puedo cambiar mi rutina después de un tiempo?</h2>
          <span class="faq-toggle">+</span>
        </div>
        <div class="faq-answer">
          <p>Sí, puedes cambiar tu rutina en cualquier momento. Si sientes que ya no estás progresando o si tus objetivos cambian, podemos hacer ajustes a tu rutina para que sigas avanzando.</p>
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          <h2>¿CoreCraft ofrece entrenamientos en línea?</h2>
          <span class="faq-toggle">+</span>
        </div>
        <div class="faq-answer">
          <p>Sí, ofrecemos entrenamientos en línea. Puedes acceder a tu rutina personalizada desde cualquier dispositivo y seguirla desde la comodidad de tu hogar o gimnasio. Además, te brindamos soporte online para resolver cualquier duda.</p>
        </div>
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

  <!-- Script para el comportamiento del acordeón -->
  <script>
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
      const question = item.querySelector('.faq-question');
      question.addEventListener('click', () => {
        item.classList.toggle('active');
        const toggle = item.querySelector('.faq-toggle');
        toggle.textContent = item.classList.contains('active') ? '−' : '+';
      });
    });
  </script>
</body>
</html>