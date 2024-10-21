@extends('layouts.master')
@section('content')
<div class="my-account-saction">
   <div class="container">
      <div class="row">
         <div class="col-md-3"> 
            @include('customer.sidebar') 
         </div>
         <div class="col-md-9">
            <div class="my-account-right-box billing-edite-address-all">
               <div class="billing-edite-address">
                  @if (Session::has('success'))
                  <div class="notifaction-green">
                     <p>{{ Session::get('success') }}</p>
                  </div>
                  @endif
                  @if (Session::has('unsuccess'))
                  <div class="notifaction-red">
                     <p> {{ Session::get('unsuccess') }}</p>
                  </div>
                  @endif
                  <form action="{{ route('customer.submit_account_detail') }}" Method="POST">
                     @csrf
                     <div class="billing-edite-left">
                        <label>First Name</label>
                        <input type="text" name="first_name" value="{{ Auth::user()->first_name }}" placeholder="First Name" />
                     </div>
                     <div class="billing-edite-right">
                        <label>Last Name</label>
                        <input type="text" name="last_name" value="{{ Auth::user()->last_name }}" placeholder="Last Name" />
                     </div>
                     <div class="billing-edite-full">
                        <label>Display name</label>
                        <input type="text" name="name" value="{{ Auth::user()->name }}" placeholder="" disabled/>
                     </div>
                     <em>This will be how your name will be displayed in the account section and in reviews</em> 
                     <div class="billing-edite-full">
                        <label>Email address</label>
                        <input type="email" name="email" value="{{ Auth::user()->email }}" placeholder="Email address" disabled />
                     </div>
                     <span>Password change</span>
                     <div class="billing-edite-left">
                        <label>Current password (leave blank to leave unchanged)</label>
                        <input type="password" name="current_password" value="" placeholder="******" />
                     </div>
                     <div class="billing-edite-right">
                        <label>New password (leave blank to leave unchanged)</label>
                        <input type="password" name="new_password" value="" placeholder="******" />
                     </div>
                     <div class="billing-edite-full">
                        <label>Confirm new password</label>
                        <input type="password" name="confirm_new_password" value="" placeholder="******" />
                     </div>
                     <div class="billing-edite-button">
                        <button type="submit">Save</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection