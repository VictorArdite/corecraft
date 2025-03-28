<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Registro de Pesos</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/rutinas.css">
    <style>
        .rutinas-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
            justify-content: center;
        }

        .rutina-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .btn-primary {
            background: #142e52;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .btn-primary:hover {
            background: #0e2238;
        }

        .historial {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .page-title {
            text-align: center;
            margin: 20px 0;
            color: white;
        }

        .ejercicios-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .ejercicio-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
                <li><a href="index.php?action=rutinas">Rutinas</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="index.php?action=registro-peso">Registro de Pesos</a></li>
                <?php endif; ?>
                <li><a href="index.php?action=suplementacion">Suplementación</a></li>
                <li><a href="index.php?action=perfil">Perfil</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1 class="page-title">Registro de Pesos</h1>
        
        <div class="ejercicios-grid">
            <?php if (!empty($ejercicios)): ?>
                <?php foreach ($ejercicios as $ejercicio): ?>
                <div class="ejercicio-card">
                    <h3><?php echo htmlspecialchars($ejercicio['ejercicio']); ?></h3>
                    
                    <form class="registro-peso-form" data-ejercicio="<?php echo htmlspecialchars($ejercicio['ejercicio']); ?>">
                        <div class="form-group">
                            <label for="peso_<?php echo md5($ejercicio['ejercicio']); ?>">Peso (kg)</label>
                            <input type="number" step="0.5" class="form-control" id="peso_<?php echo md5($ejercicio['ejercicio']); ?>" name="peso" required>
                        </div>
                        <div class="form-group">
                            <label for="repeticiones_<?php echo md5($ejercicio['ejercicio']); ?>">Repeticiones</label>
                            <input type="number" class="form-control" id="repeticiones_<?php echo md5($ejercicio['ejercicio']); ?>" name="repeticiones" value="<?php echo htmlspecialchars($ejercicio['repeticiones']); ?>" required>
                        </div>
                        <button type="submit" class="btn-primary">Guardar</button>
                    </form>

                    <div class="historial">
                        <h4>Último registro:</h4>
                        <div class="ultimo-registro" data-ejercicio="<?php echo htmlspecialchars($ejercicio['ejercicio']); ?>">
                            <p>Cargando...</p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div style="text-align: center; width: 100%; grid-column: 1/-1;">
                    <p style="color: white;">No hay ejercicios disponibles en este momento.</p>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Cargar últimos registros
        document.querySelectorAll('.ultimo-registro').forEach(function(div) {
            const ejercicio = div.dataset.ejercicio;
            cargarUltimoRegistro(ejercicio, div);
        });

        // Manejar envío de formularios
        document.querySelectorAll('.registro-peso-form').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const ejercicio = this.dataset.ejercicio;
                const peso = this.querySelector('input[name="peso"]').value;
                const repeticiones = this.querySelector('input[name="repeticiones"]').value;

                guardarRegistro(ejercicio, peso, repeticiones, this);
            });
        });
    });

    function guardarRegistro(ejercicio, peso, repeticiones, form) {
        console.log('Intentando guardar registro:', { ejercicio, peso, repeticiones });
        
        const formData = new FormData();
        formData.append('ejercicio', ejercicio);
        formData.append('peso', peso);
        formData.append('repeticiones', repeticiones);

        fetch('index.php?action=registro-peso/guardar', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            console.log('Respuesta del servidor:', response);
            return response.json();
        })
        .then(data => {
            console.log('Datos del servidor:', data);
            if (data.success) {
                alert('Registro guardado exitosamente');
                form.reset();
                // Añadir un pequeño retraso antes de cargar el último registro
                setTimeout(() => {
                    cargarUltimoRegistro(ejercicio, form.closest('.ejercicio-card').querySelector('.ultimo-registro'));
                }, 500);
            } else {
                alert('Error al guardar el registro: ' + (data.message || 'Error desconocido'));
            }
        })
        .catch(error => {
            console.error('Error en la petición:', error);
            alert('Error al guardar el registro');
        });
    }

    function cargarUltimoRegistro(ejercicio, div) {
        console.log('Cargando último registro para:', ejercicio);
        
        fetch(`index.php?action=registro-peso/historial&ejercicio=${encodeURIComponent(ejercicio)}`)
            .then(response => {
                console.log('Respuesta del historial:', response);
                return response.json();
            })
            .then(data => {
                console.log('Datos del historial:', data);
                if (data.success && data.data.length > 0) {
                    const ultimo = data.data[0];
                    div.innerHTML = `
                        <p>Peso: ${ultimo.peso} kg</p>
                        <p>Repeticiones: ${ultimo.repeticiones}</p>
                        <p>Fecha: ${new Date(ultimo.fecha).toLocaleString()}</p>
                    `;
                } else {
                    div.innerHTML = '<p>No hay registros previos</p>';
                }
            })
            .catch(error => {
                console.error('Error al cargar historial:', error);
                div.innerHTML = '<p>Error al cargar el historial</p>';
            });
    }
    </script>
</body>
</html> 