const carousel = document.getElementById('carousel');
const slides = carousel.children;
const slideWidth = slides[0].offsetWidth + 24; // width + margin
let index = 0;

const showSlide = (i) => {
    const maxIndex = slides.length - 1;
    if (i < 0) i = 0;
    if (i > maxIndex) i = maxIndex;
    index = i;
    carousel.scrollTo({
        left: index * slideWidth,
        behavior: 'smooth'
    });
};

document.getElementById('prev').addEventListener('click', () => showSlide(index - 1));
document.getElementById('next').addEventListener('click', () => showSlide(index + 1));

// Optional: auto-scroll
setInterval(() => {
    let nextIndex = (index + 1) % slides.length;
    showSlide(nextIndex);
}, 5000);

window.addEventListener('resize', () => {
    // recalc slideWidth on resize
    showSlide(index);
});