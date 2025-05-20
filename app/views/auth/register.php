<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Registro</title>
    <link rel="stylesheet" href="/corecraft/public/css/global.css">
    <link rel="stylesheet" href="/corecraft/public/css/registro.css">
</head>
<body>
    <main>
        <section>
            <a href="index.php?action=home">
                <img src="/corecraft/public/img/logo.jpg" alt="Logo CoreCraft">
            </a>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger">
                    <?php
                    switch ($_GET['error']) {
                        case 1:
                            echo "Error al registrar el usuario. Por favor, inténtalo de nuevo.";
                            break;
                        case 2:
                            echo "Todos los campos son obligatorios.";
                            break;
                        case 3:
                            echo "El email ya está registrado.";
                            break;
                        default:
                            echo "Error desconocido.";
                    }
                    ?>
                </div>
            <?php endif; ?>

            <form action="index.php?action=register" method="POST">
                <div class="form-group">
                    <label for="username">Nombre de usuario:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
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

                <div class="form-group">
                    <label for="age">Edad:</label>
                    <input type="number" id="age" name="age">
                </div>

                <div class="form-group">
                    <label for="weight">Peso (kg):</label>
                    <input type="number" step="0.1" id="weight" name="weight">
                </div>

                <div class="form-group">
                    <label for="height">Altura (cm):</label>
                    <input type="number" step="0.1" id="height" name="height">
                </div>

                <div class="form-group">
                    <label for="goal">Objetivo:</label>
                    <select id="goal" name="goal" required>
                        <option value="">Selecciona tu objetivo</option>
                        <option value="perder_peso">Perder peso</option>
                        <option value="ganar_masa_muscular">Ganar masa muscular</option>
                        <option value="mejorar_resistencia">Mejorar resistencia</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="peso_objetivo">Peso Objetivo (kg):</label>
                    <input type="number" step="0.1" id="peso_objetivo" name="peso_objetivo">
                </div>

                <button type="submit" class="btn-primary">Registrarse</button>
            </form>

            <p class="login-link">
                ¿Ya tienes una cuenta? <a href="index.php?action=login">Inicia sesión</a>
            </p>
        </section>
    </main>
</body>
</html>
