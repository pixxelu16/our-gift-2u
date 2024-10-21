@extends('layouts.master')
@section('content')
<div class="my-account-saction">
   <div class="container">
      <div class="row">
         <div class="col-md-3">
            @include('customer.sidebar')
         </div>
         <div class="col-md-9">
            <div class="my-account-right-box upload-invoice">
                <h2>Invite Friend</h2>
                <form method="POST" action="#" enctype="multipart/form-data" class="invoice-upload" id="invite_friend_to_refer" novalidate="novalidate">
                    <div class="billing-edite-left">
                        <input type="email" name="email" value="" placeholder="Enter Email">
                    </div>
                    <div class="upload-button-inv">
                        <input type="submit" value="Submit" class="disable-button">
                    </div>
                    <div class="page-loader" style="display:none;">
                        <div class="img-loader"><img src="{{ url('public/images/loader-img.gif') }}"></div>
                    </div>
                    <div class="invite_friend_to_refer_responce"></div>
                </form>
            </div>
         </div>
      </div>
   </div>
</div> 
@endsection 