

// /* Function to close navigation menu */
// function closeMenu() {
//   menu.classList.remove("open-menu");
//   body.style.overflow = "visible";
//   bodyOverlay.classList.remove("open-overlay");
//   menuBtnImg.src = "images/icon-menu.svg";
// }

// /* Function to open navigation menu */

// function openMenu() {
//   menu.classList.add(".open-menu");
//   menuBtnImg.src = "images/icon-close.svg";
//   body.style.overflow = "hidden";
//   cart.classList.remove("open-cart");
//   bodyOverlay.classList.add("open-overlay");
// }

const burger = document.querySelector(".burger");
  const navLinks = document.querySelector(".nav-links");
  const nav = document.querySelector("nav");

  burger.addEventListener("click", () => {
    navLinks.classList.toggle("active");
    burger.classList.toggle("toggle");
    nav.classList.toggle("active");
  });

//popup timer
const successMessage = document.querySelector('.cart-popup-success');
  const errorMessage = document.querySelector('.cart-popup-error');
  
  // set timer for success message
  if (successMessage) {
    setTimeout(function() {
      successMessage.style.display = 'none';
    }, 3000); // 3 seconds
  }
  
  // set timer for error message
  if (errorMessage) {
    setTimeout(function() {
      errorMessage.style.display = 'none';
    }, 3000); // 3 seconds
  }
//update cart
function updateCartNotification() {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', '/cart/count', true);
  xhr.onload = function() {
    if (xhr.status === 200) {
      var response = JSON.parse(xhr.responseText);
      var cartNotification = document.querySelector('.cart-notification');
      if (cartNotification) {
        cartNotification.innerHTML = response.cartCount;
      }
    }
  };
  xhr.send();
}

updateCartNotification();

// set an interval to refresh the cart count every 5 seconds
setInterval(updateCartNotification, 1000);