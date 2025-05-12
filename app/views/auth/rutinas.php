<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Rutinas</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/rutinas.css">
    <style>
        :root {
            --primary-dark: #23272b;
            --secondary-dark: #1a1a1a;
            --accent-yellow: #ffd600;
            --text-light: #fff;
        }
        body {
            background-color: var(--secondary-dark);
            color: var(--text-light);
            font-family: Arial, sans-serif;
        }
        header {
            background-color: var(--primary-dark);
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .logo img {
            height: 50px;
        }
        nav ul {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }
        nav ul li {
            margin-right: 1rem;
        }
        nav ul li a {
            color: var(--text-light);
            text-decoration: none;
            font-weight: bold;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        nav ul li a:hover {
            color: var(--accent-yellow);
            background-color: var(--primary-dark);
        }
        .auth-buttons {
            display: flex;
            gap: 1rem;
        }
        .auth-button {
            background-color: var(--accent-yellow);
            color: var(--primary-dark);
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .auth-button:hover {
            background-color: #fff;
        }
        main {
            padding: 2rem;
        }
        .crear-rutina-container {
            text-align: center;
            margin-bottom: 2rem;
        }
        .btn-crear-rutina {
            display: inline-block;
            background-color: var(--accent-yellow);
            color: var(--primary-dark);
            padding: 1rem 2rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .btn-crear-rutina:hover {
            background-color: #fff;
        }
        .rutinas-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 2rem;
        }
        .rutina-card {
            background-color: var(--primary-dark);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: transform 0.3s;
            display: flex;
            flex-direction: column;
        }
        .rutina-card:hover {
            transform: translateY(-5px);
        }
        .rutina-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .rutina-card h3 {
            padding: 1rem;
            margin: 0;
            text-align: center;
            color: var(--accent-yellow);
        }
    </style>
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