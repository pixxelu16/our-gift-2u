@extends('layouts.master')
@section('content')
<div class="banner-new-saction">

    <div class="slider stick-dots">
        <div class="slide">
            <div class="slide__img">
                <img src="{{ url('public/images/banner-1.png') }}" alt="#" class="full-image animated"
                    data-animation-in="zoomInImage" />

                    <div class="mobile-image"><img src="{{ url('public/images/mobile-banner-1.jpg') }}"></div>
            </div>
            <div class="container">
                <div class="slide__content slider-content-1">
                    <div class="slide__content--headings">
                        <h2 class="animated" data-animation-in="fadeInRight"> When you redeem<br>
                            your gift card, you’ll <br>
                            be giving a gift, too.
                        </h2>
                        <p class="animated" data-animation-in="fadeInRight" data-delay-in="0.2">For every dollar
                            redeemed from your gift card, we will<br> donate an equal amount in gift to our
                            different<br>
                            selected charities to deliver to kids in need.
                        </P>
                        <img src="{{ url('public/images/banner-logo.png') }}" class="banner-new-logo animated"
                            data-animation-in="fadeInRight">
                        @if (!Auth::check())
                        <div class="banner-button"><a href="{{ url('redeem-center') }}" data-animation-in="fadeInRight">Redeem Center <img
                                    src="{{ url('public/images/join-erow.svg') }}"></a></div>
                        @endif
                        <div class="bnaer-card-image animated" data-animation-in="fadeInRight">
                            <img src="{{ url('public/images/mobile-banner-card-1.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="slide__img">
                <img src="{{ url('public/images/banner-2.png') }}" alt="#" class="full-image animated"
                    data-animation-in="zoomInImage" />
                    <div class="mobile-image"><img src="{{ url('public/images/mobile-banner-2.png') }}"></div>
            </div>
            <div class="container">
                <div class="slide__content">
                    <div class="slide__content--headings">
                        <img src="{{ url('public/images/banner-logo-2.png') }}" class="banner-new-logo-2">
                        <h2 class="animated color-black" data-animation-in="fadeInUp"><span
                                class="color-orange">1,000,000
                            </span><br>
                            Dollars in Gift <br>
                            Vouchers give<br>
                            away!
                        </h2>
                        <p class="animated color-black" data-animation-in="fadeInUp" data-delay-in="0.3">
                            Absolutely! We love Christmas, and we're thrilledto give <br> presents to all our members!
                            🎄 Don’t miss out on the fun—<br> register now and join in the celebration!
                        </p>
                        @if (!Auth::check())
                        <div class="banner-button"><a href="{{ url('redeem-center') }}" class="green-button" data-animation-in="fadeInRight">Join
                                Now <img src="{{ url('public/images/slider-right-i.png') }}"></a></div>
                        @endif
                        <div class="bnaer-card-image animated" data-animation-in="fadeInRight">
                            <img src="{{ url('public/images/mobile-banner-card-2.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="slide__img">
                <img src="{{ url('public/images/banner-3-new.png') }}" alt="#" class="full-image animated"
                    data-animation-in="zoomInImage" />
                    <div class="mobile-image"><img src="{{ url('public/images/mobile-banner-3.png') }}"></div>
            </div>
            <div class="container">
                <div class="slide__content slider-content-3">
                    <div class="slide__content--headings">
                        <h2 class="animated" data-animation-in="fadeInRight">We are in <br>
                            love! ❤️
                        </h2>
                        <p class="animated" data-animation-in="fadeInRight" data-delay-in="0.2">With any gift card
                            purchase for Valentine’s <br> Day, you’ll receive a second gift card of <br> the same value
                            for free.
                            Get your code today!
                        </p>
                        @if (!Auth::check())
                        <div class="banner-button"><a href="{{ url('redeem-center') }}" class="green-button" data-animation-in="fadeInRight">Join
                                Now <img src="{{ url('public/images/slider-right-i.png') }}"></a></div>
                        @endif
                        <div class="bnaer-card-image animated" data-animation-in="fadeInRight">
                            <img src="{{ url('public/images/mobile-banner-card-3.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="slide__img">
                <img src="{{ url('public/images/banner-4.png') }}" alt="#" class="full-image animated"
                    data-animation-in="zoomInImage" />
                    <div class="mobile-image"><img src="{{ url('public/images/mobile-banner-4.png') }}"></div>
            </div>
            <div class="container">        
                <div class="slide__content slider-content-3">
                    <div class="slide__content--headings">
                        <h2 class="animated" data-animation-in="fadeInRight">❤️ Special Offer<br> for Mom! ❤️
                        </h2>
                        <p class="animated" data-animation-in="fadeInRight" data-delay-in="0.2">With any gift card purchase for Mother’ <br>s Day, you’ll receive a second gift card of<br> the same value for free.<br>
                            Get your code today! at the end of road<br> we all have more done one Mom!<br>
                            Mom - grand mom - mother in law ......
                        </p>
                        @if (!Auth::check())
                           <div class="banner-button"> <a href="{{ url('redeem-center') }}" class="green-button" data-animation-in="fadeInRight">Join
                                Now <img src="{{ url('public/images/slider-right-i.png') }}"></a>
                           </div>
                        @endif

                        <div class="bnaer-card-image animated" data-animation-in="fadeInRight">
                            <img src="{{ url('public/images/mobile-banner-card-4.png') }}">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($top_all_categories)
    <div class="slider-text">
        <div class="slide-track">
            @foreach ($top_all_categories as $categorie)
                <div class="slide">
                    {{ $categorie['name'] }}
                </div>
            @endforeach
        </div>
    </div>
@endif

<div class="about-saction-new" id="howitworks">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="about-image" data-aos="fade-up">
                    <img src="{{ url('public/images/banner-logo-2.png') }}" class="small-logo">
                    <img src="{{ url('public/images/about-girl.svg') }}" class="desktop-image">
                    <img src="{{ url('public/images/young-caucasian-woman.png') }}" class="mobile-image-our">
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-text">
                    <div class="mobile-logo-our"><img src="{{ url('public/images/banner-logo-2.png') }}" class="small-logo"></div>
                    <span>Our Process</span>
                    <h2>So, how does it <em>work?</em></h2>
                    <div class="row-inner-about">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="box-inner-row" data-aos="fade-right">
                                    <img src="{{ url('public/images/about-icon-1.svg') }}">
                                    <h3>Add your gift Card code</h3>
                                    <p>just simply add the gift card doce that sameone send you by the e-gift card
                                        platatorm by email or SMS
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box-inner-row" data-aos="fade-left">
                                    <img src="{{ url('public/images/about-icon-2.svg') }}">
                                    <h3>Go to the shop area</h3>
                                    <p>Click the “Shop” button to choose a product for the value of your gift card, or
                                        use it as part payment for a gift you wish to upgrade.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box-inner-row" data-aos="fade-right">
                                    <img src="{{ url('public/images/about-icon-3.svg') }}">
                                    <h3>Shiping</h3>
                                    <p>You will need to register with us in order to receive the product.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box-inner-row" data-aos="fade-left">
                                    <img src="{{ url('public/images/about-icon-4.svg') }}">
                                    <h3>Get it Deliver and Enjoy</h3>
                                    <p>We will deliver to your door so you can enjoy your products and benifits of our
                                        rewards system</p>
                                </div>
                            </div>
                        </div>
                        @if (!Auth::check())
                            <a href="{{ url('redeem-center') }}">Redeem Centre<img
                                    src="{{ url('public/images/slider-right-i.png') }}"></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="join-with-click-saction">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="box-left-join-with">
                    <span>redeem with a click</span>
                    <h2>Not sure where to start?</h2>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    1 Add your gift card code
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>You are required to enter your gift card code to validate the gift card.</p>
                                    @if (!Auth::check())
                                        <a href="{{ url('redeem-center') }}">redeem center<img
                                                src="{{ url('public/images/join-erow.svg') }}"></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    2 Shop for your gift
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Excited to earn reward points? Setting up an account is easy!</p>
                                    @if (!Auth::check())
                                        <a href="{{ url('redeem-center') }}">Join In <img
                                                src="{{ url('public/images/join-erow.svg') }}"></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    3 Get it deliver and enjoy
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Excited to earn reward points? Setting up an account is easy!</p>
                                    @if (!Auth::check())
                                        <a href="{{ url('redeem-center') }}">Join In <img
                                                src="{{ url('public/images/join-erow.svg') }}"></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($banner_one_products)
                    <div class="col-md-6">
                        @foreach ($banner_one_products as $index => $banner_one)
                                    @php
                                        // Define CSS classes based on index
                                        $boxClass = '';
                                        $circleClass = '';

                                        switch ($index + 1) {
                                            case 2:
                                                $boxClass = 'two-box';
                                                $circleClass = 'fashion-width-2';
                                                break;
                                            case 3:
                                                $boxClass = 'three-box';
                                                $circleClass = 'fashion-width-3';
                                                break;
                                            default:
                                                $circleClass = 'fashion-position-1';
                                                break;
                                        }
                                    @endphp
                                    <div class="box-right-join-with {{ $boxClass }}">
                                        <a href="{{ url('product/' . $banner_one['product_slug']) }}" class="style-none">
                                            <div class="fashion-circle {{ $circleClass }}">
                                                <img src="{{ url('public/images/fashion-circle.png') }}" alt="fashion-circle">
                                                <div class="fashion-content">
                                                    <img src="{{ url('public/uploads/products/' . $banner_one['image']) }}"
                                                        alt="{{ $banner_one['image'] }}" class="banner-one-img">
                                                    <span>${{ number_format($banner_one['product_price'], 2, '.', ',') }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                        @endforeach
                    </div>
            @endif
        </div>
    </div>
</div>

@if ($home_products)
    <div class="shop-cetageory-slider">
        <div class="container">
            <ul class="slider-cetageory cetagory-product-slider">
                @foreach ($home_products as $product)
                    <li class="logo-slider">
                        <a href="{{ url('product/' . $product['product_slug']) }}">
                            <div class="cetagory-box">
                                <img src="{{ url('public/uploads/products/' . $product['image']) }}" class="home-product-image">
                                <span>${{ number_format($product['product_price'], 2, '.', ',') }}</span>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

{{-- @if ($home_memberships)
<div class="how-many-ponits">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="how-many-left">
                    <img src="{{ url('public/images/how-many.png') }}">
                </div>
            </div>
            <div class="col-md-7">
                <div class="how-many-right">
                    <span>how many points can I earn?</span>
                    <h2><em>Spend</em> in <em>shopping, bills</em> even <em>rent,</em> you can <em>earn</em> DCR points
                    </h2>
                    <p>Every Dollar you spend in your debit can earn you rewards points here same examples</p>
                    <table class="Membership_table">
                        <tr>
                            <th>Membership</th>
                            <th>Monthly spend with your DC</th>
                            <th>Rewards Points</th>
                            <th>Membership cost per year</th>
                            <th>% Revenue</th>
                            <th>Dollar Value</th>
                        </tr>
                        @foreach ($home_memberships as $membership)
                        <tr>
                            <td>{{ $membership['name']; }}</td>
                            <td>${{ $membership['monthly_spend']; }}</td>
                            <td>{{ $membership['rewards_points']; }}</td>
                            <td>${{ $membership['membership_cost_per_year']; }}</td>
                            <td>{{ $membership['revenue']; }}%</td>
                            <td>${{ $membership['price']; }}</td>
                        </tr>
                        @endforeach
                    </table>
                    @if (!Auth::check())
                    <a href="{{ url('redeem-center') }}">Join in <img
                            src="{{ url('public/images/slider-right-i.png') }}"></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endif --}}
{{--
<div class="get-upto-saction">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="get-upto-left">
                    <span>My rewards</span>
                    <h2>Get upto 12% in reward point with your Debit card!</h2>
                    <p>Earn more every time you shop! Use your debit card to unlock up to 12% back in reward points on
                        every purchase. Whether you're shopping for daily essentials or indulging in your favorite
                        brands, you’ll rack up points with every swipe. Redeem these points for exclusive offers,
                        discounts, and more. It’s simple, rewarding, and adds value to every purchase!</p>
                    @if (!Auth::check())
                    <a href="{{ url('redeem-center') }}">Join In <img
                            src="{{ url('public/images/orange-erow.svg') }}"></a>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="get-upto-right">
                    @if ($banner_two_products)
                    <div class="get-up-product">
                        <ul>
                            @foreach ($banner_two_products as $banner_two)
                            <li><a href="{{ url('product/' . $banner_two['product_slug']) }}"><img
                                        src="{{ url('public/uploads/products/' . $banner_two['image']) }}"
                                        class="banner-two-img"><span>{{ number_format($banner_two['product_price'], 2,
                                        '.', ',') }}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <img src="{{ url('public/images/get-up-image.png') }}">
                </div>
            </div>
        </div>
    </div>
</div> --}}


@if ($home_brands)
    <div class="brands-selection-row">
        <div class="container">
            <span>brands selection</span>
            <h2>Many <em> products</em> <br>to choose from</h2>
            <div class="shop-cetageory-slider">
                <ul class="slider-cetageory">
                    @php    $brand_count = 1; @endphp
                    @foreach ($home_brands as $logo)
                        <li class="logo-slider">
                            <div class="product-slider-2">
                                <img src="{{ url('public/uploads/brands-logos/' . $logo['main_logo']) }}">
                                <div class="product-logo">
                                    <img src="{{ url('public/uploads/brands-logos/' . $logo['logo']) }}">
                                </div>
                            </div>
                        </li>
                        @php        $brand_count++; @endphp
                    @endforeach
                </ul>
            </div>
            <a href="{{ url('redeem-center') }}">Redeem & discover<img src="{{ url('public/images/slider-right-i.png') }}"></a>
            @if (!Auth::check())

            @endif
        </div>
    </div>
@endif

@if ($middle_all_categories)
    <div class="slider-text defrent-slider">
        <div class="slide-track">
            @foreach ($middle_all_categories as $categorie)
                <div class="slide">
                    {{ $categorie['name'] }}
                </div>
            @endforeach
        </div>
    </div>
@endif
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
        <div class="logo-52-orange"><a href="{{ url('/') }}"><img
                    src="{{ url('public/images/52-logo-small.png') }}"></a></div>
    </div>

    @if ($home_logos)
        <div class="logo-icon-row">
            <div class="container">
                <h2>Partners & Platinum sponsors of 52 Degree Foundation</h2>
                <ul class="slider-cetageory shop-cetageory-slider cetagory-product-slider">
                    @foreach ($home_logos as $logo)
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
    <div class="slider-text defrent-slider defrent-slider-mobile">
        <div class="slide-track">
            @foreach ($bottom_all_categories as $categorie)
                <div class="slide">
                    {{ $categorie['name'] }}
                </div>
            @endforeach
        </div>
    </div>
@endif

<div class="my-rewards-saction">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="my-rewards-left">
                    <img src="{{ url('public/images/man-wearing-t-shirt-gesturing 1.png') }}" class="desktop-man-image">
                    <div class="shap-about-image"><img src="{{ url('public/images/shap-imag-about.png') }}"></div>
                    <img src="{{ url('public/images/medium-shot-man.png') }}" class="mobile-image-our">
                </div>
            </div>
            <div class="col-md-6">
                <div class="my-rewards-righ">
                    <div class="about-logo-new"><img src="{{ url('public/images/banner-logo.png') }}"
                            class="small-logo"></div>
                    <span>my gift card</span>
                    <h2>Redeem you gift card today</h2>
                    <p>Recieving your gift to your door steps!</p>
                    @if (!Auth::check())
                        <a href="{{ url('redeem-center') }}">Redeem center<img
                                src="{{ url('public/images/join-erow.svg') }}"></a>
                    @endif
                    <div class="about-card">
                        <img src="{{ url('public/images/red-about-card.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection