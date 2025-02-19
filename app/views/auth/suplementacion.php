<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreCraft - Suplementación</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/suplementacion.css"> <!-- Ruta correcta al archivo CSS -->
    <style>
        .calculator {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .calculator input, .calculator select {
            margin-bottom: 10px;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
        }
        .calculator button {
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .calculator button:hover {
            background-color: #555;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <header>
        <h1>Consejos de Suplementación</h1>
        <nav>
            <ul>
                <li><a href="index.php?action=home">Inicio</a></li>
                <li><a href="index.php?action=login">Iniciar Sesión</a></li>
                <li><a href="index.php?action=register">Registrarse</a></li>
                <li><a href="index.php?action=rutinas">Rutinas</a></li>
                <li><a href="index.php?action=suplementacion">Suplementación</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="content">
            <h2>Consejos de Suplementación</h2>
            <ul>
                <li>Consejo 1: Descripción del consejo de suplementación.</li>
                <li>Consejo 2: Descripción del consejo de suplementación.</li>
                <li>Consejo 3: Descripción del consejo de suplementación.</li>
                <!-- Añadir más consejos aquí -->
            </ul>
            <div class="calculator">
                <h2>Calculadora de Calorías</h2>
                <form id="calorieForm">
                    <label for="weight">Peso (kg):</label>
                    <input type="number" id="weight" name="weight" required>
                    
                    <label for="height">Altura (cm):</label>
                    <input type="text" id="height" name="height" required>
                    
                    <label for="age">Edad:</label>
                    <input type="number" id="age" name="age" required>
                    
                    <label for="gender">Género:</label>
                    <select id="gender" name="gender" required>
                        <option value="male">Hombre</option>
                        <option value="female">Mujer</option>
                    </select>
                    
                    <label for="activity">Nivel de actividad:</label>
                    <select id="activity" name="activity" required>
                        <option value="sedentary">Sedentario</option>
                        <option value="light">Ligero</option>
                        <option value="moderate">Moderado</option>
                        <option value="active">Activo</option>
                        <option value="very_active">Muy activo</option>
                    </select>
                    
                    <label for="goal">Objetivo:</label>
                    <select id="goal" name="goal" required>
                        <option value="lose">Perder peso</option>
                        <option value="maintain">Mantener peso</option>
                        <option value="gain">Subir peso</option>
                    </select>
                    
                    <button type="button" onclick="calculateCalories()">Calcular</button>
                </form>
                <div id="result" class="result"></div>
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 CoreCraft</p>
    </footer>
    <script>
        function calculateCalories() {
            const weight = parseFloat(document.getElementById('weight').value);
            const height = parseFloat(document.getElementById('height').value.replace(',', '.'));
            const age = parseFloat(document.getElementById('age').value);
            const gender = document.getElementById('gender').value;
            const activity = document.getElementById('activity').value;
            const goal = document.getElementById('goal').value;

            if (isNaN(weight) || isNaN(height) || isNaN(age)) {
                document.getElementById('result').innerHTML = "<strong style='color: red;'>Por favor, completa todos los campos correctamente.</strong>";
                return;
            }

            let bmr = gender === 'male' 
                ? (10 * weight + 6.25 * height - 5 * age + 5)
                : (10 * weight + 6.25 * height - 5 * age - 161);

            const activityMultipliers = {
                'sedentary': 1.2,
                'light': 1.375,
                'moderate': 1.55,
                'active': 1.725,
                'very_active': 1.9
            };

            let calories = bmr * activityMultipliers[activity];

            if (goal === 'lose') {
                calories -= 500;
            } else if (goal === 'gain') {
                calories += 500;
            }

            document.getElementById('result').innerHTML = `
                <strong>Total de calorías diarias necesarias:</strong> <span style="color: green; font-size: 1.2em;">${Math.round(calories)}</span>
            `;
        }
    </script>
</body>
</html>