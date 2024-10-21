@extends('layouts.master')
@section('content')
<div class="my-account-saction">
  <div class="container">
    <div class="row">
      <div class="col-md-3"> 
        @include('customer.sidebar') </div>
      <div class="col-md-9">
        <div class="my-account-right-box my-order-page">
          <div class="table-order">
            @if(count($all_orders) >= 1)
              <table>
                <thead>
                  <tr>
                    <th>Order</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($all_orders as $order)
                    <tr>
                      <td><a href="{{ url('customer/my-order-detail',$order->id) }}" class="color-orenge">#{{ $order->id }}</a></td>
                      <td>{{ Carbon\Carbon::parse($order->created_at)->format('F j, Y') }}</td>
                      <td>{{ $order->status }}</td>
                      <td><span class="color-orenge">${{ $order->order_amount }}</span> </td>
                      <td><a href="{{ url('customer/my-order-detail',$order->id) }}" class="button-table">View</a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              @else
                <div class="order-box-row no-found">
                  <p>No Order Found.</p>
                </div>
              @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 