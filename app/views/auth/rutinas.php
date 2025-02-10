<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Rutinas</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Ruta correcta al archivo CSS -->
</head>
<body>
    <header>
        <h1>Lista de Rutinas</h1>
        <nav>
            <ul>
                <li><a href="index.php?action=home">Inicio</a></li>
                <li><a href="index.php?action=login">Iniciar Sesión</a></li>
                <li><a href="index.php?action=register">Registrarse</a></li>
                <li><a href="index.php?action=rutinas">Rutinas</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <ul>
                <?php foreach ($rutinas as $rutina): ?>
                    <li>
                        <a href="index.php?action=verRutina&id=<?= $rutina['id'] ?>">
                            <?= htmlspecialchars($rutina['nombre']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 CoreCraft</p>
    </footer>
</body>
</html>