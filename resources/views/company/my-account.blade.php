@extends('layouts.master')
@section('content')
<div class="my-account-saction">
   <div class="container">
      <div class="row">
         <div class="col-md-3">
            @include('company.sidebar')
         </div>
         <div class="col-md-9">
            <div class="my-account-right-box">
               <p class="p1">Hello {{ Auth::user()->name }} (not {{ Auth::user()->name }}? <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>)
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
               </form></p>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection