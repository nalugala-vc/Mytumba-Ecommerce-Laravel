let slider = document.querySelector(".slider");
let slides = document.querySelectorAll(".slide");
let currentSlide = 0;
let slideInterval = setInterval(nextSlide, 5000);

function nextSlide() {
  slides[currentSlide].classList.remove("active-slide");
  currentSlide = (currentSlide + 1) % slides.length;
  slides[currentSlide].classList.add("active-slide");
  slider.style.transform = "translateX(" + (-currentSlide * 100) + "%)";
}
