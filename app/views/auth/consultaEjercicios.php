<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Ejercicios</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/consultaEjercicios.css">
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
        <h1>Catálogo de Ejercicios</h1>
        
        <?php
        $gruposMusculares = [
            'pecho' => 'Pecho',
            'espalda' => 'Espalda',
            'piernas' => 'Piernas',
            'brazos' => 'Brazos',
            'core' => 'Core'
        ];
        
        foreach ($gruposMusculares as $key => $grupo): ?>
            <section class="grupo-muscular">
                <h2><?php echo $grupo; ?></h2>
                <div class="ejercicios-container">
                    <?php if (isset($ejerciciosPorGrupo[$key])): ?>
                        <?php foreach ($ejerciciosPorGrupo[$key] as $id => $ejercicio): ?>
                            <div class="ejercicio-card">
                                <img src="<?php echo $ejercicio['imagen']; ?>" alt="<?php echo $ejercicio['nombre']; ?>">
                                <h3><?php echo $ejercicio['nombre']; ?></h3>
                                <p><?php echo $ejercicio['descripcion']; ?></p>
                                <a href="index.php?action=ejercicio&id=<?php echo $id; ?>" class="ver-mas">Ver más detalles</a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </section>
        <?php endforeach; ?>
    </main>

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

    <div id="ejercicioModal" class="modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2 id="modalTitle"></h2>
            <img id="modalImage" src="" alt="">
            <div class="descripcion">
                <h3>Descripción</h3>
                <p id="modalDescription"></p>
            </div>
            <div class="instrucciones">
                <h3>Instrucciones</h3>
                <ol id="modalSteps"></ol>
            </div>
            <a id="modalVideo" href="" target="_blank" class="video-link">Ver video </a>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('ejercicioModal');
        const closeBtn = document.querySelector('.close-modal');
        const verMasButtons = document.querySelectorAll('.ver-mas');

        verMasButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const ejercicioId = this.href.split('id=')[1];
                
                fetch(`index.php?action=ejercicio&id=${ejercicioId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('modalTitle').textContent = data.nombre;
                        document.getElementById('modalImage').src = data.imagen;
                        document.getElementById('modalDescription').textContent = data.descripcion;
                        
                        const stepsList = document.getElementById('modalSteps');
                        stepsList.innerHTML = '';
                        data.pasos.forEach(paso => {
                            const li = document.createElement('li');
                            li.textContent = paso;
                            stepsList.appendChild(li);
                        });
                        
                        document.getElementById('modalVideo').href = data.video;
                        modal.style.display = 'block';
                    });
            });
        });

        closeBtn.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        window.addEventListener('click', function(e) {
            if (e.target == modal) {
                modal.style.display = 'none';
            }
        });
    });
    </script>
</body>
</html>
