const carousel = document.querySelector('.carousel');
const slidesContainer = document.querySelector('.slides-container');
const slides = document.querySelectorAll('.slide');
const prevButton = document.querySelector('.prev-button');
const nextButton = document.querySelector('.next-button');

let counter = 0;
const slideWidth = slides[0].clientWidth;
const totalSlides = slides.length;

slidesContainer.style.width = slideWidth * totalSlides + 'px';

nextButton.addEventListener('click', () => {
    counter++;
    if (counter >= totalSlides) {
        counter = 0;
    }
    slidesContainer.style.transform = 'translateX(' + (-slideWidth * counter) + 'px)';
});

prevButton.addEventListener('click', () => {
    counter--;
    if (counter < 0) {
        counter = totalSlides - 1;
    }
    slidesContainer.style.transform = 'translateX(' + (-slideWidth * counter) + 'px)';
});

function autoSlide() {
    counter++;
    if (counter >= totalSlides) {
        counter = 0;
    }
    slidesContainer.style.transform = 'translateX(' + (-slideWidth * counter) + 'px)';
}

setInterval(autoSlide, 3000);
