@extends('layouts.userlayout.women')
@section('slider')
<div class="price-slider">
  <label for="price-range">Price range:</label>
  <input type="range" min="0" max="100" value="0" class="slider" id="price-range">
  <div class="price-range-values">
    <span class="min-value">$0</span>
    <span class="max-value">$100</span>
  </div>
</div>
<script src="{{ asset('js/priceslider.js') }}"></script>
@endsection
