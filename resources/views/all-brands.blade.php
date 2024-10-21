@extends('layouts.master')
@section('content')

<div class="category-banner">
    <div class="container">
        <div class="category-banner-main">
            <span>Your Next Adventure Starts Here</span>
            <h2>Grab <span class="color-orange">Camping Gear</span><br> at Great Prices</h2>
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
                   </div>
                </li>
                <li>All Brands</li>
             </ul>
          </nav>
       </div>
    </div>
 </div>

 <!--<div class="box-simple">
   <div class="container">
      <span>Account Balance</span><em>$1500</em>
   </div>
</div>-->

 <div class="category">
   <div class="container">
     <div class="category-main">
       <div class="row">

         <div class="col-md-3">
            <div class="menu">
               <ul>
                  <li class="master-tab">
                     <h2>All Brands</h2>
                  </li>
                  <div class="menu-items">
                     @foreach($all_brands as $brands)
                        <li class="menu-item">{{ $brands['name'] }}</li>
                     @endforeach
               </ul>
            </div>
         </div>
          <div class="col-md-9">
            <div class="category-sidebar brands-right-box">
               <div class="row">
                  @php $brand_count = 1; @endphp
                  @foreach($all_brands as $brands)
                     <div class="col-md-4">
                        <div class="brand-logo-box">
                           <img src="{{ url('public/uploads/brands-logos/' . $brands['main_logo']) }}">
                           <div class="product-logo">
                                 <img src="{{ url('public/uploads/brands-logos/' . $brands['logo']) }}">
                           </div>
                        </div>
                     </div>
                     @php $brand_count++; @endphp
                  @endforeach
               </div>
            </div>
          </div>
       </div>
     </div>
   </div>
 </div>
@endsection
