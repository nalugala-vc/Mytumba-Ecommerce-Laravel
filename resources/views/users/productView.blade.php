@extends('layouts.productView')
@section('content')
@php
    $image = DB::table('products')->where('id', $product->id)->first();
    $images = explode('|',$image->pictures)
@endphp
<div class="body-wrapper"></div>

    <!-- Overlay image Modal -->
    <div class="overlay-container">
      <div class="item-overlay">
        <button class="item-overlay__btn">
          <img
            src="/assets/icon-close.svg"
            alt="close image"
            class="item-overlay__btn-img"
          />
        </button>
        <div class="item-overlay__mainImg">
          <img
            src="/assets/image-product-1.jpg"
            alt=""
            class="item-overlay__img"
          />
          <button class="item-overlay__btnlft overlay-btn">
            <img
              src="/assets/icon-next.svg"
              alt="next symbol image"
              class="item-overlay__btnlft-img overlay-btn__img"
            />
          </button>
          <button class="item-overlay__btnrgt overlay-btn">
            <img
              src="/assets/icon-next.svg"
              alt="next symbol image"
              class="item-overlay__btnrgt-img overlay-btn__img"
            />
          </button>
        </div>
        <div class="overlay-img__btns">
          <button class="overlay-img__btn" data-img="0">
            <img
              src="/assets/image-product-1-thumbnail.jpg"
              alt="shoe product image"
              class="overlay-img__btn-img"
            />
          </button>
          <button class="overlay-img__btn" data-img="1">
            <img
              src="/assets/image-product-2-thumbnail.jpg"
              alt="shoe product image"
              class="overlay-img__btn-img"
            />
          </button>
          <button class="overlay-img__btn" data-img="2">
            <img
              src="/assets/image-product-3-thumbnail.jpg"
              alt="shoe product image"
              class="overlay-img__btn-img"
            />
          </button>
          <button class="overlay-img__btn" data-img="3">
            <img
              src="/assets/image-product-4-thumbnail.jpg"
              alt="shoe product image"
              class="overlay-img__btn-img"
            />
          </button>
        </div>
      </div>
    </div>

    <!-- Cart -->
    <div class="head-cart">
      <h3 class="head-cart__heading">Cart</h3>
      <div class="head-cart__txt">Your cart is empty.</div>
      <div class="head-cart__item">
        <div class="head-cart__item-wrapper">
          <img
            src="/assets/image-product-1-thumbnail.jpg"
            alt="cart product image"
            class="head-cart__item-img"
          />
          <div class="head-cart__des">
            <p class="head-cart__des-txt">{{$product->name}}</p>
            <div class="head-cart__price">
              <span class="head-cart__price-single">$125.00*3</span>
              <span class="head-cart__price-total">$375.00</span>
            </div>
          </div>
          <button class="head-cart__item-btn">
            <img
              src="/assets/icon-delete.svg"
              alt="delete image"
              class="head-cart__btn-img"
            />
          </button>
        </div>

        <button class="head-cart__btn btn--orange">Checkout</button>
      </div>
    </div>

    <!-- Header -->

    <!-- Main item container -->
    <main class="item">
      <section class="img">
        <button class="img-main__btnlft img-main__btn">
          <img
            src="/assets/icon-next.svg"
            alt="next symbol image"
            class="img-main__btnlft-img img-main__btn-img"
          />
        </button>
        <button class="img-main__btnrgt img-main__btn">
          <img
            src="/assets/icon-next.svg"
            alt="next symbol image"
            class="img-main__btnrgt-img img-main__btn-img"
          />
        </button>
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
            <span class="price-box__main-new">{{$product->price}}</span>
            <span class="price-box__main-discount"> 50%</span>
          </div>
          <span class="price-box__old">$250.00</span>
        </div>

        <div class="price-btnbox">
          <div class="price-btns">
            <button class="price-btn__add price-btn">
              <img
                src="/assets/icon-plus.svg"
                alt="plus sign"
                class="price-btn__add-img price-btn__img"
              />
            </button>
            <span class="price-btn__txt">0</span>
            <button class="price-btn__remove price-btn">
              <img
                src="/assets/icon-minus.svg"
                alt="minus sign"
                class="price-btn__remove-img price-btn__img"
              />
            </button>
          </div>
          <button class="price-cart__btn btn--orange">
            <img
              src="/assets/icon-cart.svg"
              alt="cart image"
              class="price-cart__btn-img"
            />
            Add to cart
          </button>
        </div>
      </section>
    </main>
@endsection