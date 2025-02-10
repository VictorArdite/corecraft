<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Registrarse</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Ruta correcta al archivo CSS -->
</head>
<body>
    <header>
        <h1>Registrarse en CoreCraft</h1>
        <nav>
            <ul>
                <li><a href="index.php?action=home">Inicio</a></li>
                <li><a href="index.php?action=login">Iniciar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <form action="index.php?action=register" method="POST">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                <label for="age">Edad:</label>
                <input type="number" id="age" name="age" required>
                <label for="weight">Peso (kg):</label>
                <input type="number" step="0.1" id="weight" name="weight" required>
                <label for="height">Altura (cm):</label>
                <input type="number" step="0.1" id="height" name="height" required>
                <label for="goal">Objetivo:</label>
                <select id="goal" name="goal" required>
                    <option value="perder_peso">Perder Peso</option>
                    <option value="ganar_masa_muscular">Ganar Masa Muscular</option>
                    <option value="mejorar_resistencia">Mejorar Resistencia</option>
                </select>
                <button type="submit">Registrarse</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 CoreCraft</p>
    </footer>
</body>
</html>