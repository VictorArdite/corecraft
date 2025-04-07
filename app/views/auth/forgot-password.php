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

            <?php if (isset($_GET['message'])): ?>
                <div class="alert alert-success">
                    Se ha enviado un correo con las instrucciones para restablecer tu contraseña
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>

            <?php if (!isset($_GET['message'])): ?>
                <form action="index.php?action=send-reset-link" method="POST">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required 
                               placeholder="ejemplo@email.com">
                    </div>

                    <button type="submit" class="btn-primary">Enviar enlace de recuperación</button>
                </form>
            <?php endif; ?>

            <p class="login-link">
                <a href="index.php?action=login">Volver al inicio de sesión</a>
            </p>
        </section>
    </main>
</body>
</html>
