@extends('layouts.master')
@section('content')
<div class="my-account-saction">
   <div class="container">
      <div class="row">
         <div class="col-md-3">
            @include('customer.sidebar')
         </div>
         <div class="col-md-9">
            <div class="my-account-right-box">
               <p>The following addresses will be used on the checkout page by default.</p>
               <div class="adress-box-inner">
                  <p><strong>Billing address</strong></p>
                  @if($user_billing_detail)
                     @if($user_billing_detail->billing_name) 
                        <a href="{{ url('/customer/edit-billing-address') }}">Edit</a>
                        <p>{{ $user_billing_detail->billing_name }}<br />
                           {{ $user_billing_detail->billing_contact }},<br /> {{ $user_billing_detail->billing_street_address }}, {{ $user_billing_detail->billing_city }}, {{ $user_billing_detail->billing_state }}, {{ $user_billing_detail->billing_post_code }}, {{ $user_billing_detail->billing_country }} 
                        </p>
                     @else 
                        <i>You have not set up this type of address yet. </i>
                        <a href="{{ url('/customer/edit-billing-address') }}">Add</a>
                     @endif
                  @else  
                     <i>You have not set up this type of address yet. </i>
                     <a href="{{ url('/customer/edit-billing-address') }}">Add</a>
                  @endif
               </div>
               <div class="adress-box-inner">
                  <p><strong>Shipping address</strong></p>
                  @if($user_shipping_detail)
                     @if($user_shipping_detail->shipping_name)
                        <a href="{{ url('/customer/edit-shipping-address') }}">Edit</a>
                        <p>{{ $user_shipping_detail->shipping_name }}<br />
                           {{ $user_shipping_detail->shipping_contact }}<br />
                           {{ $user_shipping_detail->shipping_street_address }}, {{ $user_shipping_detail->shipping_city }}, {{ $user_shipping_detail->shipping_state }}, {{ $user_shipping_detail->shipping_post_code }}, {{ $user_shipping_detail->shipping_country }} 
                        </p>
                     @else 
                        <i>You have not set up this type of address yet. </i>
                        <a href="{{ url('/customer/edit-shipping-address') }}">Add</a>
                     @endif
                  @else 
                     <i>You have not set up this type of address yet. </i>
                     <a href="{{ url('/customer/edit-shipping-address') }}">Add</a>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection 