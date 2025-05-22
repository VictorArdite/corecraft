<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Calendario de Entrenamientos</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/rutinas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-dark: #23272b;
            --secondary-dark: #1a1a1a;
            --accent-yellow: #ffd600;
            --text-light: #fff;
            --border-color: #ffd600;
        }
        body {
            background: #23272b;
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .main-content {
            min-height: calc(100vh - 100px);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }
        .content-wrapper {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }
        .page-title {
            text-align: center;
            color: var(--accent-yellow);
            margin-bottom: 30px;
            font-size: 2.5em;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            position: relative;
            padding-bottom: 15px;
        }
        .page-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--accent-yellow), transparent);
        }
        .calendar-container {
            background: var(--primary-dark);
            border-radius: 16px;
            padding: 30px;
            margin: 20px auto;
            max-width: 900px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            border: 2px solid var(--accent-yellow);
            transition: transform 0.3s ease;
        }
        .calendar-container:hover {
            transform: translateY(-5px);
        }
        .calendar-header {
            margin-bottom: 30px;
        }
        .calendar-navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background: var(--secondary-dark);
            color: var(--accent-yellow);
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            position: relative;
            overflow: hidden;
            border: 1.5px solid var(--accent-yellow);
        }
        .calendar-navigation h2 {
            margin: 0;
            font-size: 1.5em;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
            color: var(--accent-yellow);
        }
        .nav-button {
            background: transparent;
            border: 2px solid var(--accent-yellow);
            color: var(--accent-yellow);
            font-size: 1.2em;
            cursor: pointer;
            padding: 12px 20px;
            border-radius: 10px;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        .nav-button:hover {
            background: var(--accent-yellow);
            color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .calendar-grid {
            background: var(--secondary-dark);
            border-radius: 12px;
            overflow: hidden;
            border: 1.5px solid var(--accent-yellow);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .weekdays {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            background: var(--primary-dark);
            color: var(--accent-yellow);
            padding: 15px;
            text-align: center;
            font-weight: bold;
            font-size: 1.1em;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
        }
        .days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            padding: 15px;
            background: var(--secondary-dark);
        }
        .day {
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            border: 1.5px solid var(--accent-yellow);
            position: relative;
            font-weight: bold;
            background: var(--primary-dark);
            color: var(--text-light);
            min-height: 50px;
            font-size: 1.1em;
            overflow: hidden;
        }
        .day:hover {
            background: var(--accent-yellow);
            color: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-color: var(--accent-yellow);
        }
        .day.empty {
            background: var(--secondary-dark);
            cursor: default;
            border: none;
        }
        .day.training {
            color: var(--accent-yellow);
            background: #333;
        }
        .day.fuerza {
            background: #b71c1c;
        }
        .day.cardio {
            background: #388e3c;
        }
        .day.flexibilidad {
            background: #1976d2;
        }
        .day.descanso {
            background: #616161;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 1000;
            background: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background: var(--primary-dark);
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            margin: 0;
            position: relative;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            animation: modalSlideIn 0.3s ease-out;
            overflow: hidden;
            border: 2px solid var(--accent-yellow);
            display: flex;
            flex-direction: column;
        }
        @keyframes modalSlideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        .modal-header {
            padding: 20px;
            border-bottom: 2px solid var(--accent-yellow);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--secondary-dark);
            color: var(--accent-yellow);
            position: relative;
        }
        .modal-header h3 {
            margin: 0;
            font-size: 1.5em;
            color: var(--accent-yellow);
        }
        .modal-body {
            padding: 25px;
            background: var(--primary-dark);
            color: var(--text-light);
            flex-grow: 1;
        }
        .modal-footer {
            padding: 20px;
            border-top: 2px solid var(--accent-yellow);
            background: var(--secondary-dark);
            display: flex;
            justify-content: center;
            gap: 0;
            align-items: center;
            flex-wrap: nowrap;
        }
        .modal-footer .button {
            margin: 0 10px;
        }
        .modal-footer .button:first-child {
            margin-left: 0;
        }
        .modal-footer .button:last-child {
            margin-right: 0;
        }
        .form-group label {
            color: var(--accent-yellow);
            font-weight: bold;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1.5px solid var(--accent-yellow);
            border-radius: 10px;
            background: var(--secondary-dark);
            color: var(--text-light);
            font-size: 1em;
            transition: all 0.3s;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--accent-yellow);
            box-shadow: 0 0 0 3px rgba(255, 214, 0, 0.1);
            transform: translateY(-2px);
        }
        .close-modal {
            cursor: pointer;
            font-size: 1.8em;
            color: var(--accent-yellow);
            opacity: 0.8;
            transition: all 0.3s;
            background: none;
            border: none;
            padding: 5px;
        }
        .close-modal:hover {
            opacity: 1;
            transform: scale(1.1) rotate(90deg);
        }
        .button {
            padding: 8px 14px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
            min-width: 90px;
            text-align: center;
            font-size: 0.85em;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 36px;
            margin: 0;
        }
        .button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .button.primary {
            background: var(--accent-yellow);
            color: var(--primary-dark);
        }
        .button.primary:hover {
            background: #fff;
            color: var(--primary-dark);
        }
        .button.secondary {
            background: var(--secondary-dark);
            color: var(--accent-yellow);
            border: 1.5px solid var(--accent-yellow);
            min-width: 90px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .button.secondary:hover {
            background: var(--accent-yellow);
            color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .button.danger {
            background: #dc3545;
            color: white;
            border: none;
            min-width: 90px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .button.danger:hover {
            background: #c82333;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        @media (max-width: 768px) {
            .calendar-container {
                padding: 15px;
                margin: 10px;
            }
            .day {
                font-size: 0.9em;
                min-height: 40px;
            }
            .modal-content {
                width: 95%;
                margin: 20px auto;
            }
            .page-title {
                font-size: 2em;
            }
            .nav-button {
                padding: 8px 15px;
            }
            .modal-footer {
                flex-direction: column;
                gap: 10px;
                padding: 15px;
                width: 100%;
                justify-content: center;
                align-items: stretch;
            }
            .modal-footer .button {
                margin: 0 0 10px 0;
            }
            .modal-footer .button:last-child {
                margin-bottom: 0;
            }
            .button {
                width: 100%;
                min-width: unset;
                padding: 8px 14px;
                font-size: 0.8em;
                height: 34px;
            }
            .button.danger,
            .button.secondary {
                height: 34px;
                font-size: 0.8em;
                padding: 8px 14px;
            }
            .modal-body {
                padding: 15px;
            }
            .form-group {
                margin-bottom: 15px;
            }
            .form-group input,
            .form-group select,
            .form-group textarea {
                padding: 10px;
                font-size: 0.9em;
            }
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--accent-yellow);
            font-weight: bold;
            font-size: 0.95em;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1.5px solid var(--accent-yellow);
            border-radius: 10px;
            background: var(--secondary-dark);
            color: var(--text-light);
            font-size: 1em;
            transition: all 0.3s;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--accent-yellow);
            box-shadow: 0 0 0 3px rgba(255, 214, 0, 0.1);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <?php
    // Definir los meses en español
    $meses = [
        1 => 'Enero',
        2 => 'Febrero',
        3 => 'Marzo',
        4 => 'Abril',
        5 => 'Mayo',
        6 => 'Junio',
        7 => 'Julio',
        8 => 'Agosto',
        9 => 'Septiembre',
        10 => 'Octubre',
        11 => 'Noviembre',
        12 => 'Diciembre'
    ];

    // Definir los tipos de entrenamiento
    $tipos_entrenamiento = [
        'fuerza' => 'Fuerza',
        'cardio' => 'Cardio',
        'flexibilidad' => 'Flexibilidad',
        'descanso' => 'Descanso'
    ];

    // Obtener el mes y año actual
    $mes_actual = isset($_GET['mes']) ? (int)$_GET['mes'] : (int)date('n');
    $anio_actual = isset($_GET['anio']) ? (int)$_GET['anio'] : (int)date('Y');

    // Calcular el primer día del mes
    $primer_dia = date('N', strtotime("$anio_actual-$mes_actual-01"));
    $dias_en_mes = date('t', strtotime("$anio_actual-$mes_actual-01"));

    // Calcular el mes anterior y siguiente
    $mes_anterior = $mes_actual - 1;
    $anio_anterior = $anio_actual;
    if ($mes_anterior < 1) {
        $mes_anterior = 12;
        $anio_anterior--;
    }

    $mes_siguiente = $mes_actual + 1;
    $anio_siguiente = $anio_actual;
    if ($mes_siguiente > 12) {
        $mes_siguiente = 1;
        $anio_siguiente++;
    }
    ?>
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

    <main class="main-content">
        <div class="content-wrapper">
            <h1 class="page-title">Calendario de Entrenamiento</h1>
            
            <div class="calendar-container">
                <div class="calendar-header">
                    <div class="calendar-navigation">
                        <a href="?action=calendario&mes=<?php echo $mes_anterior; ?>&anio=<?php echo $anio_anterior; ?>" 
                           class="nav-button">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <h2><?php echo $meses[$mes_actual] . ' ' . $anio_actual; ?></h2>
                        <a href="?action=calendario&mes=<?php echo $mes_siguiente; ?>&anio=<?php echo $anio_siguiente; ?>" 
                           class="nav-button">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>

                <div class="calendar-grid">
                    <div class="weekdays">
                        <div>Lun</div>
                        <div>Mar</div>
                        <div>Mié</div>
                        <div>Jue</div>
                        <div>Vie</div>
                        <div>Sáb</div>
                        <div>Dom</div>
                    </div>
                    <div class="days">
                        <?php
                        // Espacios vacíos para el primer día
                        for ($i = 1; $i < $primer_dia; $i++) {
                            echo '<div class="day empty"></div>';
                        }

                        // Días del mes
                        for ($dia = 1; $dia <= $dias_en_mes; $dia++) {
                            $fecha_actual = date('Y-m-d', mktime(0, 0, 0, $mes_actual, $dia, $anio_actual));
                            $clase = 'day';
                            $data_attr = "data-fecha='$fecha_actual'";
                            
                            // Buscar si hay entrenamiento para este día
                            foreach ($dias_entrenamiento as $entrenamiento) {
                                if ($entrenamiento['fecha'] === $fecha_actual) {
                                    $clase .= ' training ' . $entrenamiento['tipo_entrenamiento'];
                                    $data_attr .= " data-tipo='" . $entrenamiento['tipo_entrenamiento'] . "'";
                                    $data_attr .= " data-duracion='" . $entrenamiento['duracion'] . "'";
                                    $data_attr .= " data-notas='" . htmlspecialchars($entrenamiento['notas']) . "'";
                                    break;
                                }
                            }
                            
                            $icono = '';
                            if (strpos($clase, 'descanso') !== false) {
                                $icono = "<img src='img/cama.png' alt='Descanso' style='width:22px;height:22px;display:block;margin:auto;'>";
                            } elseif (strpos($clase, 'fuerza') !== false) {
                                $icono = "<img src='img/fuerza.png' alt='Fuerza' style='width:22px;height:22px;display:block;margin:auto;'>";
                            } elseif (strpos($clase, 'cardio') !== false) {
                                $icono = "<img src='img/correr.png' alt='Cardio' style='width:22px;height:22px;display:block;margin:auto;'>";
                            } elseif (strpos($clase, 'flexibilidad') !== false) {
                                $icono = "<img src='img/flexibilidad.png' alt='Flexibilidad' style='width:22px;height:22px;display:block;margin:auto;'>";
                            }
                            echo "<div class='$clase' $data_attr>
                                    <div style='display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%;'>
                                        <span>$dia</span>
                                        $icono
                                    </div>
                                  </div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal para detalles del entrenamiento -->
    <div class="modal" id="entrenamientoModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Detalles del Entrenamiento</h3>
                <span class="close-modal">&times;</span>
            </div>
            <div class="modal-body">
                <form id="entrenamientoForm">
                    <div class="form-group">
                        <label for="tipo_entrenamiento">Tipo de Entrenamiento</label>
                        <select id="tipo_entrenamiento" name="tipo_entrenamiento">
                            <?php foreach ($tipos_entrenamiento as $valor => $texto): ?>
                                <option value="<?php echo $valor; ?>"><?php echo $texto; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="duracion">Duración (minutos)</label>
                        <input type="number" id="duracion" name="duracion" value="60" min="0">
                    </div>
                    <div class="form-group">
                        <label for="notas">Notas</label>
                        <textarea id="notas" name="notas" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="button secondary" onclick="closeModal()">Cancelar</button>
                <button type="button" class="button danger" id="borrarEntrenamiento" style="display: none;">Borrar</button>
                <button type="button" class="button primary" id="guardarEntrenamiento">Guardar</button>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('entrenamientoModal');
        const form = document.getElementById('entrenamientoForm');
        const btnBorrar = document.getElementById('borrarEntrenamiento');
        let diaSeleccionado = null;

        // Función para abrir el modal
        function openModal() {
            modal.style.display = 'flex';
        }

        // Función para cerrar el modal
        window.closeModal = function() {
            modal.style.display = 'none';
            form.reset();
            btnBorrar.style.display = 'none';
        }

        // Cerrar modal al hacer clic fuera de él
        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        }

        // Cerrar modal con el botón X
        document.querySelector('.close-modal').onclick = closeModal;

        document.querySelectorAll('.day:not(.empty)').forEach(day => {
            day.addEventListener('click', function() {
                diaSeleccionado = this;
                const fecha = this.dataset.fecha;
                const tipo = this.dataset.tipo || 'fuerza';
                const duracion = this.dataset.duracion || '60';
                const notas = this.dataset.notas || '';

                document.getElementById('tipo_entrenamiento').value = tipo;
                document.getElementById('duracion').value = duracion;
                document.getElementById('notas').value = notas;

                // Mostrar u ocultar el botón de borrar según si hay entrenamiento
                btnBorrar.style.display = this.classList.contains('training') ? 'inline-block' : 'none';

                openModal();
            });
        });

        // Función para guardar entrenamiento
        document.getElementById('guardarEntrenamiento').addEventListener('click', function() {
            const formData = new FormData(form);
            formData.append('fecha', diaSeleccionado.dataset.fecha);

            fetch('index.php?action=toggleDia', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const tipo = formData.get('tipo_entrenamiento');
                    diaSeleccionado.className = 'day training ' + tipo;
                    diaSeleccionado.dataset.tipo = tipo;
                    diaSeleccionado.dataset.duracion = formData.get('duracion');
                    diaSeleccionado.dataset.notas = formData.get('notas');

                    // Eliminar icono anterior
                    diaSeleccionado.innerHTML = '';
                    // Añadir número y el icono correspondiente
                    let icono = '';
                    if (tipo === 'descanso') {
                        icono = "<img src='img/cama.png' alt='Descanso' style='width:22px;height:22px;display:block;margin:auto;'>";
                    } else if (tipo === 'fuerza') {
                        icono = "<img src='img/fuerza.png' alt='Fuerza' style='width:22px;height:22px;display:block;margin:auto;'>";
                    } else if (tipo === 'cardio') {
                        icono = "<img src='img/correr.png' alt='Cardio' style='width:22px;height:22px;display:block;margin:auto;'>";
                    } else if (tipo === 'flexibilidad') {
                        icono = "<img src='img/flexibilidad.png' alt='Flexibilidad' style='width:22px;height:22px;display:block;margin:auto;'>";
                    }
                    diaSeleccionado.innerHTML = `<div style='display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%;'><span>${diaSeleccionado.dataset.fecha.split('-')[2].replace(/^0/, '')}</span>${icono}</div>`;
                    closeModal();
                } else {
                    alert('Error al guardar el entrenamiento');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al conectar con el servidor');
            });
        });

        // Actualizar el día al borrar entrenamiento
        btnBorrar.addEventListener('click', function() {
            if (confirm('¿Estás seguro de que deseas borrar este entrenamiento?')) {
                const formData = new FormData();
                formData.append('fecha', diaSeleccionado.dataset.fecha);

                fetch('index.php?action=toggleDia', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        diaSeleccionado.className = 'day';
                        diaSeleccionado.removeAttribute('data-tipo');
                        diaSeleccionado.removeAttribute('data-duracion');
                        diaSeleccionado.removeAttribute('data-notas');
                        // Eliminar icono y dejar solo el número
                        diaSeleccionado.innerHTML = `<div style='display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%;'><span>${diaSeleccionado.dataset.fecha.split('-')[2].replace(/^0/, '')}</span></div>`;
                        closeModal();
                    } else {
                        alert('Error al borrar el entrenamiento');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al conectar con el servidor');
                });
            }
        });
    });
    </script>
</body>
</html> 
