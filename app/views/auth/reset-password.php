<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Restablecer Contraseña</title>
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

            <form action="index.php?action=update-password" method="POST">
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
                
                <div class="form-group">
                    <label for="password">Nueva contraseña:</label>
                    <input type="password" id="password" name="password" required
                           placeholder="Nueva contraseña">
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirmar contraseña:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required
                           placeholder="Confirmar contraseña">
                </div>

                <button type="submit" class="btn-primary">Actualizar contraseña</button>
            </form>
        </section>
    </main>
</body>
</html>
