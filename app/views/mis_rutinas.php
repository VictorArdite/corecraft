<?php require_once __DIR__ . '/../../public/config/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Rutinas Personalizadas - CoreCraft</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/global.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/mis_rutinas.css">
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
            <div class="header-section">
                <h1>Mis Rutinas Personalizadas</h1>
                <a href="index.php?action=rutina-personalizada" class="btn-crear">Crear Nueva Rutina</a>
            </div>

            <?php if (empty($rutinas)): ?>
                <div class="no-rutinas">
                    <p>No tienes rutinas personalizadas creadas!.</p>
                    <a href="index.php?action=rutina-personalizada" class="btn-crear">Crear mi primera rutina</a>
                </div>
            <?php else: ?>
                <div class="rutinas-grid">
                    <?php foreach ($rutinas as $rutina): ?>
                        <div class="rutina-card">
                            <h2><?php echo htmlspecialchars($rutina['nombre']); ?></h2>
                            <p class="fecha">Creada el: <?php echo date('d/m/Y', strtotime($rutina['fecha_creacion'])); ?></p>
                            <?php if (!empty($rutina['descripcion'])): ?>
                                <p class="descripcion"><?php echo htmlspecialchars($rutina['descripcion']); ?></p>
                            <?php endif; ?>
                            <div class="ejercicios-count">
                                <span><?php echo count($rutina['ejercicios']); ?> ejercicios</span>
                            </div>
                            <div class="rutina-actions">
                                <a href="index.php?action=ver-rutina&id=<?php echo $rutina['id']; ?>" class="btn-ver">Ver Detalles</a>
                                <form action="index.php?action=borrar-rutina" method="POST" class="form-borrar" onsubmit="return confirmarBorrado()">
                                    <input type="hidden" name="rutina_id" value="<?php echo $rutina['id']; ?>">
                                    <button type="submit" class="btn-borrar">Borrar</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <script>
        function confirmarBorrado() {
            return confirm('¿Estás seguro de que deseas borrar esta rutina? Esta acción no se puede deshacer.');
        }
    </script>
</body>
</html> 