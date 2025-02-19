<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Detalle de Rutina</title>
    <link rel="stylesheet" href="css/global.css"> <!-- Estilos globales -->
    <link rel="stylesheet" href="css/rutina_detalle.css"> <!-- Estilos específicos -->
</head>
<body>
    <header>
        <h1>Detalle de Rutina - <?= htmlspecialchars($_GET['nombre']) ?></h1>
        <nav>
            <ul>
                <li><a href="index.php?action=home">Inicio</a></li>
                <li><a href="index.php?action=login">Iniciar Sesión</a></li>
                <li><a href="index.php?action=register">Registrarse</a></li>
                <li><a href="index.php?action=rutinas">Rutinas</a></li>
                <li><a href="index.php?action=suplementacion">Suplementación</a></li>
                <li><a href="index.php?action=perfil">Perfil</a></li> <!-- Nuevo enlace -->
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <?php if ($rutina): ?>
                <?php foreach ($rutina as $dia => $ejercicios): ?>
                    <div class="rutina">
                        <h2>Día <?= htmlspecialchars($dia) ?></h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>EJERCICIO</th>
                                    <th>SERIES</th>
                                    <th>REPETICIONES</th>
                                    <th>DESCANSO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ejercicios as $ejercicio): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($ejercicio['ejercicio']) ?></td>
                                        <td><?= htmlspecialchars($ejercicio['series']) ?></td>
                                        <td><?= htmlspecialchars($ejercicio['repeticiones']) ?></td>
                                        <td><?= htmlspecialchars($ejercicio['descanso']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Rutina no encontrada.</p>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>