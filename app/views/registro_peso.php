<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Registro de Pesos</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/rutinas.css">
    <style>
        :root {
            --primary-dark: #23272b;
            --secondary-dark: #1a1a1a;
            --accent-yellow: #ffd600;
            --text-light: #fff;
        }
        .rutinas-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
            justify-content: center;
        }

        .rutina-card {
            background: #23272b;
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
            color: #fff;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ffd600;
            border-radius: 4px;
            background-color: #23272b;
            color: #fff;
        }

        .btn-primary {
            background: #23272b;
            color: #fff;
            border: 2px solid #ffd600;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .btn-primary:hover {
            background: #ffd600;
            color: #23272b;
        }

        .historial {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #ffd600;
            color: #fff;
        }

        .page-title {
            text-align: center;
            margin: 20px 0;
            color: #ffd600;
        }

        .ejercicios-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            padding: 24px;
        }

        .ejercicio-card {
            background: var(--primary-dark);
            border-radius: 16px;
            padding: 24px 20px 12px 20px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.15);
            border: 2px solid var(--accent-yellow);
            transition: box-shadow 0.2s, border 0.2s;
            cursor: pointer;
            position: relative;
        }

        .ejercicio-card:hover {
            box-shadow: 0 8px 24px rgba(0,0,0,0.25);
            border-color: #fff700;
        }

        .ejercicio-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
        }

        .ejercicio-header h3 {
            margin: 0 0 8px 0;
            color: var(--accent-yellow);
            font-size: 1.3em;
            font-weight: bold;
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

        .form-group label {
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

        .historial {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid var(--accent-yellow);
            color: var(--text-light);
        }

        .historial h4 {
            color: var(--accent-yellow);
            margin-bottom: 10px;
        }

        .ultimo-registro {
            color: #ccc;
        }

        .input-activo {
            border: 2px solid #ffd600 !important;
            background: #23272b !important;
            box-shadow: 0 0 8px #ffd60033;
        }

        .page-title {
            text-align: center;
            margin: 20px 0;
            color: var(--accent-yellow);
            font-size: 2.2em;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
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
        <h1 class="page-title" style="color: #ffd600;">Registro de Pesos</h1>
        
        <div class="ejercicios-grid">
            <?php if (!empty($ejercicios)): ?>
                <?php
                // Calcular el número de columnas de la cuadrícula
                $columnas = 4; // Ajustado a 4 columnas
                $contador = 0;
                ?>
                <?php foreach ($ejercicios as $ejercicio): ?>
                    <?php $fila = floor($contador / $columnas); ?>
                    <div class="ejercicio-card" data-fila="<?php echo $fila; ?>">
                        <div class="ejercicio-header">
                            <h3><?php echo htmlspecialchars($ejercicio['ejercicio']); ?></h3>
                        </div>
                        <div class="ejercicio-content">
                            <form class="registro-peso-form" data-ejercicio="<?php echo md5($ejercicio['ejercicio']); ?>">
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
                                <div class="ultimo-registro" data-ejercicio="<?php echo md5($ejercicio['ejercicio']); ?>">
                                    <p>Cargando...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $contador++; ?>
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

        // Manejar clic en las tarjetas de ejercicio
        document.querySelectorAll('.ejercicio-card').forEach(function(card) {
            card.addEventListener('click', function(e) {
                if (e.target.closest('.ejercicio-content')) {
                    return;
                }
                // Obtener la fila de la tarjeta clicada
                const fila = this.getAttribute('data-fila');
                // Verificar si alguna tarjeta de la fila está abierta
                const tarjetasFila = document.querySelectorAll('.ejercicio-card[data-fila="' + fila + '"] .ejercicio-content');
                const algunaAbierta = Array.from(tarjetasFila).some(content => content.classList.contains('show'));
                // Cerrar todas las tarjetas
                document.querySelectorAll('.ejercicio-content').forEach(function(content) {
                    content.classList.remove('show');
                });
                // Si ninguna tarjeta de la fila estaba abierta, abrir todas las tarjetas de la fila
                if (!algunaAbierta) {
                    tarjetasFila.forEach(function(content) {
                        content.classList.add('show');
                    });
                }
            });
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

        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                document.querySelectorAll('.form-control').forEach(i => i.classList.remove('input-activo'));
                this.classList.add('input-activo');
            });
            input.addEventListener('blur', function() {
                this.classList.remove('input-activo');
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