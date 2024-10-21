@extends('layouts.master')
@section('content')

@if (!Auth::check())
   <script type="text/javascript">
      window.location = "{{ url('redeem-center') }}";
   </script>
@endif

<div class="redeem-center-saction">
   <div class="container">
      <div class="row">
        
        
        <div class="features-page-all">
        <div class="row">
        <div class="col-md-3">
        <div class="features-box">
        <div class="icon-feature"><img src="{{ url('public/images/icon-1.svg') }}"></div>
        <div class="text-feature">
        <h3>Earn Rewards points </h3>
        <p>Free to join-no fees </p>
        </div>
        </div>
        </div>
        <div class="col-md-3">
        <div class="features-box">
        <div class="icon-feature"><img src="{{ url('public/images/icon-2.svg') }}"></div>
        <div class="text-feature">
        <h3>Free Shipping Australia Wide </h3>
        <p>Orders from $500</p>
        </div>
        </div>
        </div>
        <div class="col-md-3">
        <div class="features-box">
        <div class="icon-feature"><img src="{{ url('public/images/icon-3.svg') }}"></div>
        <div class="text-feature">
        <h3>debit card rewards</h3>
        <p>earn points-no fees </p>
        </div>
        </div>
        </div>
        <div class="col-md-3">
        <div class="features-box">
        <div class="icon-feature"><img src="{{ url('public/images/icon-4.svg') }}"></div>
        <div class="text-feature">
        <h3>Gift Vouchers</h3>
        <p>turn your points into a gift vouche</p>
        </div>
        </div>
        </div>
        </div>
        </div>
        
        
        
      </div>
   </div>
</div>
@endsection 