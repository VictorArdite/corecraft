<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Rutinas</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/rutinas.css">
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
        <div class="crear-rutina-container">
            <a href="index.php?action=rutina-personalizada" class="btn-crear-rutina">
                Crear Rutina Personalizada
            </a>
        </div>
        <section class="rutinas-container">
            <?php foreach ($rutinas as $index => $nombre): ?>
                <div class="rutina-card">
                    <a href="index.php?action=verRutinaPorNombre&nombre=<?= urlencode($nombre) ?>">
                        <img src="img/<?= $index + 1 ?>.png" alt="Rutina <?= htmlspecialchars($nombre) ?>">
                        <h3><?= htmlspecialchars($nombre) ?></h3>
                    </a>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
</body>
</html>