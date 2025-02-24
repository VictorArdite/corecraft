<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Rutinas</title>
    <link rel="stylesheet" href="css/global.css"> <!-- Estilos globales -->
    <link rel="stylesheet" href="css/rutinas.css"> <!-- Estilos específicos -->
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
                <li><a href="index.php?action=suplementacion">Suplementación</a></li>
                <li><a href="index.php?action=perfil">Perfil</a></li>
            </ul>
        </nav>
    </header>
    <main>
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
    <footer>
        <p>&copy; 2025 CoreCraft</p>
    </footer>
</body>
</html>