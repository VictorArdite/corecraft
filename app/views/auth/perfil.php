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
        <h1>Perfil de Usuario</h1>
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
        <div class="profile-container">
            <h2>Bienvenido, <?= htmlspecialchars($user['nombre']) ?></h2>
            <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
            <p><strong>Edad:</strong> <?= htmlspecialchars($user['edad']) ?></p>
            <p><strong>Peso:</strong> <?= htmlspecialchars($user['peso']) ?> kg</p>
            <p><strong>Altura:</strong> <?= htmlspecialchars($user['altura']) ?> cm</p>
            <p><strong>Objetivo:</strong> <?= htmlspecialchars($user['objetivo']) ?></p>
            <!-- Añadir más detalles del perfil aquí -->
        </div>
    </main>
    <footer>
        <p>&copy; 2025 CoreCraft</p>
    </footer>
</body>
</html>