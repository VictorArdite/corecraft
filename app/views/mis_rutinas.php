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
                <img src="<?php echo BASE_URL; ?>/public/img/logo.jpg" alt="CoreCraft Logo">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php?action=home">Inicio</a></li>
                <li><a href="index.php?action=rutinas">Rutinas</a></li>
                <li><a href="index.php?action=mis-rutinas">Mis Rutinas</a></li>
                <li><a href="index.php?action=suplementacion">Suplementación</a></li>
                <li><a href="index.php?action=perfil">Perfil</a></li>
            </ul>
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
                    <p>No tienes rutinas personalizadas creadas.</p>
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