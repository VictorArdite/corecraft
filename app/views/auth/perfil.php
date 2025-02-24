<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Perfil</title>
    <link rel="stylesheet" href="css/global.css"> <!-- Estilos globales -->
    <link rel="stylesheet" href="css/perfil.css"> <!-- Estilos específicos -->
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php?action=home">
                <img src="img/logo.jpg" alt="CoreCraft Logo"> <!-- Asegúrate de que la ruta de la imagen sea correcta -->
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php?action=home">Inicio</a></li>
                <li><a href="index.php?action=logout">Cerrar Sesión</a></li>
                <li><a href="index.php?action=rutinas">Rutinas</a></li>
                <li><a href="index.php?action=suplementacion">Suplementación</a></li>
                <li><a href="index.php?action=perfil">Perfil</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="profile-header">
            <h2><?= htmlspecialchars($user['nombre']) ?></h2>
        </div>
        <div class="profile-container">
            <div class="profile-details">
                <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                <p><strong>Edad:</strong> <?= htmlspecialchars($user['edad']) ?></p>
                <p><strong>Peso:</strong> <?= htmlspecialchars($user['peso']) ?> kg</p>
                <p><strong>Altura:</strong> <?= htmlspecialchars($user['altura']) ?> cm</p>
                <p><strong>Objetivo:</strong> <?= htmlspecialchars($user['objetivo']) ?></p>
                <!-- Añadir más detalles del perfil aquí -->
            </div>
            <div class="profile-actions">
                <button>Editar Perfil</button>
                <button>Cambiar Contraseña</button>
                <a href="index.php?action=logout"><button>Cerrar Sesión</button></a>
            </div>
        </div>
        <div class="achievements-container">
            <h3>Logros</h3>
            <div class="achievements-list">
                <?php if (!empty($logros)): ?>
                    <?php foreach ($logros as $logro): ?>
                        <div class="achievement">
                            <img src="<?= htmlspecialchars($logro['icono']) ?>" alt="<?= htmlspecialchars($logro['nombre']) ?>">
                            <p><strong><?= htmlspecialchars($logro['nombre']) ?></strong></p>
                            <p><?= htmlspecialchars($logro['descripcion']) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No has obtenido ningún logro todavía.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>
</html>