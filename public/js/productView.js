// In your JavaScript file

document.addEventListener('DOMContentLoaded', function() {
    const addButton = document.querySelector('.price-btn__add');
    const removeButton = document.querySelector('.price-btn__remove');
    const countSpan = document.querySelector('.price-btn__txt');
    const quantity = parseInt(document.getElementById('quantity').textContent);
  
    addButton.addEventListener('click', function() {
      let count = parseInt(countSpan.textContent);
      if (count < quantity) {
        count++;
        countSpan.textContent = count.toString();
      }
      if (count === quantity) {
        addButton.disabled = true;
      }
    });
  
    removeButton.addEventListener('click', function() {
      let count = parseInt(countSpan.textContent);
      if (count > 1) {
        count--;
        countSpan.textContent = count.toString();
        addButton.disabled = false;
      }
    });
  });
const addButton = document.querySelector('.price-cart__btn');
const countSpan = parseInt(document.querySelector('.price-btn__txt').textContent);
const productId = document.querySelector('.productId').textContent;

addButton.addEventListener('click', function() {
    //add to cart with quantity 
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const countSpan = parseInt(document.querySelector('.price-btn__txt').textContent);
    fetch('/addToCart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            quantity: countSpan,
            product_id: productId,
        })
    })
    .then(response => {
      // Handle the response from the server
      console.log(response)
      if (response.redirected) {
          window.location.href = response.url;
      } else {
          return response.json();
      }
      })
      .then(data => {
          // Extract the message from the response JSON object
          const message = data.message;
          console.log(message);
          // Display the message in the popup
          if(data.redirect){
            var errorMsg = encodeURIComponent('Please login to add to cart.');
            window.location.href = data.redirect + '?errorMsg=' + errorMsg;
          }else if(data.statuscode === 403){
            var errorMsg = document.createElement('div');
            errorMsg.classList.add('cart-popup-error');
            errorMsg.textContent = 'Item already in cart.';
            document.body.appendChild(errorMsg);
            setTimeout(function () {
              errorMsg.style.display = 'none';
            }, 3000);
          }else if(data.statuscode === 200){
            var errorMsg = document.createElement('div');
            errorMsg.classList.add('cart-popup-success');
            errorMsg.textContent = 'Item added to cart successfully.';
            document.body.appendChild(errorMsg);
            setTimeout(function () {
              errorMsg.style.display = 'none';
            }, 3000);
          }
      })
        .catch(error => {
            // Handle any errors that occur
            console.error(error);
            var errorMsg = document.createElement('div');
            errorMsg.classList.add('cart-popup-error');
            errorMsg.textContent = 'An error occurred while adding the item to cart.';
            document.body.appendChild(errorMsg);
            setTimeout(function () {
              errorMsg.style.display = 'none';
            }, 3000);
          
        });
});


