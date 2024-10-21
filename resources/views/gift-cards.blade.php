@extends('layouts.master')
@section('content')
<div class="banner-gift-card">
  <div class="container">
    <h2>We are in <br>
      love! ❤️</h2>
      <p>With any gift card purchase forValentine’s  Day, you’ll receive a second gift card of the same value for free.
        Get your code today! </p>
        <div class="banner-button">
          @if (!Auth::check())
            <a href="{{ url('/redeem-center') }}" class="btn join-btn">Join In <img src="{{ url('public/images/slider-right-i.png') }}"></a>
          @endif
        </div>
        {!! Helper::mini_cart() !!}
  </div>
</div>

@if ($all_categories)
<div class="slider-text gift-card-logo">
  <div class="slide-track">
    @foreach ($all_categories as $category)
      <div class="slide"> {{ $category['name'] }}</div>
    @endforeach
  </div>
</div>
@endif

@if($card_category_product_list)
@foreach ($card_category_product_list as $card_category)
<div class="gift-cards-saction-tow">
  <div class="container">
    <!--<h2>Gift <span> Cards</span></h2>-->
    <h2><span>{{ $card_category['name'] ?? "" }}</span></h2>
    <div class="row">
      @foreach ($card_category['category_products'] as $products)
        <div class="col-md-4">
          <div class="gift-cards-saction-box">
            <img src="{{ url('public/uploads/products/'.$products['product_detail']['image']) }}">
            <div class="price-amount">${{ number_format($products['product_detail']['product_price'], 2, '.', ',') }}</div>
            <div class="box-add-to-card">
              <div class="add-button-card add_to_cart" data-product_id="{{ $products['product_detail']['id'] }}"><a href="javascript:void(0)">Add to Cart <img src="{{ url('public/images/slider-right-i.png') }}"></a></div>
              <div class="flex-quientity buton-ehat">
                <button type="button" onclick="decrement('product-{{ $products['product_detail']['id'] }}')">-</button>
                <input type="number" id="product-{{ $products['product_detail']['id'] }}" class="counter-value" value="1" min="1" data-quintity="1" />
                <button type="button" onclick="increment('product-{{ $products['product_detail']['id'] }}')">+</button>
            </div>
            </div>
            <div class="add_to_cart_res_{{ $products['product_detail']['id'] }}"></div>
          </div>
        </div>
        @endforeach
    </div>
  </div>
</div>
@endforeach
@endif

<div class="christmas-sale-saction">
  <div class="container">
    <h2>Don't Forget this celebration!</h2>
    <span>Christmas</span>
  </div>
</div>

<div class="christmas-promotion-saction">
  <div class="container">
    <h6>Christmas Promotion</h6>
    <h2><span> Send a gift card to anyone,</span> and<br> you’ll receive a second gift card<br> of the same amount to send to<br> someone else for free.</h2>
    <p>Limited Time. T&C apply.</p>
</div>
</div>

<div class="our-heling">
  <div class="container">
    <div class="help-childern-saction"> <span>Collaborate with volunteers to deliver humanitarian aid</span>
      <h2>Help the children. Make big changes <br>
        and help the world.</h2>
      <a href="{{ url('/shop') }}">Click to know more <img src="{{ url('public/images/slider-right-i.png') }}"></a>
      <ul class="childer-list">
        <li> <img src="{{ url('public/images/childrn-ic-1.png') }}">
          <h6>Donation</h6>
        </li>
        <li> <img src="{{ url('public/images/childrn-ic-2.png') }}">
          <h6>Support</h6>
        </li>
        <li> <img src="{{ url('public/images/childrn-ic-3.png') }}">
          <h6>Inspiration</h6>
        </li>
        <li> <img src="{{ url('public/images/childrn-ic-4.png') }}">
          <h6>Volunteer</h6>
        </li>
      </ul>
    </div>
  </div>
</div>

@if ($all_logos)
<div class="foundation-logo-slider gift-card-logo-slider">
  <div class="container">
    <ul class="all-logo-slider">
        @foreach ($all_logos as $logo)
          <li class="logo-slider"> <img src="{{ url('public/uploads/brands-logos/' . $logo['main_logo']) }}"> </li>
        @endforeach
    </ul>
  </div>
</div>
@endif
<script>
  function increment(id) {
      let input = document.getElementById(id);
      input.value = parseInt(input.value) + 1;
  }

  function decrement(id) {
      let input = document.getElementById(id);
      if (parseInt(input.value) > 1) {
          input.value = parseInt(input.value) - 1;
      }
  }
</script>
@endsection
