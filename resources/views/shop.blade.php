@extends('layouts.master')
@section('content')
@if (!Auth::check())
   <script type="text/javascript">
      window.location = "{{ url('customer/my-account') }}";
   </script>
@endif
<div class="banner-shop-saction">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span>Your Next Adventure Starts Here</span>
                <h2>Grab <em>Camping Gear</em> at <br>Great Prices</h2>
                <p>Limited Time. T&C apply.</p>
            </div>
            {!! Helper::mini_cart() !!}
        </div>
    </div>
</div>

@if($all_categories)
<div class="shop-page-slider-saction">
    <div class="container">
        <h2>Shop by <span>Categories</span></h2>
        <ul class="shop-page-slider">
            @foreach($all_categories as $category)
                <li class="logo-slider">
                    <div class="shop-categories">
                        <img src="{{ url('public/uploads/category/'.$category->image) }}" class="shop-category-image">
                        <div class="shop-cetagores">
                            <a href="{{ url('category/').'/'.$category->slug; }}"><span>{{ $category->name }}</span></a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <p>Rewards points are cap and/or limited by single prouct applies.see terms and conditions for details</p>
    </div>
</div>
@endif


@if($all_brands)
<div class="shop-page-slider-saction gift-card-saction">
    <div class="container">
        <h2>Shop by  <span>Brands</span></h2>
        <ul class="shop-page-slider">
            @php $brand_count = 1; @endphp
            @foreach ($all_brands as $logo)
                <li class="logo-slider">
                    <div class="product-slider-2">
                        <img src="{{ url('public/uploads/brands-logos/' . $logo['main_logo']) }}">
                        <div class="product-logo position-logo">
                            <img src="{{ url('public/uploads/brands-logos/' . $logo['logo']) }}">
                        </div>
                    </div>
                </li>
                @php $brand_count++; @endphp
            @endforeach
        </ul>
        <p>Gift cards purchased with rewards points can only be used in the Debit Card Rewards Center and cannot be used outside this platform.</p>
    </div>
</div>
@endif


<div class="shop-page-slider-saction gift-card-saction gift-card-saction-last">
    <div class="container">
        <h2>Gift  <span>cards</span></h2>
        <ul class="shop-page-slider">
                <li class="logo-slider">
                        <img src="{{ url('public/images/gift-card-1.jpg') }}">
                </li>
                <li class="logo-slider">
                        <img src="{{ url('public/images/gift-card-2.jpg') }}">
                </li>
                <li class="logo-slider">
                        <img src="{{ url('public/images/gift-card-3.jpg') }}">
                </li>
                <li class="logo-slider">
                        <img src="{{ url('public/images/gift-card-4.jpg') }}">
                </li>
                <li class="logo-slider">
                        <img src="{{ url('public/images/gift-card-3.jpg') }}">
                </li>
                <li class="logo-slider">
                        <img src="{{ url('public/images/gift-card-3.jpg') }}">
                </li>
        </ul>
        <p>Gift cards purchased with rewards points can only be used in the Debit Card Rewards Center and cannot be used outside this platform.</p>
    </div>
</div>

<div class="container">
        <div class="help-childern-saction">
            <span>Collaborate with volunteers to deliver humanitarian aid</span>
            <h2>Help the children. Make big changes <br>and help the world.</h2>
            <a href="{{ url('/shop') }}">Click to know more <img src="{{ url('public/images/slider-right-i.png') }}"></a>
            <ul class="childer-list">
                <li>
                    <img src="{{ url('public/images/childrn-ic-1.png') }}">
                    <h6>Donation</h6>
                </li>
                <li>
                    <img src="{{ url('public/images/childrn-ic-2.png') }}">
                    <h6>Support</h6>
                </li>
                <li>
                    <img src="{{ url('public/images/childrn-ic-3.png') }}">
                    <h6>Inspiration</h6>
                </li>
                <li>
                    <img src="{{ url('public/images/childrn-ic-4.png') }}">
                    <h6>Volunteer</h6>
                </li>
            </ul>
        </div>

        @if($logos)
            <div class="logo-icon-row">
                <div class="container">
                    <ul class="slider-cetageory cetagory-product-slider">
                        @foreach ($logos as $logo)
                            <li class="logo-slider">
                                <img src="{{ url('public/uploads/brands-logos/' . $logo['main_logo']) }}">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>


    @if ($bottom_all_categories)
        <div class="slider-text defrent-slider">
            <div class="slide-track">
                @foreach ($bottom_all_categories as $categorie)
                    <div class="slide">
                        {{ $categorie['name'] }}
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    </div>
@endsection
