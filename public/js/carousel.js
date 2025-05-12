let currentSlide = 0;
let slideInterval = null;

function showSlide(index) {
    const slides = document.querySelectorAll('.carousel-item');
    const totalSlides = slides.length;

    // Ajusta el índice para que sea circular
    if (index >= totalSlides) {
        currentSlide = 0;
    } else if (index < 0) {
        currentSlide = totalSlides - 1;
    } else {
        currentSlide = index;
    }

    // Quita la clase 'active' de todos y ponla solo en el actual
    slides.forEach((slide, i) => {
        if (i === currentSlide) {
            slide.classList.add('active');
        } else {
            slide.classList.remove('active');
        }
    });
}

function nextSlide() {
    showSlide(currentSlide + 1);
}

function prevSlide() {
    showSlide(currentSlide - 1);
}

function startAutoSlide() {
    if (slideInterval) clearInterval(slideInterval);
    slideInterval = setInterval(nextSlide, 4000); // Cambia cada 4 segundos
}

document.addEventListener('DOMContentLoaded', () => {
    showSlide(currentSlide);
    startAutoSlide();
    // Reinicia el intervalo si el usuario usa los controles
    document.querySelector('.carousel-control.next').addEventListener('click', () => {
        nextSlide();
        startAutoSlide();
    });
    document.querySelector('.carousel-control.prev').addEventListener('click', () => {
        prevSlide();
        startAutoSlide();
    });
});