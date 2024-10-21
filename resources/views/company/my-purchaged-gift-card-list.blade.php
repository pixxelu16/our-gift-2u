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
                      <td><a href="{{ url('company/purchaged-gift-card-detail',$gift_card->id) }}" class="button-table">View</a></td>
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
@endsection 