let currentSlide = 0;
let isTransitioning = false;

function showSlide(index) {
    const slides = document.querySelectorAll('.carousel-item');
    const totalSlides = slides.length;
    const visibleSlides = 3; // Mostrar tres elementos a la vez

    if (index >= totalSlides) {
        currentSlide = 0;
    } else if (index < 0) {
        currentSlide = totalSlides - visibleSlides;
    } else {
        currentSlide = index;
    }

    const offset = -currentSlide * 100 / visibleSlides;
    document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
}

function nextSlide() {
    if (isTransitioning) return;
    isTransitioning = true;
    const slides = document.querySelectorAll('.carousel-item');
    const totalSlides = slides.length;
    const visibleSlides = 3;

    showSlide(currentSlide + 1);

    if (currentSlide === totalSlides - visibleSlides) {
        setTimeout(() => {
            document.querySelector('.carousel-inner').style.transition = 'none';
            showSlide(0);
            setTimeout(() => {
                document.querySelector('.carousel-inner').style.transition = 'transform 1s ease-in-out';
                isTransitioning = false;
            }, 50);
        }, 1000);
    } else {
        setTimeout(() => {
            isTransitioning = false;
        }, 1000);
    }
}

function prevSlide() {
    if (isTransitioning) return;
    isTransitioning = true;
    showSlide(currentSlide - 1);
    setTimeout(() => {
        isTransitioning = false;
    }, 1000);
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('.carousel-inner').style.transition = 'transform 1s ease-in-out';
    showSlide(currentSlide);
    setInterval(nextSlide, 4000); // Cambia de imagen cada 5 segundos
});