@extends('admin.layouts.master') 
@section('content')
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">
                     All Purchased Gift Cards 
                  </h3>
               </div>
               <div class="card-body">
                  @if (Session::has('success'))
                     <p>{{ Session::get('success') }}</p>
                  @endif
                  @if (Session::has('unsuccess'))
                     <p> {{ Session::get('unsuccess') }}</p>
                  @endif
                  <table class="table table-bordered table-hover" id="main_form">
                     <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Payment Status</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($purchased_gift_card_list as $gift_card)
                            <tr>
                                <td>{{ $gift_card->gift_card_detail->name ?? "" }}</td>
                                <td>{{ Carbon\Carbon::parse($gift_card->created_at)->format('F j, Y') }}</td>
                                <td>{{ $gift_card->payment_status }}</td>
                                <td>${{ $gift_card->order_amount }}</td> 
                                <td class="project-actions text-left">
                                    <button class="btn btn-info btn-sm view-purchased-gift-card-detail" data-purchased_id="{{ $gift_card->id }}"><i class="fas fa-pencil-alt"></i> View Coupon Codes</button>
                                </td>
                            </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Modal HTML Structure -->
   <div class="modal fade popup-order-box" id="viewPurchasedGiftCardModal" tabindex="-1" role="dialog" aria-labelledby="viewPurchasedGiftCardModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Purchased Gift Cards Detail</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">
               <div id="viewPurchasedGiftCardModalRes"></div>
            </div>
         </div>
      </div>
   </div>
</section>
</div>
@endsection