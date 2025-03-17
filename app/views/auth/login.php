<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Iniciar Sesión</title>
    <link rel="stylesheet" href="/corecraft/public/css/global.css">
    <link rel="stylesheet" href="/corecraft/public/css/login.css">
</head>
<body>
    <main>
        <section>
            <a href="index.php?action=home">
                <img src="/corecraft/public/img/logo.jpg" alt="Logo CoreCraft">
            </a>

            <?php
            if (isset($_GET['error'])) {
                echo '<div class="alert alert-danger">';
                switch ($_GET['error']) {
                    case 'invalid_email':
                        echo 'Por favor, introduce un email válido.';
                        break;
                    case 'invalid_credentials':
                        echo 'Email o contraseña incorrectos.';
                        break;
                    case 'system_error':
                        echo 'Error del sistema. Por favor, inténtalo más tarde.';
                        break;
                    default:
                        echo 'Ha ocurrido un error. Por favor, inténtalo de nuevo.';
                }
                echo '</div>';
            }
            ?>

            <form action="index.php?action=auth" method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required 
                           value="<?php echo htmlspecialchars($_GET['email'] ?? ''); ?>"
                           placeholder="ejemplo@email.com">
                </div>
                
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required
                           placeholder="Tu contraseña">
                </div>

                <button type="submit" class="btn-primary">Iniciar Sesión</button>
            </form>

            <p class="register-link">
                ¿No tienes una cuenta? <a href="index.php?action=register">Regístrate aquí</a>
            </p>

            <?php if (defined('DEBUG') && DEBUG): ?>
            <div class="debug-info">
                <h3>Información de Depuración</h3>
                <pre>
                <?php
                echo "Session ID: " . session_id() . "\n";
                echo "Session Status: " . session_status() . "\n";
                if (isset($_SESSION)) {
                    echo "Session Data:\n";
                    print_r($_SESSION);
                }
                ?>
                </pre>
            </div>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
