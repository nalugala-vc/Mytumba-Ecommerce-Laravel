@extends('layouts.userlayout')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="nav">
  <ul>
    <li>Filter By:</li>
    <li>
      <a href="#">Category</a>
      <ul>
        <li id="nav-zip"><a href="#">Zip Jackets</a></li>
        <li id="nav-jogging"><a href="#">Jogging Pants</a></li>
        <li id="nav-dresses"><a href="#">Dresses</a></li>
        <li id="nav-hoodies"><a href="#">Hoodies</a></li>
      </ul>
    </li>
    <li>
      <a href="#">Price</a>
      <ul>
        <li id="nav-lowest"><a href="#">Lowest</a></li>
        <li id="nav-highest"><a href="#">Highest</a></li>
      </ul>
    </li>
    <li>
      <a href="#">Age</a>
      <ul>
        <li id="nav-new"><a href="#">Newer</a></li>
        <li id="nav-old"><a href="#">Older</a></li>
      </ul>
    </li>
  </ul>
</div>


<section class="product-banner" style="background-image: url('/assets/ecomm (18).jpg');" >
    <div class="banner-name">
        <h2>MEN IN STYLE</h2>
    </div>
</section>
<section class="products-refine" id="products-cat">
    <section class="refinery">
        <div class="heading">
            <h4>REFINE</h4>
            <h4 style="color:red">Clear All</h4>
        </div>
        <div class="refinery-categories">
            <h4>CATEGORIES</h4>
            <div class="check-boxes">
            <input type="radio" name="filter" id="zip-jackets">
                <h5>Zip Jackets</h5>
            </div>
            <div class="check-boxes">
                <input type="radio" name="filter" id="jogging">
                <h5>Jogging Pants</h5>
            </div>
            <div class="check-boxes">
                <input type="radio" name="filter" id="hoodies">
                <h5>Hoodies</h5>
            </div>
        </div>
        <div class="refinery-prices">
            <h4>FILTER BY PRICE</h4>
            <div class="check-boxes">
                <input type="radio" name="filter" id="highest">
                <h5>highest</h5>
            </div>
            <div class="check-boxes">
                <input type="radio" name="filter" id="lowest">
                <h5>lowest</h5>
            </div>

        </div>
        <div class="refinery-prices">
            <h4>FILTER BY DATE</h4>
            <div class="check-boxes">
                <input type="radio" name="filter" id="new">
                <h5>New Arrivals</h5>
            </div>
            <div class="check-boxes">
                <input type="radio" name="filter" id="old">
                <h5>Older Clothes</h5>
            </div>
        </div>
    </section>
    <section class="categories-section" id="top-picks">
        <div class="categories-div" id="products-container">
        @foreach ($products as $product)
        @php
            $image = DB::table('products')->where('id', $product->id)->first();
            $images = explode('|',$image->pictures)
        @endphp
            <a href="{{ route('productView', ['product' => $product->id]) }}">
            <div class="top-picks" >
                <div class="img-div">
                <form id="addToCartForm-{{$product->id}}">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <button class="wish" id="addToCart-{{$product->id}}" onclick="addToCart({{$product->id}})">
                  <i class="uil uil-shopping-cart"></i>
                </button> 
            </form>
                    </form>
                    <img src="/assets/{{$images[0]}}" alt="Zip jacket" />
                    @if($product->discount_present == "true")
                    @php
                    $discountPrice = $product->discount_price;
                    $actualPrice = $product->price;
                    $percentage =100 - round(($discountPrice/$actualPrice)*100);
                    @endphp
                    <button class="cart">
                      -{{$percentage}}%
                    </button>
                    @endif
                </div>
                <div class="info-div">
                    <div class="ratings">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    </div>
                    <p>{{$product->name}}</p>
                    <h4>
                    @if($product->discount_present == "true")
                        {{$product->discount_price}}
                        <span id="cancelled">{{$product->price}}</span>
                    @else
                        {{$product->price}}
                    @endif
                    </h4>
                </div>
            </div>
            </a>
            @endforeach
        </div>
    </section>
</section>
<script src="{{ asset('js/refinery.js') }}"></script>
<script>
  //filtering
  const zip_jackets = document.getElementById('zip-jackets');
  const jogging = document.getElementById('jogging');
  const hoodies = document.getElementById('hoodies');
  const highest = document.getElementById('highest');
  const lowest = document.getElementById('lowest');
  const newClothes = document.getElementById('new');
  const old = document.getElementById('old');
  const nav_zip = document.getElementById('nav-zip');
  const nav_jogging = document.getElementById('nav-jogging');
  const nav_dresses = document.getElementById('nav-dresses');
  const nav_hoodies = document.getElementById('nav-hoodies')
  const nav_highest = document.getElementById('nav-highest')
  const nav_lowest = document.getElementById('nav-lowest')
  const nav_new = document.getElementById('nav-new')
  const nav_old = document.getElementById('nav-old')

  function filter(param) {
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  fetch(`/filter/men/${param}`, {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
    }
  })
  .then(response => response.json())
  .then(products => {
    console.log(products);
    const productsContainer = document.getElementById('products-container');

    if (products.products.length === 0) {
    // Show a message to the user that no products were found
    productsContainer.innerHTML = '<h2>No products were found</h2>';
  } else {
      // Handle the response from the server
      
      // Clear the current products from the container
      productsContainer.innerHTML = '';
      // Add the new products to the container
      products.products.forEach(product => {
        const images = product.pictures.split('|');
        const discountPresent = product.discount_present;
        const discountPrice = product.discount_price;
        const regularPrice = product.price;

                
        let priceHtml = '';

        if (discountPresent === 'true') {
          priceHtml += `${discountPrice} <span id="cancelled">${regularPrice}</span>`;
        } else {
          priceHtml += regularPrice;
        }

        const productHtml = `
        <a href="/product/${product.id}">
            <div class="top-picks" >
              <div class="img-div">
                <form id="addToCartForm-${product.id}">
                  <input type="hidden" name="product_id" value="${product.id}">
                  <button class="cart" id="addToCart-${product.id}" onclick="addToCart(${product.id})">
                    <i class="uil uil-shopping-cart"></i>
                  </button> 
                </form>
                <img src="/assets/${images[0]}" alt="${product.name}" />
                <form action="${product.wish_url}" method="POST">
                  <input type="hidden" name="product_id" value="${product.id}">
                  <button class="wish">
                    <i class="uil uil-heart"></i>
                  </button>
                </form>
              </div>
              <div class="info-div">
                <div class="ratings">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <p>${product.name}</p>
                <h4>
                    ${priceHtml}
                </h4>
            </div>
            </div>
          </a>
        `;
        productsContainer.insertAdjacentHTML('beforeend', productHtml);
      });
    }
  })
  .catch(error => {
    // Handle any errors that occur
    console.error(error.message);
  });
}

  zip_jackets.addEventListener('click', function() {
    console.log("clicked")
    filter('zip_jackets');
  });

  jogging.addEventListener('click', function() {
    filter('jogging');
  });

  hoodies.addEventListener('click', function() {
    filter('hoodies');
  });

  highest.addEventListener('click', function() {
    filter('highest');
  });

  lowest.addEventListener('click', function() {
    filter('lowest');
  });

  newClothes.addEventListener('click', function() {
    filter('new');
  });

  old.addEventListener('click', function() {
    filter('old');
  });

  nav_zip.addEventListener('click', function() {
    console.log("clicked")
    filter('zip_jackets');
  });

  nav_dresses.addEventListener('click', function() {
    filter('dresses');
  });

  nav_jogging.addEventListener('click', function() {
    filter('jogging');
  });

  nav_hoodies.addEventListener('click', function() {
    filter('hoodies');
  });

  nav_lowest.addEventListener('click', function() {
    filter('highest');
  });

  nav_highest.addEventListener('click', function() {
    filter('lowest');
  });

  nav_new.addEventListener('click', function() {
    filter('new');
  });

  nav_old.addEventListener('click', function() {
    filter('old');
  });

  function addToCart(productId) {
  // Prevent the default behavior of the button
  event.preventDefault();
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  // Submit the form using AJAX
  var form = document.getElementById('addToCartForm-' + productId);
  var formData = new FormData(form);
  var xhr = new XMLHttpRequest();
  formData.append('_token', csrfToken);
  xhr.open('POST', '{{ route('addToCart') }}', true);
  xhr.onload = function () {
    // Handle the response from the server
    var response = JSON.parse(xhr.responseText);
    if(response.redirect){
      var errorMsg = encodeURIComponent('Please login to view your cart.');
      window.location.href = response.redirect + '?errorMsg=' + errorMsg;
    }
    else if (response.status === 'success' && response.statuscode === 200) {
          var successMsg = document.createElement('div');
          successMsg.classList.add('cart-popup-success');
          successMsg.textContent = 'Item added to cart!';
          document.body.appendChild(successMsg);
          setTimeout(function () {
            successMsg.style.display = 'none';
          }, 3000);
    } else if(response.status === 'error' && response.statuscode === 403){
        var errorMsg = document.createElement('div');
        errorMsg.classList.add('cart-popup-error');
        errorMsg.textContent = 'Item already in cart.';
        document.body.appendChild(errorMsg);
        setTimeout(function () {
          errorMsg.style.display = 'none';
        }, 3000);
    }else{
      var errorMsg = document.createElement('div');
      errorMsg.classList.add('cart-popup-error');
      errorMsg.textContent = 'An error occurred while adding the item to cart.';
      document.body.appendChild(errorMsg);
      setTimeout(function () {
        errorMsg.style.display = 'none';
      }, 3000);
    }
  };
  xhr.send(formData);
}


</script>

@endsection