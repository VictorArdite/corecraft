<?php require_once __DIR__ . '/../../../public/config/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - CoreCraft</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/global.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/perfil.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-dark: #23272b;
            --secondary-dark: #1a1a1a;
            --accent-color: #ffd600;
            --text-light: #fff;
        }
        .btn-update {
            background-color: var(--accent-color);
            color: var(--primary-dark);
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            border: 2px solid var(--accent-color);
            font-size: 1em;
            box-shadow: 0 4px 15px rgba(255, 214, 0, 0.2);
            white-space: nowrap;
            width: 100%;
            text-align: center;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        .btn-update:hover {
            background-color: transparent;
            color: var(--accent-color);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 214, 0, 0.3);
        }
        .btn-icon {
            font-size: 1.2em;
            color: var(--primary-dark);
        }
        .btn-update:hover .btn-icon {
            color: var(--accent-color);
        }
        /* Asegurar que el color sea el mismo que el botón de cerrar sesión */
        .auth-button, .btn-update {
            background-color: var(--accent-color);
            color: var(--primary-dark);
        }
        .auth-button:hover, .btn-update:hover {
            background-color: transparent;
            color: var(--accent-color);
            border: 2px solid var(--accent-color);
        }
        /* Estilo específico para el botón de actualizar peso actual */
        .stat-card .btn-update {
            background-color: var(--accent-color);
            color: var(--primary-dark);
        }
        .stat-card .btn-update:hover {
            background-color: transparent;
            color: var(--accent-color);
        }
        .profile-avatar {
            width: 120px;
            height: 120px;
            margin-right: 20px;
        }
        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .stat-icon {
            font-size: 1.75rem;
            margin-right: 1rem;
            background: linear-gradient(135deg, #ffd600, #ffed4a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            padding: 0.5rem;
            border-radius: 8px;
            background-color: rgba(255, 214, 0, 0.1);
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

    <div class="container">
        <div class="profile-container">
            <div class="profile-info">
                <div class="profile-header">
                    <div class="profile-details">
                        <h2><?php echo htmlspecialchars($user['nombre']); ?></h2>
                        <p class="email"><?php echo htmlspecialchars($user['email']); ?></p>
                    </div>
                </div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">⚖️</div>
                        <div class="stat-info">
                            <h3>Peso Actual</h3>
                            <p class="stat-value"><?php echo htmlspecialchars($user['peso'] ?? 'No registrado'); ?> kg</p>
                            <form action="index.php?action=actualizarPesoObjetivo" method="POST" class="mt-3">
                                <div class="form-group">
                                    <input type="number" 
                                           name="peso_actual" 
                                           class="form-control" 
                                           step="0.1" 
                                           min="0" 
                                           placeholder="Nuevo peso actual"
                                           required>
                                </div>
                                <button type="submit" class="btn-update">
                                    <span class="btn-icon">🔄</span>
                                    <span class="btn-text">Actualizar</span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">🎯</div>
                        <div class="stat-info">
                            <h3>Peso Objetivo</h3>
                            <p class="stat-value"><?php echo htmlspecialchars($user['peso_objetivo'] ?? 'No establecido'); ?> kg</p>
                            <form action="index.php?action=actualizarPesoObjetivo" method="POST" class="mt-3">
                                <div class="form-group">
                                    <input type="number" 
                                           name="peso_objetivo" 
                                           class="form-control" 
                                           step="0.1" 
                                           min="0" 
                                           placeholder="Nuevo peso objetivo"
                                           required>
                                </div>
                                <button type="submit" class="btn-update">
                                    <span class="btn-icon">🔄</span>
                                    <span class="btn-text">Actualizar</span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">🎯</div>
                        <div class="stat-info">
                            <h3>Objetivo a Cumplir</h3>
                            <p class="stat-value"><?php echo ucwords(str_replace('_', ' ', $user['objetivo'] ?? 'No establecido')); ?></p>
                            <form action="index.php?action=actualizarPesoObjetivo" method="POST" class="mt-3">
                                <div class="form-group">
                                    <select name="objetivo" class="form-control" required>
                                        <option value="perder peso" <?php echo ($user['objetivo'] ?? '') == 'perder_peso' ? 'selected' : ''; ?>>Perder Peso</option>
                                        <option value="ganar masa muscular" <?php echo ($user['objetivo'] ?? '') == 'ganar_masa_muscular' ? 'selected' : ''; ?>>Ganar Masa Muscular</option>
                                        <option value="mejorar resistencia" <?php echo ($user['objetivo'] ?? '') == 'mejorar_resistencia' ? 'selected' : ''; ?>>Mejorar Resistencia</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn-update">
                                    <span class="btn-icon">🔄</span>
                                    <span class="btn-text">Actualizar</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">🏆</div>
                        <div class="stat-info">
                            <h3>Puntos Totales</h3>
                            <p><?php echo isset($puntos) ? $puntos . ' pts' : '0 pts'; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="achievements-section">
                <h2>Mis Logros</h2>
                <div class="achievements-grid">
                    <?php foreach ($logros as $logro): ?>
                        <div class="achievement-card <?php echo isset($logro['fecha_obtencion']) ? 'obtained' : 'locked'; ?>">
                            <div class="achievement-icon">
                                <?php if (isset($logro['fecha_obtencion'])): ?>
                                    <img src="<?php echo BASE_URL . '/public/img/logros/medalla_oro.png'; ?>" alt="Medalla de oro" style="width:48px;height:48px;filter:none;">
                                <?php else: ?>
                                    <img src="<?php echo BASE_URL . '/public/img/logros/medalla_gris.png'; ?>" alt="Medalla gris" style="width:48px;height:48px;filter:none;">
                                <?php endif; ?>
                            </div>
                            <div class="achievement-info">
                                <h3><?php echo htmlspecialchars($logro['nombre']); ?></h3>
                                <p><?php echo htmlspecialchars($logro['descripcion']); ?></p>
                                <div class="achievement-meta">
                                    <span class="points"><?php echo $logro['puntos']; ?> pts</span>
                                    <?php if (isset($logro['fecha_obtencion'])): ?>
                                        <img src="<?php echo BASE_URL . '/public/img/logros/medalla_oro.png'; ?>" alt="<?php echo htmlspecialchars($logro['nombre']); ?>" style="width:48px;height:48px;filter:none;">
                                    <?php else: ?>
                                        <img src="<?php echo BASE_URL . '/public/img/logros/medalla_gris.png'; ?>" alt="<?php echo htmlspecialchars($logro['nombre']); ?>" style="width:48px;height:48px;filter:none;">
                                    <?php endif; ?>
                                </div>
                                <div class="achievement-info">
                                    <h3><?php echo htmlspecialchars($logro['nombre']); ?></h3>
                                    <p><?php echo htmlspecialchars($logro['descripcion']); ?></p>
                                    <div class="achievement-meta">
                                        <span class="points"><?php echo $logro['puntos']; ?> pts</span>
                                        <?php if (isset($logro['fecha_obtencion'])): ?>
                                            <span class="date"><?php echo date('d/m/Y', strtotime($logro['fecha_obtencion'])); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="no-achievements">
                            <p>No tienes logros todavía. ¡Comienza a entrenar para desbloquearlos!</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Animación suave al cargar los logros
        document.addEventListener('DOMContentLoaded', function() {
            const achievements = document.querySelectorAll('.achievement-card');
            achievements.forEach((achievement, index) => {
                setTimeout(() => {
                    achievement.style.opacity = '1';
                    achievement.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</body>
</html>