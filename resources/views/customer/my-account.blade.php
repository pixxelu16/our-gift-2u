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
               <p class="p1">Hello {{ Auth::user()->name }} (not {{ Auth::user()->name }}? <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>)
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
               </form></p>
               <p class="p2">From your account dashboard you can view your <a href="{{ url('/customer/my-orders') }}">recent orders</a>, manage your <a href="{{ url('/customer/addresses') }}">shipping and billing addresses,</a> and <a href="{{ url('/customer/account-details') }}">edit your password and account details.</a></p>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection 