@extends('layouts.userlayout')

@section('content')
<div class="slider-container">
  <div class="slider">
    <div class="slide active-slide">
      <img src="/assets/slider (2).jpg">
      <div class="slide-text">
        <h1>Slide 1 Title</h1>
        <p>Slide 1 Description</p>
        <button>Shop Now</button>
      </div>
    </div>
    <div class="slide">
    <img src="/assets/slider (2).jpg">
      <div class="slide-text">
        <h1>Slide 2 Title</h1>
        <p>Slide 2 Description</p>
        <button>Shop Now</button>
      </div>
    </div>
    <div class="slide">
    <img src="/assets/slider (3).jpg">
      <div class="slide-text">
        <h1>Slide 3 Title</h1>
        <p>Slide 3 Description</p>
        <button>Shop Now</button>
      </div>
    </div>
  </div>
</div>


@endsection