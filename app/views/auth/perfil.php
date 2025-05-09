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
            <div class="profile-info">x
                <div class="profile-header">
                    <div class="profile-avatar">
                        <img src="<?php echo BASE_URL; ?>/public/img/avatar-default.png" alt="Avatar">
                    </div>
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
                                    <div class="unlocked-icon">🔓</div>
                                <?php else: ?>
                                    <div class="locked-icon">🔒</div>
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