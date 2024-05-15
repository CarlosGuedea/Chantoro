$(document).ready(function () {
    let currentSlide = 0;
    const totalSlides = $('.slide').length;

    // Función para mostrar el slide actual
    function showSlide(index) {
        $('.slide').hide();
        $('.slide').eq(index).fadeIn();
    }

    // Función para avanzar al siguiente slide
    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
    }

    // Función para retroceder al slide anterior
    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide(currentSlide);
    }

    // Mostrar el primer slide al inicio
    showSlide(0);

    // Iniciar el carrusel automáticamente cada 5 segundos
    setInterval(nextSlide, 5000);

    // Manejar eventos de botones (puedes personalizar estos eventos según tus necesidades)
    $('#nextBtn').on('click', nextSlide);
    $('#prevBtn').on('click', prevSlide);
});
