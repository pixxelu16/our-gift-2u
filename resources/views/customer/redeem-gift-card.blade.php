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
                <h2>Verify Gift Card</h2>
                <form method="POST" action="#" enctype="multipart/form-data" class="invoice-upload" id="verify_gift_card_form" novalidate="novalidate">
                    <div class="billing-edite-left">
                        <input type="text" name="coupon_code" value="" placeholder="Enter Coupon Code">
                    </div>
                    <div class="upload-button-inv">
                        <input type="submit" value="Verify" class="disable-button">
                    </div>
                    <div class="page-loader" style="display:none;">
                        <div class="img-loader"><img src="{{ url('public/images/loader-img.gif') }}"></div>
                    </div>
                    <div class="verify_gift_card_form_res"></div>
                </form>
            </div>
         </div>
      </div>
   </div>
</div> 
@endsection 