<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Iniciar Sesión</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/login.css"> <!-- Ruta correcta al archivo CSS -->
</head>
<body>
    <main>
        <section>
            <!-- Aquí agregas la imagen -->
            <img src="/corecraft/public/img/logo.jpg" alt="Logo o Imagen" />

            <form action="index.php?action=auth" method="POST">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Iniciar Sesión</button>
            </form>
        </section>
    </main>
</body>
</html>
