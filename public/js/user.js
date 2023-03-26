const buttons = document.querySelectorAll("[data-carousel-button]");
const slides = document.querySelector("[data-slides]");
let activeSlide = slides.querySelector("[data-active]");
let intervalId;

function changeSlide(offset) {
  let newIndex = [...slides.children].indexOf(activeSlide) + offset;
  if (newIndex < 0) newIndex = slides.children.length - 1;
  if (newIndex >= slides.children.length) newIndex = 0;

  slides.children[newIndex].dataset.active = true;
  delete activeSlide.dataset.active;
  activeSlide = slides.querySelector("[data-active]");
}

function startCarousel() {
  intervalId = setInterval(() => {
    changeSlide(1);
  }, 3000);
}

startCarousel();

buttons.forEach(button => {
  button.addEventListener("click", () => {
    clearInterval(intervalId);
    changeSlide(button.dataset.carouselButton === "next" ? 1 : -1);
    startCarousel();
  });
});
