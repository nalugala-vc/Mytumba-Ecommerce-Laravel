@extends('layouts.userlayout')

@section('content')
@if (session('success'))
<div
    class="cart-popup-success"
    >
    {{ session('success') }}
    </div>
@endif
@if (session('error'))
<div
    class="cart-popup-error"
    >
    {{ session('error') }}
    </div>
@endif
<section class="main-banner">
  <div class="carousel" data-carousel>
    <button class="carousel-button prev" data-carousel-button = "prev"><i class="fa-solid fa-caret-left"></i></button>
    <button class="carousel-button next" data-carousel-button = "next"><i class="fa-solid fa-caret-right"></i></button>
    <ul data-slides>
      <li class="slide" data-active>
        <img src="/assets/slider (1).jpg" alt="">
      </li>
      <li class="slide">
        <img src="/assets/slider (2).jpg" alt="">
      </li>
      <li class="slide">
        <img src="/assets/slider (3).jpg" alt="">
      </li>
      <li class="slide">
        <img src="/assets/slider (4).jpg" alt="">
      </li>
    </ul>
  </div>
</section>
<section class="benefits">
  <div class="bene-fit">
      <img src="/assets/hoodie.png" alt="Zip jacket" />
      <h3>hoodies</h3>
      <p>get the best deals on hoodies </p>
  </div>
  <div class="bene-fit">
      <img src="/assets/dress.png" alt="Zip jacket" />
      <h3>dresses</h3>
      <p>get the best deals on dresses </p>
  </div>
  <div class="bene-fit">
      <img src="/assets/jogging.png" alt="Zip jacket" />
      <h3>jogging pants</h3>
      <p>get the best deals on jogging pants </p>
  </div>
  <div class="bene-fit">
      <img src="/assets/zip.png" alt="Zip jacket" />
      <h3>zip jackets</h3>
      <p>get the best deals on zip jackets </p>
</section>
<section class="categories-section" id="top-picks">
    <h2 class="title">Top Picks for You</h2>
    <div class="categories-div">
      @foreach ($products as $product)
      @php
          $image = DB::table('products')->where('id', $product->id)->first();
          $images = explode('|',$image->pictures)
      @endphp
        <a href="{{ route('productView', ['product' => $product->id]) }}">
        <div class="top-picks" >
            <div class="img-div">
              <form action="{{ route('addToCart') }}" method="POST">
              @csrf
              <input type="hidden" name="product_id" value="{{$product->id}}">
                <button class="cart" >
                  <i class="fa-solid fa-cart-shopping"></i>
                </button>
                </form>
                <img src="/assets/{{$images[0]}}" alt="Zip jacket" />
                <form action="{{ route('addToCart') }}" method="POST">
                  @csrf
                  <input type="hidden" name="product_id" value="{{$product->id}}">
                <button class="wish">
                  <i class="fa-regular fa-heart"></i>
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
                <p>{{$product->name}}</p>
                <h4>{{$product->price}}</h4>
            </div>
        </div>
        </a>
        @endforeach
    </div>
</section>
<section class="brands-section">
  <div class="brand-div">
    <img src='/assets/dolce.svg'  alt="Zip jacket" />
  </div>
  <div class="brand-div">
    <img src='/assets/eddie.svg'  alt="Zip jacket" />
  </div>
  <div class="brand-div">
    <img src='/assets/armani.svg'  alt="Zip jacket" />
  </div>
  <div class="brand-div">
    <img src='/assets/mudd.svg'  alt="Zip jacket" />
  </div>
  <div class="brand-div">
    <img src='/assets/christian.svg'  alt="Zip jacket" />
  </div>
</section>
<section class="fashion">
    <div class="small-div">
        <div class="top">
            <div class="left">
                <img src='/assets/styleup-men.png' alt="Zip jacket" />
                <div class="fashion-info">
                    <p>Any color can be <b>Your color.</b></p>
                    <p>Style up today!</p>
                    <button>Shop Now</button>
                </div>
            </div>
            <div class="right">
                <img src='/assets/styleup-men2.png' alt="Zip jacket" />
            </div>
        </div>
        <div class="bottom">
            <div class="left">
                <img src='/assets/styleup-men3.png' alt="Zip jacket" />
            </div>
            <div class="right">
                <img src='/assets/styleup-men4.png' alt="Zip jacket" />
                <div class="fashion-info">
                    <p><b>Age</b> is just a number.</p>
                    <p>Style up today!</p>
                    <button>Shop Now</button>
                </div>

            </div>
        </div>
    </div>
    <div class="big-div">
        <img src='/assets/styleup-men5.png' alt="Zip jacket" />
    </div>
</section>
<section class="brands-section">
  <div class="brand-div">
    <img src='/assets/dolce.svg'  alt="Zip jacket" />
  </div>
  <div class="brand-div">
    <img src='/assets/eddie.svg'  alt="Zip jacket" />
  </div>
  <div class="brand-div">
    <img src='/assets/armani.svg'  alt="Zip jacket" />
  </div>
  <div class="brand-div">
    <img src='/assets/mudd.svg'  alt="Zip jacket" />
  </div>
  <div class="brand-div">
    <img src='/assets/christian.svg'  alt="Zip jacket" />
  </div>
</section>
<section class="instagram">
    <div class="banner">
        <h3>Instagram feed</h3>&nbsp;
        <FaInstagram class="ig-icon"/>
    </div>
    
    <div class="instagram-div" key={id}>
        <img src='/assets/ecomm (2).jpg' alt="Zip jacket" />
    </div>
    <div class="instagram-div" key={id}>
        <img src='/assets/ecomm (1).jpg' alt="Zip jacket" />
    </div>
    <div class="instagram-div" key={id}>
        <img src='/assets/ecomm (3).jpg' alt="Zip jacket" />
    </div>
    <div class="instagram-div" key={id}>
        <img src='/assets/ecomm (4).jpg' alt="Zip jacket" />
    </div>
    <div class="instagram-div" key={id}>
        <img src='/assets/ecomm (5).jpg' alt="Zip jacket" />
    </div>
    <div class="instagram-div" key={id}>
        <img src='/assets/ecomm (6).jpg' alt="Zip jacket" />
    </div>
    <div class="instagram-div" key={id}>
        <img src='/assets/ecomm (7).jpg' alt="Zip jacket" />
    </div>
    <div class="instagram-div" key={id}>
        <img src='/assets/ecomm (9).jpg' alt="Zip jacket" />
    </div>
</section>


@endsection