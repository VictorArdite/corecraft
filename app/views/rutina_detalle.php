<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Rutina</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Detalle de Rutina</h1>
        <nav>
            <ul>
                <li><a href="index.php?action=home">Inicio</a></li>
                <li><a href="index.php?action=rutinas">Rutinas</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php if ($rutina): ?>
            <h2><?= htmlspecialchars($rutina['nombre']) ?></h2>
            <p>Día: <?= htmlspecialchars($rutina['dia']) ?></p>
            <p>Ejercicio: <?= htmlspecialchars($rutina['ejercicio']) ?></p>
            <p>Series: <?= htmlspecialchars($rutina['series']) ?></p>
            <p>Repeticiones: <?= htmlspecialchars($rutina['repeticiones']) ?></p>
            <p>Descanso: <?= htmlspecialchars($rutina['descanso']) ?></p>
        <?php else: ?>
            <p>Rutina no encontrada.</p>
        <?php endif; ?>
    </main>
</body>
</html>