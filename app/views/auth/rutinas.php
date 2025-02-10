<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Rutinas</title>
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
            padding: 80px 20px 20px 20px; /* Ajustar el padding superior para evitar que el contenido se oculte detrás del header */
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            margin-bottom: 10px;
        }
        ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
    </style>
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
                <?php foreach ($rutinas as $nombre): ?>
                    <li>
                        <a href="index.php?action=verRutinaPorNombre&nombre=<?= urlencode($nombre) ?>">
                            <?= htmlspecialchars($nombre) ?>
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