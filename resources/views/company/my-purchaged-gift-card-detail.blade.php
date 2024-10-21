@extends('layouts.master')
@section('content')
<div class="my-account-saction">
   <div class="container">
      <div class="row">
         <div class="col-md-3"> 
          @include('company.sidebar') 
        </div>
         <div class="col-md-9">
            @if($purchased_gift_card_detail)
            <div class="my-account-right-box order-placed-all">
               <div class="order-placed-box-1">
                  <p><img src="{{ url('public/images/icon-5.svg') }}">Thank you for Purchased Gift Cards.</p>
                  <table>
                     <tbody>
                        <tr>
                           <td><span>Company Name:</span> <span>{{ $purchased_gift_card_detail->company_name ?? "" }}</span></td>
                           <td><span>Date:</span> <span>{{ Carbon\Carbon::parse($purchased_gift_card_detail->created_at)->format('F j, Y') }}</span></td>
                           <td><span>Email:</span> <span>{{ Auth::user()->email }}</span></td>
                           <td><span>Total:</span> <span><strong>${{ $purchased_gift_card_detail->order_amount }}</strong></span></td>
                           <td><span>Payment Method:</span> <span>{{ $purchased_gift_card_detail->payment_method_type  }}</span></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <div class="order-placed-box-2">
                  <h3>Gift Cards List</h3>
                  <span class="export-button"><a href="{{ url('company/export-corporate-gift-cards', $purchased_gift_card_detail->id) }}" class="button-table">Export</a></span>
                  <div class="sent_link_coupon_code_res"></div>
                  <table class="table">
                     <thead> 
                        <tr>
                           <th>Coupon Code</th>
                           <th>Price</th>
                           <th>Expire Date</th>
                           <th>Is Used</th>
                           <th>Action</th>
                        </tr>
                     </thead> 
                     <tbody> 
                        @foreach($purchased_gift_card_detail->coupon_code_list as $coupon_code)
                        <tr>
                            <td>{{ $coupon_code->code }}</td>
                            <td>${{ $coupon_code->price }}</td>
                            <td>{{ Carbon\Carbon::parse($coupon_code->expire_date)->format('F j, Y') }}</td>
                            <td>{{ $coupon_code->is_used }}</td>
                            <td> 
                              <a href="javascript:void(0)" class="button-table issued_coupon_code" data-coupon_id="{{ $coupon_code->id }}">Issued</a>
                              <a href="javascript:void(0)" class="button-table sent_link_coupon_code" data-coupon_id="{{ $coupon_code->id }}">Sent Link</a>
                            </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
            @endif
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="issuedCouponCodeModel" aria-hidden="true" aria-labelledby="issuedCouponCodeModel" tabindex="-1">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Sent Coupon Code</h5>

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form action="#" method="POST" id="submit_company_issued_coupon_code">
               <input type="hidden" id="coupon_code_id" name="coupon_code_id" class="form-control" value="">
               <div class="mb-3">
                  <label for="email" class="form-label">Enter Email</label>
                  <input type="email" id="email" name="email" class="form-control" value="">
               </div>
               <button type="submit" class="btn btn-primary disable-button">Submit</button>
               <div class="submit_company_issued_coupon_code_res mt-3"></div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection