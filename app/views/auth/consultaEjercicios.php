<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Catálogo de Ejercicios</title>
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
        <h1>Catálogo de Ejercicios</h1>
        <nav class="nav-ejercicios" style="text-align:center; margin-bottom:2rem;">
            <a href="#pecho">Pecho</a>
            <a href="#espalda">Espalda</a>
            <a href="#piernas">Piernas</a>
            <a href="#brazos">Brazos</a>
            <a href="#core">Core</a>
        </nav>
        
        <?php
        $gruposMusculares = [
            'pecho' => 'Pecho',
            'espalda' => 'Espalda',
            'piernas' => 'Piernas',
            'brazos' => 'Brazos',
            'core' => 'Core'
        ];
        
        foreach ($gruposMusculares as $key => $grupo): ?>
            <section class="grupo-muscular" id="<?php echo $key; ?>">
                <h2><?php echo $grupo; ?></h2>
                <div class="ejercicios-container">
                    <?php if (isset($ejerciciosPorGrupo[$key])): ?>
                        <?php foreach ($ejerciciosPorGrupo[$key] as $id => $ejercicio): ?>
                            <div class="ejercicio-card">
                                <div class="ejercicio-imagen">
                                    <img src="<?php echo $ejercicio['imagen']; ?>" alt="<?php echo $ejercicio['nombre']; ?>">
                                </div>
                                <div class="ejercicio-info">
                                    <h3><?php echo $ejercicio['nombre']; ?></h3>
                                    <p><?php echo $ejercicio['descripcion']; ?></p>
                                    <a href="index.php?action=ejercicio&id=<?php echo $id; ?>" class="ver-mas" data-id="<?php echo $id; ?>">Ver más detalles</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </section>
        <?php endforeach; ?>
    </main>

    <div id="ejercicioModal" class="modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2 id="modalTitle"></h2>
            <img id="modalImage" src="" alt="">
            <div class="descripcion">
                <p id="modalDescription"></p>
            </div>
            <a id="modalVideo" href="" target="_blank" class="video-link">Ver tutorial en YouTube</a>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('ejercicioModal');
        const closeBtn = document.querySelector('.close-modal');
        const verMasButtons = document.querySelectorAll('.ver-mas');
        const placeholderImg = 'img/placeholder.png'; // Usa una imagen de placeholder que tengas en tu proyecto
        const defaultVideo = 'https://www.youtube.com/results?search_query=ejercicio+gimnasio';

        verMasButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const ejercicioId = this.getAttribute('data-id');
                modal.style.display = 'block';
                fetch(`index.php?action=ejercicio&id=${ejercicioId}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Error al cargar los datos del ejercicio');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data) {
                            document.getElementById('modalTitle').textContent = data.nombre || 'Ejercicio';
                            document.getElementById('modalImage').src = data.imagen || placeholderImg;
                            document.getElementById('modalImage').alt = data.nombre || 'Ejercicio';
                            document.getElementById('modalDescription').textContent = data.descripcion || 'Sin descripción disponible';
                            const videoLink = document.getElementById('modalVideo');
                            if (data.video && data.video.trim() !== '') {
                                videoLink.href = data.video;
                                videoLink.style.display = 'block';
                            } else {
                                videoLink.href = defaultVideo;
                                videoLink.style.display = 'block';
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        document.getElementById('modalTitle').textContent = 'Error';
                        document.getElementById('modalImage').src = placeholderImg;
                        document.getElementById('modalDescription').textContent = 'No se pudieron cargar los datos del ejercicio. Por favor, inténtalo de nuevo.';
                        const videoLink = document.getElementById('modalVideo');
                        videoLink.href = defaultVideo;
                        videoLink.style.display = 'block';
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
