document.addEventListener("DOMContentLoaded", function () {
    let currentSlide = 0;
    const slides = document.querySelectorAll(".carousel-slide");
    const totalSlides = slides.length;

    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove("active"));
        slides[index].classList.add("active");
    }

    function moveSlide(n) {
        currentSlide = (currentSlide + n + totalSlides) % totalSlides;
        showSlide(currentSlide);
    }

    document.querySelector(".next").addEventListener("click", function () {
        moveSlide(1);
        resetInterval();
    });

    document.querySelector(".prev").addEventListener("click", function () {
        moveSlide(-1);
        resetInterval();
    });

    let autoSlide = setInterval(() => moveSlide(1), 5000);

    function resetInterval() {
        clearInterval(autoSlide);
        autoSlide = setInterval(() => moveSlide(1), 5000);
    }

    showSlide(0);
});