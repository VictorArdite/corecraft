<?php require_once __DIR__ . '/../../public/views/layouts/header.php'; ?>

<link rel="stylesheet" href="css/dietas.css">

<div class="diet-container">
    <h1 class="text-center mb-4">Planes de Alimentación</h1>
    
    <div class="diet-type-selector">
        <button class="diet-type-button active" onclick="showDiet('perdida-grasa')">Pérdida de Grasa</button>
        <button class="diet-type-button" onclick="showDiet('ganancia-muscular')">Ganancia Muscular</button>
    </div>

    <!-- Plan de Pérdida de Grasa -->
    <div id="perdida-grasa" class="diet-plan">
        <div class="macros-info">
            <h4>Macronutrientes Diarios</h4>
            <div class="macros-grid">
                <div class="macro-item">
                    <h5>Proteínas</h5>
                    <p>1.6g - 2g por kg</p>
                </div>
                <div class="macro-item">
                    <h5>Carbohidratos</h5>
                    <p>2g - 3g por kg</p>
                </div>
                <div class="macro-item">
                    <h5>Grasas</h5>
                    <p>0.5g - 0.8g por kg</p>
                </div>
            </div>
        </div>

        <div class="meal-plan">
            <h3>Desayuno (7:00 AM)</h3>
            <div class="meal-item">
                <span class="meal-time">Desayuno</span>
                <span class="meal-description">Avena con claras de huevo y frutas</span>
                <span class="meal-calories">350 kcal</span>
            </div>
        </div>

        <div class="meal-plan">
            <h3>Media Mañana (10:00 AM)</h3>
            <div class="meal-item">
                <span class="meal-time">Snack</span>
                <span class="meal-description">Yogur griego con nueces</span>
                <span class="meal-calories">200 kcal</span>
            </div>
        </div>

        <div class="meal-plan">
            <h3>Almuerzo (1:00 PM)</h3>
            <div class="meal-item">
                <span class="meal-time">Almuerzo</span>
                <span class="meal-description">Pechuga de pollo a la plancha con ensalada y arroz integral</span>
                <span class="meal-calories">450 kcal</span>
            </div>
        </div>

        <div class="meal-plan">
            <h3>Merienda (4:00 PM)</h3>
            <div class="meal-item">
                <span class="meal-time">Merienda</span>
                <span class="meal-description">Batido de proteína con frutas</span>
                <span class="meal-calories">250 kcal</span>
            </div>
        </div>

        <div class="meal-plan">
            <h3>Cena (7:00 PM)</h3>
            <div class="meal-item">
                <span class="meal-time">Cena</span>
                <span class="meal-description">Pescado blanco con verduras al vapor</span>
                <span class="meal-calories">350 kcal</span>
            </div>
        </div>
    </div>

    <!-- Plan de Ganancia Muscular -->
    <div id="ganancia-muscular" class="diet-plan" style="display: none;">
        <div class="macros-info">
            <h4>Macronutrientes Diarios</h4>
            <div class="macros-grid">
                <div class="macro-item">
                    <h5>Proteínas</h5>
                    <p>2g - 2.2g por kg</p>
                </div>
                <div class="macro-item">
                    <h5>Carbohidratos</h5>
                    <p>4g - 6g por kg</p>
                </div>
                <div class="macro-item">
                    <h5>Grasas</h5>
                    <p>0.8g - 1g por kg</p>
                </div>
            </div>
        </div>

        <div class="meal-plan">
            <h3>Desayuno (7:00 AM)</h3>
            <div class="meal-item">
                <span class="meal-time">Desayuno</span>
                <span class="meal-description">Avena con leche, huevos enteros y plátano</span>
                <span class="meal-calories">600 kcal</span>
            </div>
        </div>

        <div class="meal-plan">
            <h3>Media Mañana (10:00 AM)</h3>
            <div class="meal-item">
                <span class="meal-time">Snack</span>
                <span class="meal-description">Batido de proteína con avena y mantequilla de maní</span>
                <span class="meal-calories">400 kcal</span>
            </div>
        </div>

        <div class="meal-plan">
            <h3>Almuerzo (1:00 PM)</h3>
            <div class="meal-item">
                <span class="meal-time">Almuerzo</span>
                <span class="meal-description">Arroz con pollo y aguacate</span>
                <span class="meal-calories">700 kcal</span>
            </div>
        </div>

        <div class="meal-plan">
            <h3>Merienda (4:00 PM)</h3>
            <div class="meal-item">
                <span class="meal-time">Merienda</span>
                <span class="meal-description">Yogur griego con granola y frutas</span>
                <span class="meal-calories">350 kcal</span>
            </div>
        </div>

        <div class="meal-plan">
            <h3>Cena (7:00 PM)</h3>
            <div class="meal-item">
                <span class="meal-time">Cena</span>
                <span class="meal-description">Carne de res con patatas y verduras</span>
                <span class="meal-calories">650 kcal</span>
            </div>
        </div>
    </div>
</div>

<script>
function showDiet(dietType) {
    // Ocultar todos los planes
    document.querySelectorAll('.diet-plan').forEach(plan => {
        plan.style.display = 'none';
    });
    
    // Mostrar el plan seleccionado
    document.getElementById(dietType).style.display = 'block';
    
    // Actualizar botones
    document.querySelectorAll('.diet-type-button').forEach(button => {
        button.classList.remove('active');
    });
    event.target.classList.add('active');
}
</script>

<?php require_once __DIR__ . '/../../public/views/layouts/footer.php'; ?>
