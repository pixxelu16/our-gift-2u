@extends('layouts.master')
@section('content')
    <div class="foundation">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="fooundation-main">
                        <span>Collaborate with volunteers to deliver humanitarian aid</span>
                        <h2>Help the children. Make big changes <br>and help the world.</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="ro">
            <div class="col-md-12">
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
        </div>
    </div>

    @if ($top_logos)
    <div class="foundation-logo-slider">
        <div class="container">
          <ul class="all-logo-slider">
            @foreach ($top_logos as $logo)
                <li class="logo-slider"> <img src="{{ url('public/uploads/brands-logos/' . $logo['main_logo']) }}"> </li>
            @endforeach
          </ul>
        </div>
    </div>
    @endif

    <div class="foundation-at-main">
        <div class="container">
            <div class="foundation-at">
                <div class="row">
                    <div class="col-md-4">
                        <div class="foundation-img">
                            <img src="{{ url('public/images/foundation-at-big.png') }}">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="foundation-content">
                            <span><em>At</em> <img src="{{ url('public/images/gift-black.svg') }}" alt="gift-Logo.svg"></span>
                            <h2><span class="color-orange-small">our Community </span>because it is a core value of <span
                                    class="color-orange-small">Our Organization.</span></h2>
                            <p>Our founders, Mrs and Mr. Romano, understand the vital role of community involvement and the
                                positive impact of children’s foundations in Australia. This understanding began in 2004
                                when their daughter faced illness and was hospitalized at the Melbourne Children’s Hospital.
                            </p>
                            <p>Fueled by this personal experience, they established OURGIFT2U.com.au in 2023 in Australia,
                                building on their success in the USA. It was natural for them to partner with 52 Degree
                                Foundation, now known as 52degreefoundation.org a charity dedicated to supporting various
                                fundraisers and institutions in reaching their goals</p>
                            <p>The foundation is led by our inspiring young CEO, Marie Claire Petrou, who, at just 24 years
                                old, brings remarkable strength and enthusiasm to her role, leaving a lasting impact on the
                                foundation's future.</p>

                            <h6>For us, giving back is more than an initiative; it is an essential part of our lives.</h6>

                            <div class="foundation-images">
                                <ul>
                                    <li> <img src="{{ url('public/images/foundation-img-1.png') }}"></li>
                                    <li> <img src="{{ url('public/images/foundation-img-2.png') }}"></li>
                                    <li> <img src="{{ url('public/images/foundation-img-3.png') }}"></li>
                                    <li> <img src="{{ url('public/images/gift-black.svg') }}"></li>
                                </ul>
                            </div>
                            <img src="{{ url('public/images/foundation-at-small.png') }}" class="position-foundation">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="donation-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Since 2007, the Romano Family has <span class="highlight">Donated over $1.4 million</span> to the community through their various companies.</h2>
                    <p>Starting in 2024, Ourgift2u.com.au will partner with the 52 Degree Foundation to match, 1 to 1 all gift card individual value redeemed by our members. These matched points will be converted into monetary donations or products of the same value that will be auctioned at charity events or donated directly to the selected charities supported by the 52 Degree Foundation.</p>
                    @if (!Auth::check())
                        <a href="{{ url('/redeem-center') }}" class="btn join-btn">Join In <img src="{{ url('public/images/slider-right-i.png') }}"></a>
                    @endif
                </div>
                <div class="col-md-6 image-container">
                    <img src="{{ url('public/images/since-image.jpg') }}">
                </div>
            </div>
        </div>
    </section>


    <div class="container">
        <div class="saction-file-logo">
            <ul>
                <li><img src="{{ url('public/images/five-logo-1.png') }}"></li>
                <li><img src="{{ url('public/images/five-logo-2.png') }}"></li>
                <li><img src="{{ url('public/images/five-logo-3.png') }}"></li>
                <li><img src="{{ url('public/images/five-logo-4.png') }}"></li>
                <li><img src="{{ url('public/images/five-logo-5.png') }}"></li>
            </ul>
        </div>
    </div>

    <div class="our-gift-saction">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <img src="{{ url('public/images/logo-our-figt.png') }}">
                    <p>When you use your Gift card with in our website, ourgiftcard2u.com.au website making a positive impact on the institutions that support children and their families. For every Gift Card dollar that any of our members uses, we match it 1-to-1 and donate it to the 52 Degree Foundation. Together, let’s make every purchase meaningful</p>
                    @if (!Auth::check())
                        <a href="{{ url('/redeem-center') }}">Join In <img src="{{ url('public/images/wight-erow.png') }}"></a>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <section class="foundation-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="{{ url('public/images/foundation-img-3.png') }}">
                    <span><img src="{{ url('public/images/our-logofigt.png') }}"> <em>and</em> </span>
                    <h3>52 Degree Foundation:</h3>
                    <h4>The Journey So Far</h4>
                    <p>Our journey together has been incredibly rewarding, filled with remarkable moments and accomplishments. Our dedicated staff have gone above and beyond to raise funds by participating in various events, consistently elevating the profile of this fantastic organization.</p>
                    <p><strong> As we look ahead, we have ambitious plans for the future, so stay tuned for more exciting developments!</strong></p>
                    <a href="#" class="btn watch-btn">Watch Video <img src="{{ url('public/images/play-icon.png') }}"></a>
                    <div class="some-hight">Some Highlights Include:</div>
                </div>
                <div class="col-md-6">
                    <div class="video-placeholder">
                    <video autoplay loop muted playsinline>
                        <source src="{{ url('public/videos/foundation_01.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="wrapper-grid">
        <div class="container">
            <div class="vertical image-one-grid">
            <img src="{{ url('public/images/clint-image-1.jpg') }}">
        </div>
            <div class="image-tow-grid"><img src="{{ url('public/images/clint-image-2.jpg') }}"></div>
            <div class="image-nine-grid"><img src="{{ url('public/images/clint-image-3.jpg') }}"></div>
            <div class="image-three-grid"><img src="{{ url('public/images/clint-image-4.jpg') }}"></div>
            <div class="image-four-grid"><img src="{{ url('public/images/clint-image-5.jpg') }}"></div>
            <div class="image-five-grid"><img src="{{ url('public/images/clint-image-6.jpg') }}"></div>
            <div class="image-six-grid"><img src="{{ url('public/images/clint-image-7.jpg') }}"></div>
            <div class="image-saven-grid"><img src="{{ url('public/images/clint-image-8.jpg') }}"></div>
            <div class="image-eight-grid"><img src="{{ url('public/images/clint-image-10.jpg') }}"></div>
            <div class="image-10-grid"><img src="{{ url('public/images/clint-image-9.jpg') }}"></div>
        </div>
    </div>


    <div class="container">
        <section class="sponsor-section">
        <h2>Previously Foundation that we have been involved:</h2>
        <div class="ul">
          <li>
            <div class="sponsor-card"> <img src="{{ url('public/images/previously-icon-1.png') }}">
              <h5>Major Sponsor 2007</h5>
            </div>
          </li>
          <li>
            <div class="sponsor-card"> <img src="{{ url('public/images/previously-icon-2.png') }}">
              <h5>Diamond Sponsor 2022</h5>
            </div>
          </li>
          <li>
            <div class="sponsor-card"> <img src="{{ url('public/images/previously-icon-3.png') }}">
              <h5>Diamond Sponsor 2019/20</h5>
            </div>
          </li>
          <li>
            <div class="sponsor-card"> <img src="{{ url('public/images/previously-icon-4.png') }}">
              <h5>Sponsor 2007/09</h5>
            </div>
          </li>
          </ul>
        </section>
    </div>

    @if ($bottom_logos)
        <div class="foundation-logo-slider">
            <div class="container">
                <h2>Brands that are supporting our foundation</h2>
                <ul class="all-logo-slider">
                    @foreach ($bottom_logos as $logo)
                     <li class="logo-slider"> <img src="{{ url('public/uploads/brands-logos/' . $logo['main_logo']) }}"> </li>
                    @endforeach
                </ul>
            </div>
      </div>
    @endif
@endsection
