@extends('layouts.userlayout')

@section('content')
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
                <input type="checkbox"/>
                <h5>Zip Jackets</h5>
            </div>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>Dresses</h5>
            </div>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>Jogging Pants</h5>
            </div>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>Hoodies</h5>
            </div>
        </div>
        <div class="refinery-prices">
            <h4>FILTER BY PRICE</h4>
            @yield('slider')

        </div>
        <div class="refinery-size">
            <h4>FILTER BY SIZE</h4>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>XS</h5>
            </div>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>S</h5>
            </div>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>M</h5>
            </div>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>L</h5>
            </div>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>XL</h5>
            </div>
        </div>
        <div class="refinery-prices">
            <h4>FILTER BY DATE</h4>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>New Arrivals</h5>
            </div>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>A Month</h5>
            </div>
            <div class="check-boxes">
                <input type="checkbox"/>
                <h5>Older Clothes</h5>
            </div>
        </div>
    </section>
    <section class="categories-section" id="top-picks">
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
                <form action="">
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
</section>
@endsection