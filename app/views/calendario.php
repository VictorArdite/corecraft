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
            --primary-color: #142e52;
            --primary-dark: #0e2238;
            --secondary-color: #6c757d;
            --success-color: #28a745;
            --danger-color: #dc3545;
            --info-color: #17a2b8;
            --warning-color: #ffc107;
        }

        body {
            background: linear-gradient(135deg, #1a1a1c 0%, #2c2c2e 100%);
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

        .main-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('img/pattern.png') repeat;
            opacity: 0.05;
            z-index: 0;
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
            color: white;
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
            background: linear-gradient(90deg, transparent, var(--primary-color), transparent);
        }

        .calendar-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 30px;
            margin: 20px auto;
            max-width: 900px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
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
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            position: relative;
            overflow: hidden;
        }

        .calendar-navigation::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .calendar-navigation h2 {
            margin: 0;
            font-size: 1.5em;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
            position: relative;
        }

        .nav-button {
            background: rgba(255,255,255,0.1);
            border: none;
            color: white;
            font-size: 1.2em;
            cursor: pointer;
            padding: 12px 20px;
            border-radius: 10px;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .nav-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.2), transparent);
            transform: translateX(-100%);
            transition: transform 0.3s;
        }

        .nav-button:hover::before {
            transform: translateX(100%);
        }

        .nav-button:hover {
            background: rgba(255,255,255,0.2);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .calendar-grid {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid rgba(0,0,0,0.1);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .weekdays {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 15px;
            text-align: center;
            font-weight: bold;
            font-size: 1.1em;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
        }

        .weekdays::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.5), transparent);
        }

        .days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            padding: 15px;
            background: white;
        }

        .day {
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            border: 1px solid rgba(0,0,0,0.1);
            position: relative;
            font-weight: bold;
            background: white;
            color: #333;
            min-height: 50px;
            font-size: 1.1em;
            overflow: hidden;
        }

        .day::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(0,0,0,0.05), transparent);
            transition: transform 0.3s;
        }

        .day:hover::before {
            transform: translateX(100%);
        }

        .day:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-color: var(--primary-color);
        }

        .day.empty {
            background: #f8f9fa;
            cursor: default;
            border: none;
        }

        .day.training {
            color: white;
            position: relative;
            overflow: hidden;
        }

        .day.training::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.2), transparent);
            animation: shine 2s infinite;
        }

        .day.fuerza {
            background: linear-gradient(135deg, var(--danger-color) 0%, #c82333 100%);
        }

        .day.cardio {
            background: linear-gradient(135deg, var(--success-color) 0%, #218838 100%);
        }

        .day.flexibilidad {
            background: linear-gradient(135deg, var(--info-color) 0%, #138496 100%);
        }

        .day.descanso {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #5a6268 100%);
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.7);
            z-index: 1000;
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background: white;
            border-radius: 20px;
            width: 90%;
            max-width: 500px;
            margin: 50px auto;
            position: relative;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            animation: modalSlideIn 0.3s ease-out;
            overflow: hidden;
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
            border-bottom: 1px solid rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .modal-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            animation: shine 3s infinite;
        }

        .modal-body {
            padding: 25px;
            background: white;
        }

        .modal-footer {
            padding: 20px;
            border-top: 1px solid rgba(0,0,0,0.1);
            text-align: right;
            background: #f8f9fa;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
            font-size: 1.1em;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid rgba(0,0,0,0.1);
            border-radius: 10px;
            background: white;
            color: #333;
            font-size: 1em;
            transition: all 0.3s;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(20, 46, 82, 0.1);
            transform: translateY(-2px);
        }

        .close-modal {
            cursor: pointer;
            font-size: 1.8em;
            color: white;
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
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin-left: 15px;
            font-weight: bold;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        .button::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.2), transparent);
            transform: translateX(-100%);
            transition: transform 0.3s;
        }

        .button:hover::before {
            transform: translateX(100%);
        }

        .button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .button.primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
        }

        .button.secondary {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #5a6268 100%);
            color: white;
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
        }

        /* Hover amarillo en los enlaces del header */
        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1em;
            transition: color 0.3s ease;
        }
        nav ul li a:hover, nav ul li a.active {
            color: #ffd600;
        }

        /* Botón de cerrar sesión igual que home */
        .auth-buttons {
            display: flex;
            gap: 10px;
        }
        .auth-button {
            padding: 12px 25px;
            background-color: #ffd600;
            color: #111;
            font-size: 1em;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease, color 0.3s ease;
            border: none;
            display: inline-block;
            white-space: nowrap;
            box-shadow: 0 2px 8px rgba(255,214,0,0.10);
        }
        .auth-button:hover {
            background-color: #fff;
            color: #ffd600;
        }

        /* Título en amarillo */
        .page-title {
            color: #ffd600 !important;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5em;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            position: relative;
            padding-bottom: 15px;
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
                            
                            echo "<div class='$clase' $data_attr>$dia</div>";
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
                <button type="button" class="button primary" id="guardarEntrenamiento">Guardar</button>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('entrenamientoModal');
        const form = document.getElementById('entrenamientoForm');
        let diaSeleccionado = null;

        // Función para abrir el modal
        function openModal() {
            modal.style.display = 'block';
        }

        // Función para cerrar el modal
        window.closeModal = function() {
            modal.style.display = 'none';
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

                openModal();
            });
        });

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
    });
    </script>
</body>
</html> 