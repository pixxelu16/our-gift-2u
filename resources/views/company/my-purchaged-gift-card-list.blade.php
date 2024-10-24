@extends('layouts.master')
@section('content')
<div class="my-account-saction">
  <div class="container">
    <div class="row">
      <div class="col-md-3"> 
        @include('company.sidebar') </div>
      <div class="col-md-9">
        <div class="my-account-right-box my-order-page">
          <div class="table-order">
            @if(count($purchased_gift_card_list) >= 1)
              <table>
                <thead>
                  <tr>
                    <th>Company Name</th>
                    <th>Date</th>
                    <th>Payment Status</th>
                    <th>Total</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($purchased_gift_card_list as $gift_card)
                    <tr>
                      <td>{{ $gift_card->company_name ?? "" }}</td>
                      <td>{{ Carbon\Carbon::parse($gift_card->created_at)->format('F j, Y') }}</td>
                      <td>{{ $gift_card->payment_status }}</td>
                      <td><span class="color-orenge">${{ $gift_card->order_amount }}</span> </td>
                      <td>
                        <a href="{{ url('company/purchaged-gift-card-detail',$gift_card->id) }}" class="button-table">View</a>
                        <a href="javascript:void(0)" class="button-table send_all_card_to_email" data-gift_card_id="{{ $gift_card->id }}">Send all card to email</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              @else
                <div class="order-box-row no-found">
                  <p>No Purchased Gift Card Found.</p>
                </div>
              @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="sendAllCardToEmailModel" aria-hidden="true" aria-labelledby="sendAllCardToEmailModel" tabindex="-1">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Send All Card To Email</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form action="#" method="POST" id="submit_company_send_all_card">
               <input type="hidden" id="gift_card_id" name="gift_card_id" class="form-control" value="">
               <div class="mb-3">
                  <label for="email" class="form-label">Enter Email</label>
                  <input type="email" id="email" name="email" class="form-control" value="">
               </div>
               <button type="submit" class="btn btn-primary disable-button">Submit</button>
               <div class="submit_company_send_all_card_res mt-3"></div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection 