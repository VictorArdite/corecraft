<?php require_once __DIR__ . '/../../public/config/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - <?php echo htmlspecialchars($rutina['nombre']); ?></title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/ver_rutina.css">
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
            <div class="rutina-header">
                <h1><?php echo htmlspecialchars($rutina['nombre']); ?></h1>
                <div class="meta-info">
                    <span class="fecha">Creada el <?php echo date('d/m/Y', strtotime($rutina['fecha_creacion'])); ?></span>
                </div>
            </div>

            <?php if ($rutina['descripcion']): ?>
                <div class="descripcion">
                    <h2>Descripción</h2>
                    <p><?php echo nl2br(htmlspecialchars($rutina['descripcion'])); ?></p>
                </div>
            <?php endif; ?>

            <div class="ejercicios-section">
                <h2>Ejercicios</h2>
                <div class="ejercicios-grid">
                    <?php foreach ($ejercicios as $ejercicio): ?>
                        <div class="ejercicio-card">
                            <div class="ejercicio-header">
                                <h3><?php echo htmlspecialchars($ejercicio['nombre']); ?></h3>
                                <span class="grupo-muscular"><?php echo htmlspecialchars($ejercicio['grupo_muscular']); ?></span>
                            </div>
                            <?php if ($ejercicio['descripcion']): ?>
                                <p class="descripcion"><?php echo htmlspecialchars($ejercicio['descripcion']); ?></p>
                            <?php endif; ?>
                            <div class="ejercicio-stats">
                                <div class="stat">
                                    <span class="label">Series:</span>
                                    <span class="value"><?php echo $ejercicio['series']; ?></span>
                                </div>
                                <div class="stat">
                                    <span class="label">Repeticiones:</span>
                                    <span class="value"><?php echo $ejercicio['repeticiones']; ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="actions">
                <a href="index.php?action=mis-rutinas" class="btn-volver">Volver a Mis Rutinas</a>
            </div>
        </div>
    </main>
</body>
</html> 