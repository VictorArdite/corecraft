document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('calorieForm');
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar que el formulario se envíe y recargue la página

        const weight = parseFloat(document.getElementById('weight').value);
        const height = parseFloat(document.getElementById('height').value);
        const age = parseInt(document.getElementById('age').value);
        const gender = document.getElementById('gender').value;
        const activity = document.getElementById('activity').value;

        let bmr;

        // Calcular BMR (Tasa Metabólica Basal) usando la fórmula de Harris-Benedict
        if (gender === 'male') {
            bmr = 88.362 + (13.397 * weight) + (4.799 * height) - (5.677 * age);
        } else {
            bmr = 447.593 + (9.247 * weight) + (3.098 * height) - (4.330 * age);
        }

        // Ajustar BMR según el nivel de actividad
        let calories;
        switch (activity) {
            case 'sedentary':
                calories = bmr * 1.2;
                break;
            case 'light':
                calories = bmr * 1.375;
                break;
            case 'moderate':
                calories = bmr * 1.55;
                break;
            case 'active':
                calories = bmr * 1.725;
                break;
            case 'very_active':
                calories = bmr * 1.9;
                break;
        }

        // Mostrar el resultado
        const resultDiv = document.querySelector('.result');
        resultDiv.innerHTML = `<p>Calorías diarias necesarias: <strong>${calories.toFixed(2)}</strong></p>`;
    });
});