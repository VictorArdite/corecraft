<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Detalles del Ejercicio</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/ejercicio.css">
</head>
<body>
    <!-- Mismo header que en consultaEjercicios.php -->
    
    <main>
        <div class="ejercicio-detalle">
            <h1><?php echo $ejercicio['nombre']; ?></h1>
            <img src="<?php echo $ejercicio['imagen']; ?>" alt="<?php echo $ejercicio['nombre']; ?>">
            <div class="descripcion">
                <h2>Descripción</h2>
                <p><?php echo $ejercicio['descripcion']; ?></p>
            </div>
            <div class="instrucciones">
                <h2>Instrucciones</h2>
                <ol>
                    <?php foreach ($ejercicio['pasos'] as $paso): ?>
                        <li><?php echo $paso; ?></li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </main>

    <!-- Mismo footer que en consultaEjercicios.php -->
</body>
</html> 