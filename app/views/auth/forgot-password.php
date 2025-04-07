<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Recuperar Contraseña</title>
    <link rel="stylesheet" href="/corecraft/public/css/global.css">
    <link rel="stylesheet" href="/corecraft/public/css/login.css">
</head>
<body>
    <main>
        <section>
            <a href="index.php?action=home">
                <img src="/corecraft/public/img/logo.jpg" alt="Logo CoreCraft">
            </a>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success">
                    <?php echo htmlspecialchars($_GET['success']); ?>
                </div>
            <?php endif; ?>

            <?php if (!isset($_GET['step']) || $_GET['step'] == 1): ?>
                <h2>Recuperar Contraseña</h2>
                <form action="index.php?action=verify-security" method="POST">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required 
                               placeholder="ejemplo@email.com">
                    </div>

                    <div class="form-group">
                        <label for="pregunta_seguridad">Pregunta de Seguridad:</label>
                        <select id="pregunta_seguridad" name="pregunta_seguridad" required>
                            <option value="">Selecciona una pregunta</option>
                            <option value="mascota">¿Cuál fue el nombre de tu primera mascota?</option>
                            <option value="ciudad">¿En qué ciudad naciste?</option>
                            <option value="comida">¿Cuál es tu comida favorita?</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="respuesta_seguridad">Respuesta de Seguridad:</label>
                        <input type="text" id="respuesta_seguridad" name="respuesta_seguridad" required>
                    </div>

                    <button type="submit" class="btn-primary">Verificar</button>
                </form>
            <?php elseif (isset($_GET['step']) && $_GET['step'] == 2 && isset($_GET['email'])): ?>
                <h2>Recuperar Contraseña</h2>
                <form action="index.php?action=update-password" method="POST">
                    <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email']); ?>">
                    <div class="form-group">
                        <label for="new_password">Nueva Contraseña:</label>
                        <input type="password" id="new_password" name="new_password" required>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Confirmar Nueva Contraseña:</label>
                        <input type="password" id="confirm_password" name="confirm_password" required>
                    </div>

                    <button type="submit" class="btn-primary">Cambiar Contraseña</button>
                </form>
            <?php endif; ?>

            <p class="login-link">
                <a href="index.php?action=login">Volver al inicio de sesión</a>
            </p>
        </section>
    </main>
</body>
</html>
