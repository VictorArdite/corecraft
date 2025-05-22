<?php require_once __DIR__ . '/../../public/config/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Crear Rutina Personalizada</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/rutina_personalizada.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-dark: #23272b;
            --secondary-dark: #1a1a1a;
            --accent-yellow: #ffd600;
            --text-light: #fff;
        }

        .ejercicios-container {
            margin: 20px 0;
        }

        .ejercicio-item {
            background: var(--primary-dark);
            border-radius: 8px;
            margin-bottom: 15px;
            border: 1px solid var(--accent-yellow);
        }

        .ejercicio-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            cursor: pointer;
            border-bottom: 1px solid var(--accent-yellow);
        }

        .ejercicio-header h3 {
            margin: 0;
            color: var(--accent-yellow);
            font-size: 1.2em;
        }

        .ejercicio-content {
            display: none;
            padding: 12px 0 0 0;
            animation: slideDown 0.3s ease-out;
        }

        .ejercicio-content.show {
            display: block;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: var(--accent-yellow);
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            border: 1.5px solid var(--accent-yellow);
            border-radius: 8px;
            background: var(--secondary-dark);
            color: var(--text-light);
            margin-bottom: 10px;
            font-size: 1em;
            transition: border 0.2s, box-shadow 0.2s;
        }

        .form-control:focus {
            border: 2px solid #ffd600 !important;
            background: #23272b !important;
            box-shadow: 0 0 8px #ffd60033 !important;
        }

        .btn-primary {
            background: var(--accent-yellow);
            color: var(--primary-dark);
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
            font-size: 1em;
            margin-top: 8px;
            transition: background 0.2s, color 0.2s;
        }

        .btn-primary:hover {
            background: #fff;
            color: var(--accent-yellow);
        }

        .page-title {
            text-align: center;
            margin: 20px 0;
            color: var(--accent-yellow);
            font-size: 2.2em;
        }

        .ejercicio-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
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

    <main>
        <div class="container">
            <h1 class="page-title">Crear Rutina Personalizada</h1>
            <div class="rutina-form-container">
                <form id="rutinaForm" action="index.php?action=rutina-personalizada/guardar" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre de la Rutina:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea id="descripcion" name="descripcion" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="ejercicios-container">
                        <h2>Ejercicios</h2>
                        <div id="ejerciciosList">
                            <!-- Los ejercicios se cargarán dinámicamente aquí -->
                        </div>
                    </div>

                    <button type="submit" class="btn-primary">Guardar Rutina</button>
                </form>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ejercicios = <?php echo json_encode($ejercicios); ?>;
            const ejerciciosList = document.getElementById('ejerciciosList');
            
            // Crear elementos para cada ejercicio
            ejercicios.forEach(ejercicio => {
                const ejercicioDiv = document.createElement('div');
                ejercicioDiv.className = 'ejercicio-item';
                ejercicioDiv.innerHTML = `
                    <div class="ejercicio-header" onclick="toggleContent(this)">
                        <input type="checkbox" name="ejercicios[]" value="${ejercicio.id}" id="ejercicio_${ejercicio.id}">
                        <label for="ejercicio_${ejercicio.id}">${ejercicio.nombre}</label>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="ejercicio-content">
                        <div class="ejercicio-details">
                            <div class="form-group">
                                <label for="series_${ejercicio.id}">Series:</label>
                                <input type="number" id="series_${ejercicio.id}" name="series_${ejercicio.id}" class="form-control" min="1" value="3">
                            </div>
                            <div class="form-group">
                                <label for="repeticiones_${ejercicio.id}">Repeticiones:</label>
                                <input type="number" id="repeticiones_${ejercicio.id}" name="repeticiones_${ejercicio.id}" class="form-control" min="1" value="12">
                            </div>
                        </div>
                    </div>
                `;
                ejerciciosList.appendChild(ejercicioDiv);
            });

            // Función para alternar la visibilidad del contenido
            window.toggleContent = function(header) {
                const content = header.nextElementSibling;
                const icon = header.querySelector('i');
                
                content.classList.toggle('show');
                icon.classList.toggle('fa-chevron-down');
                icon.classList.toggle('fa-chevron-up');
            };

            // Manejar el envío del formulario
            document.getElementById('rutinaForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const ejerciciosSeleccionados = [];
                const checkboxes = document.querySelectorAll('input[name="ejercicios[]"]:checked');
                
                checkboxes.forEach(checkbox => {
                    const ejercicioId = checkbox.value;
                    ejerciciosSeleccionados.push({
                        id: ejercicioId,
                        series: document.getElementById(`series_${ejercicioId}`).value,
                        repeticiones: document.getElementById(`repeticiones_${ejercicioId}`).value
                    });
                });

                // Crear un campo oculto con los ejercicios seleccionados
                const ejerciciosInput = document.createElement('input');
                ejerciciosInput.type = 'hidden';
                ejerciciosInput.name = 'ejercicios';
                ejerciciosInput.value = JSON.stringify(ejerciciosSeleccionados);
                this.appendChild(ejerciciosInput);

                this.submit();
            });
        });
    </script>
</body>
</html> 