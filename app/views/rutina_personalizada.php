<?php require_once __DIR__ . '/../../public/config/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Rutina Personalizada - CoreCraft</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/global.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/rutina_personalizada.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php?action=home">
                <img src="<?php echo BASE_URL; ?>/public/img/logo.jpg" alt="CoreCraft Logo">
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

    <main>
        <div class="container">
            <h1>Crear Rutina Personalizada</h1>
            <div class="rutina-form-container">
                <form id="rutinaForm" action="index.php?action=rutina-personalizada/guardar" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre de la Rutina:</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea id="descripcion" name="descripcion" rows="3"></textarea>
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

            ejercicios.forEach(ejercicio => {
                const ejercicioDiv = document.createElement('div');
                ejercicioDiv.className = 'ejercicio-item';
                ejercicioDiv.innerHTML = `
                    <div class="ejercicio-header">
                        <input type="checkbox" id="ejercicio_${ejercicio.id}" name="ejercicios[]" value="${ejercicio.id}">
                        <label for="ejercicio_${ejercicio.id}">${ejercicio.nombre}</label>
                    </div>
                    <div class="ejercicio-details" id="detalles_${ejercicio.id}" style="display: none;">
                        <div class="form-group">
                            <label for="series_${ejercicio.id}">Series:</label>
                            <input type="number" id="series_${ejercicio.id}" name="series_${ejercicio.id}" min="1" value="3">
                        </div>
                        <div class="form-group">
                            <label for="repeticiones_${ejercicio.id}">Repeticiones:</label>
                            <input type="number" id="repeticiones_${ejercicio.id}" name="repeticiones_${ejercicio.id}" min="1" value="12">
                        </div>
                    </div>
                `;

                const checkbox = ejercicioDiv.querySelector('input[type="checkbox"]');
                const detalles = ejercicioDiv.querySelector('.ejercicio-details');

                checkbox.addEventListener('change', function() {
                    detalles.style.display = this.checked ? 'block' : 'none';
                });

                ejerciciosList.appendChild(ejercicioDiv);
            });

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