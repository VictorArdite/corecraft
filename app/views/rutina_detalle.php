<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Detalle de Rutina</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Ruta correcta al archivo CSS -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 10px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
        }
        main {
            padding: 100px 20px 20px 20px; /* Ajustar el padding superior para evitar que el contenido se oculte detrás del header */
        }
        section {
            max-width: 1200px; /* Aumentar el ancho máximo */
            margin: 0 auto; /* Centrar el contenido */
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            table-layout: fixed; /* Ajustar el ancho de las columnas */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            word-wrap: break-word; /* Ajustar el contenido de las celdas */
        }
        th {
            background-color: #f2f2f2;
        }
        .dia {
            margin-top: 20px;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
            z-index: 1000;
        }
    </style>
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
                <li><a href="index.php?action=suplementacion">Suplementación</a></li> <!-- Nuevo enlace -->
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <?php if ($rutina): ?>
                <?php foreach ($rutina as $dia => $ejercicios): ?>
                    <div class="dia">
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
    <footer>
        <p>&copy; 2025 CoreCraft</p>
    </footer>
</body>
</html>