@extends('layouts.productView')
@section('content')
@php
    $image = DB::table('products')->where('id', $product->id)->first();
    $images = explode('|',$image->pictures)
@endphp
<div class="body-wrapper"></div>
<meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Header -->

    <!-- Main item container -->
    <main class="item">
      <section class="img">
        <div class="img-main">
            <img src="/assets/{{$images[0]}}" alt="" />
        </div>
      </section>

      <section class="price">
        <h2 class="price-sub__heading">{{$product->categoryP->category_name}}</h2>
        <h1 class="price-main__heading">{{$product->name}}</h1>
        <p class="price-txt">
            {{$product->description}}
        </p>
        <div class="price-box">
          <div class="price-box__main">
            <span class="price-box__main-new">
              @if($product->discount_present == 'true')
              {{ $product->discount_price}}
              @else
              {{$product->price}}
              @endif
            </span>
            @if($product->discount_present == 'true')
              @php
              $discountPrice = $product->discount_price;
              $actualPrice = $product->price;
              $percentage =100 - round(($discountPrice/$actualPrice)*100);
            @endphp
            <span class="price-box__main-discount"> 
              {{$percentage}} %
            </span>
            @endif
          </div>
          @if($product->discount_present == 'true')
          <span class="price-box__old">{{$product->price}}</span>
          @endif
        </div>
        <div id="quantity" style="display: none;">
          {{$product->quantity}}
        </div>
        <div class="productId" style="display: none;">
          {{$product->id}}
        </div>
        <div class="price-btnbox">
          <div class="price-btns">
            <button class="price-btn__add price-btn">
              <i class="uil uil-plus"></i>
            </button>
            <span class="price-btn__txt">1</span>
            <button class="price-btn__remove price-btn">
              <i class="uil uil-minus"></i>
            </button>
          </div>
          <button class="price-cart__btn btn--orange">
            <i class="uil uil-shopping-cart"></i>
            <span>Add to cart</span>
          </button>
        </div>
      </section>
    </main>
    <script src="{{ asset('js/productView.js') }}"></script>
@endsection