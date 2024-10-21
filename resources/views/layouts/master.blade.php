<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Our Gift 2u</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta content="" name="keywords">
      <link href="{{ url('public/css/style.css') }}" rel="stylesheet" />
      <link href="{{ url('public/css/custom.css') }}" rel="stylesheet" />
      <link href="{{ url('public/css/bootstrap.min.css') }}" rel="stylesheet" />
      <link href="{{ url('public/css/mobile.css') }}" rel="stylesheet">
      <link href="{{ url('public/css/aos.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ url('public/css/slide-style.css') }}">
      <link rel="icon" type="image/png" sizes="32x32" href="{{ url('public/images/Favicon.svg') }}">
      <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">

      <script> var base_url = '{{ url("/") }}'; </script>
   </head>
   <body style="background-color: #fff !important">
      <div class="new-home-page-all">
         <div class="position-sticky">
         <div class="header-top-new">
            <div class="container">
               <div class="row">
                  <div class="col-md-5">
                     <div class="top-left">
                        <div class="logo-new"><a href="{{ url('/') }}"><img src="{{ url('public/images/gift-Logo.svg') }}" alt="gift-Logo.svg"></a></div>
                        <form method="GET" action="#" id="serach_top_header_category_products">
                           <div class="serch-new">
                              <input type="text" name="top_header_keyword" id="top_header_keyword" value=""  class="search-input" placeholder="Search for a store, brand or products" autocomplete="off"/>
                              <button type="submit" class="search-submit top-disable-button" name="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                           </div> 
                           <div class="serach_top_header_category_products_res" style="display:none;"></div>
                        </form>
                     </div>
                  </div>
                  <div class="col-md-7">
                     <div class="top-right">
                        <div class="top-nev-left">
                           <ul>
                              <li class="{{ Request::is('about-us') ? 'active' : '' }}"><a href="{{ url('about-us') }}">About us</a></li>
                              <li class="{{ Request::is('shop') ? 'active' : '' }}"><a href="{{ url('shop') }}">Shop</a></li>
                              <li><a href="#howitworks">How it works?</a></li>
                              <li class="{{ Request::is('foundation') ? 'active' : '' }}"><a href="{{ url('foundation') }}">Foundation</a></li>
                              <li class="{{ Request::is('redeem-center') ? 'active' : '' }}"><a href="{{ url('redeem-center') }}">Redeem Center</a></li>
                           </ul>
                        </div>
                        @if(Auth::check())
                           @if(Auth::user()->user_type == "Customer")
                              <div class="acc-login">
                                 <ul>                       
                                    <li>
                                       <a href="javascript:void(0)">
                                          <img src="{{ url('public/images/User.svg') }}" class="user-icon">
                                          My Account :-
                                          Hi {{ Auth::user()->name }}!
                                          <img src="{{ url('public/images/Drop-Down.svg') }}" class="errow-drop"></a>
                                       <ul class="dropdown">
                                          <li>
                                             <li><a href="{{ url('customer/my-account') }}">My Dashboard</a></li>
                                             <li><a href="{{ url('customer/my-orders') }}">Orders</a></li>
                                             <li><a href="{{ url('shop') }}">Shop</a></li>
                                             <li><a href="{{ url('customer/addresses') }}">Addresses</a></li>
                                             <li><a href="{{ url('customer/account-details') }}">Account details</a></li>
                                             <a  href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                          </li>
                                       </ul>
                                    </li>
                                 </ul>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                 </form>
                              </div>
                           @elseif(Auth::user()->user_type == "Company")
                              <div class="acc-login">
                                 <ul>                       
                                    <li>
                                       <a href="javascript:void(0)">
                                          <img src="{{ url('public/images/User.svg') }}" class="user-icon">
                                          My Account :-
                                          Hi {{ Auth::user()->name }}!
                                          <img src="{{ url('public/images/Drop-Down.svg') }}" class="errow-drop"></a>
                                       <ul class="dropdown">
                                          <li>
                                             <li><a href="{{ url('company/my-account') }}">My Dashboard</a></li>
                                             <a  href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                          </li>
                                       </ul>
                                    </li>
                                 </ul>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                 </form>
                              </div>
                           @elseif(Auth::user()->user_type == "Admin")
                              <div class="acc-login">
                                 <ul>                       
                                    <li>
                                       <a href="javascript:void(0)">
                                          <img src="{{ url('public/images/User.svg') }}" class="user-icon">
                                          My Account :-
                                          Hi {{ Auth::user()->name }}!
                                          <img src="{{ url('public/images/Drop-Down.svg') }}" class="errow-drop"></a>
                                       <ul class="dropdown">
                                          <li>
                                             <li><a href="{{ url('admin/all-orders') }}">My Dashboard</a></li>
                                             <a  href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                          </li>
                                       </ul>
                                    </li>
                                 </ul>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                 </form>
                              </div>
                           @endif
                        @else
                           <div class="button-right-top">
                              <ul>
                                 <li><a href="{{ url('login') }}" class="sign-in">Sign In</a></li>
                                 <li><a href="{{ url('redeem-center') }}" class="register">Join In</a></li>
                              </ul>
                           </div>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="navigaction-new">
            <div class="container">
               <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           All Categories
                           </a>
                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              {!! Helper::top_header_category_dropdown_list() !!}
                           </div>
                        </li>
                        {!! Helper::header_main_category_list() !!}
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
         </div>
         @yield('content')
         <div class="footer-saction-home">
            <div class="container">
               <div class="row">
                  <div class="col-md-3">
                     <div class="footer-box">
                        <a href="{{ url('/') }}"><img src="{{ url('public/images/gift-Logo.svg') }}" alt="gift-Logo.svg"></a>
                        <ul class="link-page-logo">
                           <li><img src="{{ url('public/images/download-150x150.jpg') }}" alt="download-150x150.jpg"></li>
                           <li><img src="{{ url('public/images/download-1-150x150.png') }}" alt="download-1-150x150.png"></li>
                           <li><img src="{{ url('public/images/download-1-150x150.jpg') }}" alt="download-1-150x150.jpg"></li>
                           <span class="footer-logo-card"><img src="{{ url('public/images/red-gift-footer.png') }}" alt="red-gold-card.png"></span>
                           <span class="footer-logo-card"><img src="{{ url('public/images/green-gift-footer.png') }}" alt="green-gold-card.png"></span>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="footer-box">
                        <h4>About</h4>
                        <ul class="link-page">
                           <li><a href="{{ url('/#howitworks') }}">How it works</a></li>
                           <li><a href="{{ url('terms-and-conditions') }}">Terms & conditions</a></li>
                           <li><a href="{{ url('privacy-policy') }}">Pivacy policy</a></li>
                           <li><a href="{{ url('cookies') }}">Cookies</a></li>
                           <li><a href="{{ url('about-us') }}">About Us</a></li>
                           <li><a href="{{ url('about-us/#our-team') }}">Our Team</a></li>
                           @if (Auth::check() && Auth::user()->user_type == 'Company')
                             <li><a href="{{ url('corporate-business') }}">Business Center</a></li>
                           @else
                            <li><a href="{{ url('business-register') }}">Business Center</a></li>
                           @endif
                           <li><a href="{{ url('help-center') }}">Help Center</a></li>
                           <li><a href="{{ url('gift-cards') }}">Gift Cards</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="footer-box">
                        <h4>Categories</h4>
                        <ul class="link-page">
                           <li><a href="{{ url('/category/sport-fitness') }}">Sport & Fitness</a></li>
                           <li><a href="{{ url('/category/baby-maternity') }}">Baby and Maternity</a></li>
                           <li><a href="{{ url('/category/kids') }}">Kids</a></li>
                           <li><a href="{{ url('/category/appliances') }}">Appliances</a></li>
                           <li><a href="{{ url('/category/camping-recreation') }}">Camping & Recreation</a></li>
                           <li><a href="{{ url('/category/boxing') }}">Boxing</a></li>
                           <li><a href="{{ url('/category/bluetooth-speakers') }}">Bluetooth Speakers</a></li>
                           <li><a href="{{ url('/category/baby-toys') }}">Baby Toys</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="footer-box">
                        <h4>Help</h4>
                        <ul class="link-page">
                           <li><a href="{{ url('/') }}">Home</a></li>
                           <li><a href="{{ url('careers-opportunities') }}">Careers Opportunities</a></li>
                           <li><a href="{{ url('contact-us') }}">Contact us</a></li>
                           <li><a href="{{ url('foundation') }}">Foundation</a></li>
                           <h4 class="my-account">My Account</h4>
                           <li><a href="{{ url('customer/account-details') }}">Settings</a></li>
                           <li><a href="{{ url('customer/refer-to-friends') }}">Refer a Friend</a></li>
                           <li><a href="{{ url('customer/my-wishlist') }}">Favourites</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="footer-box">
                        <h4>Our Companies</h4>
                        <ul class="our-commanies">
                           <li><img src="{{ url('public/images/f-logo-4.svg') }}" alt="f-logo-4.svg"></li>
                           <li><img src="{{ url('public/images/f-logo-5.svg') }}" alt="f-logo-5.svg"></li>
                           <li><img src="{{ url('public/images/f-logo-6.svg') }}" alt="f-logo-6.svg"></li>
                           <li><img src="{{ url('public/images/f-logo-7.svg') }}" alt="f-logo-7.svg"></li>
                           <li><img src="{{ url('public/images/f-logo-8.svg') }}" alt="f-logo-8.svg"></li>
                           <li><img src="{{ url('public/images/f-logo-9.svg') }}" alt="f-logo-9.svg"></li>
                           <li><img src="{{ url('public/images/f-logo-10.svg') }}" alt="f-logo-10.svg"></li>
                           <li><img src="{{ url('public/images/f-logo-11.svg') }}" alt="f-logo-11.svg"></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="footer-copy-right">
            <div class="container">
               <p>In the spirit of reconciliation, Debit Card Rewards acknowledges the Traditional Custodians of country throughout Australia and their connections to land, sea and community. We pay our respect to their Elders past and present and extend that respect to all Aboriginal and Torres Strait Islander peoples today.</p>
               <div class="left-copy-right"><span>Copyright © 2024 52 Degree LLC / Trademark TM 52 Degree PTY LTD</span></div>
               <div class="right-copy-right">
                  <ul>
                     <li><a href="javascript:void(0)"><img src="{{ url('public/images/social-1.svg') }}" alt="social-1.svg"></a></li>
                     <li><a href="javascript:void(0)"><img src="{{ url('public/images/social-2.svg') }}" alt="social-2.svg"></a></li>
                     <li><a href="javascript:void(0)"><img src="{{ url('public/images/social-3.svg') }}" alt="social-3.svg"></a></li>
                     <li><a href="javascript:void(0)"><img src="{{ url('public/images/social-4.svg') }}" alt="social-4.svg"></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <script src="{{ url('public/js/custom-script.js') }}"></script> 
      <script src="{{ url('public/js/bootstrap.bundle.min.js') }}"></script>
      <script src="https://use.fontawesome.com/774c27057f.js"></script> 
      <script src="{{ url('public/js/custom-all.js') }}"></script>
      <script src="{{ url('public/js/slick-slide.js') }}"></script> 
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src="{{ url('public/js/aos.js') }}"></script> 
      <script src="{{ url('public/js/jquery.validate.min.js') }}"></script>
      <script src="{{ url('public/js/custom-ajax.js') }}"></script>
      <script src="{{ url('public/js/custom-all.js') }}"></script>
      <script>
         AOS.init({
             duration: 1200,
         })
      </script>
      <script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>    
      <script src="https://alexandrebuffet.fr/codepen/slider/slick-animation.min.js"></script>
      <script>
         $('.slider').slick({
           autoplay: true,
           autoplaySpeed: 3000, 
           speed: 1000,
           lazyLoad: 'progressive',
           arrows: false,
           dots: true,
         }).slickAnimation();
      </script>
   </body>
</html>
