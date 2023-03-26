const priceRange = document.getElementById("price-range");
const minValue = document.querySelector(".min-value");
const maxValue = document.querySelector(".max-value");

priceRange.addEventListener("input", () => {
  const min = Number(priceRange.value);
  const max = Number(priceRange.max);
  const percent = ((min / max) * 100).toFixed(2);
  const thumbWidth = getComputedStyle(priceRange).getPropertyValue("--thumb-width");

  minValue.innerHTML = `$${min}`;
  maxValue.innerHTML = `$${max}`;

  const thumbPosition = `calc(${percent}% + (${thumbWidth} / 2))`;
  priceRange.style.setProperty("--thumb-position", thumbPosition);
});
