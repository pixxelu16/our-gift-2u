@extends('layouts.master')
@section('content')
<div class="category-banner banner-mobile-image">
   <div class="container">
      <div class="category-banner-main">
         <span>Your Next Adventure Starts Here</span>
         <h2>Grab  <span class="color-orange">{{ $category_product_list['name'] ?? "" }}</span><br>  at Great Prices</h2>
         <p>Limited Time. T&C apply.</p>
      </div>
      {!! Helper::mini_cart() !!}
   </div>
</div>
<div class="category-home">
   <div class="container">
      <div class="category-home-main">
         <nav class="breadcrumb">
            <ul class="breadcrumb-links">
               <li>
                  <a href="{{ url('/')}}" class="breadcrumb-box">
                  <span href="{{ url('/') }}" class="breadcrumb-text">Home</span>
                  </a>
               </li>
               <li>
                  <div class="breadcrumb-box">
                     <svg class="breadcrumb-icon" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                     </svg>
                     <span class="breadcrumb-text">{{ $category_product_list['name'] ?? "" }}</span>
                  </div>
               </li>
            </ul>
         </nav>
         <!--<span class="nunito">All Categories</span>-->
      </div>
   </div>
</div>


<div class="category">
   <div class="container">
      <div class="category-main">
         <div class="row">
            <div class="col-md-3">
               <div class="menu">
                  <ul>
                     <li class="master-tab">
                        <h2>Categories</h2>
                     </li>
                     <div class="menu-items">
                        {!! Helper::single_category_dropdown_list() !!}
                        <!--<li class="menu-item">
                           <a href="#">Appliances <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                           <ul class="submenu">
                               <li><a href="#">Blenders</a></li>
                               <li><a href="#">Coffee Machines</a></li>
                               <li><a href="#">Ironing</a></li>
                               <li><a href="#">Kettles & Toasters</a></li>
                               <li><a href="#">Multi Cookers</a></li>
                               <li><a href="#">Sandwich Makers</a></li>
                           </ul>
                           </li>-->
                     </div>
                  </ul>
               </div>
            </div>
            <div class="col-md-9">
               <div class="category-sidebar">
                  <div class="row">
                     @if(count($category_product_list['category_products']) >= 1)
                        @foreach($category_product_list['category_products']  as $product)
                        <div class="col-md-4">
                            <div class="category-card">
                            <div class="category-card-img">
                                <a href="{{ url('product',$product['product_detail']['product_slug']) }}">
                                <img src="{{ url('public/uploads/products/'.$product['product_detail']['image']) }}">
                                </a>
                            </div>
                            <div class="category-card-content">
                                <span><a href="{{ url('product',$product['product_detail']['product_slug']) }}">{{ $product['product_detail']['product_name'] ?? "" }}</a></span>
                                <div class="price">
                                 ${{ number_format($product['product_detail']['product_price'], 2, '.', ',') }}                           
                             </div>
                            </div>
                            
                            </div>
                        </div>
                        @endforeach
                     @else
                        <div class="col-md-9">
                            <p>No Product Found.</p>
                        </div>
                     @endif
                  </div>
               </div>
            </div>
         </div>
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
      @if ($home_logos)
      <div class="logo-icon-row">
         <div class="container">
            <ul class="slider-cetageory cetagory-product-slider">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
   $(document).ready(function() {
       // Toggle the visibility of the whole menu when clicking on Categories (master tab)
       /*$('.master-tab > a').click(function(e) {
           e.preventDefault();
           $('.menu-items').slideToggle();  // Show or hide the whole menu items
       });*/
   
       // Toggle individual menu sections
       $('.menu-item > a').click(function(e) {
           e.preventDefault();
           var submenu = $(this).next('.submenu');
           submenu.slideToggle();  // Show or hide the submenu
       });
   
       // Toggle submenu inside submenu (like Fishing)
       $('.submenu-item > a').click(function(e) {
           e.preventDefault();
           var submenu = $(this).next('.submenu');
           submenu.slideToggle();  // Show or hide the inner submenu
       });
   });
   
</script>
@endsection