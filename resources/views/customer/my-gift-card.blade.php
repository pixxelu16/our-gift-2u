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
            @if(count($my_coupon_list) >= 1)
              <table>
                <thead>
                  <tr>
                    <th>Coupon Code</th>
                    <th>Expire Date</th>
                    <th>Price</th>
                    <th>Is Used</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($my_coupon_list as $coupon)
                    <tr>
                      <td>{{ $coupon['coupon_detail']['code'] ?? "" }}</a></td>
                      <td>{{ Carbon\Carbon::parse($coupon['coupon_detail']['expire_date'])->format('F j, Y') }}</td>
                      <td>${{ number_format($coupon['coupon_detail']['price'], 2, '.', ',') }}</span> </td>
                      <td>{{ $coupon['coupon_detail']['is_used'] }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 