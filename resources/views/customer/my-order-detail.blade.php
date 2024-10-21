@extends('layouts.master')
@section('content')
<div class="my-account-saction">
   <div class="container">
      <div class="row">
         <div class="col-md-3"> 
          @include('customer.sidebar') 
        </div>
         <div class="col-md-9">
          @if($order_detail)
            <div class="my-account-right-box billing-edite-address-all">
               <div class="billing-edite-address">
                  <p>Order <strong>#{{ $order_detail->id }}</strong> was placed on <strong>{{ Carbon\Carbon::parse($order_detail->created_at)->format('F j, Y') }}</strong> and is currently <strong>{{ $order_detail->status }}</strong></p>
                  <h2>Order details</h2>
                  <div class="table-order my-order-detail">
                     <table>
                        <thead>
                           <tr>
                              <th>Product</th>
                              <th>Total</th>
                           </tr>
                        </thead>
                        <tbody>
                          @foreach($order_detail->order_items as $order_item)
                           <tr>
                              <td><a href="javascript:void(0)">{{ $order_item->product_name }}</a> <strong class="product-quantity">×&nbsp;{{ $order_item->quantity }}</strong></td>
                              <td class="color-orenge"><span class="woocommerce-Price-currencySymbol">$</span>{{ $order_item->price }}</td>
                           </tr>
                           @endforeach
                        </tbody>
                        <tfoot>
                           @if($order_detail->point_price)
                           <tr>
                              <td><strong>Points:</strong></td>
                              <td>
                                 <strong class="color-orenge">-${{ $order_detail->point_price }}</strong>
                              </td>
                           </tr>
                           @endif
                           @if($order_detail->shiping_charges)
                           <tr>
                              <td><strong>Postage And Handling Charges:</strong></td>
                              <td>
                                 <strong class="color-orenge">${{ $order_detail->shiping_charges }}</strong>
                              </td>
                           </tr>
                           @endif
                           @if($order_detail->insurance_fee)
                           <tr>
                              <td><strong>International And Local Insurance:</strong></td>
                              <td>
                                 <strong class="color-orenge">${{ $order_detail->insurance_fee }}</strong>
                              </td>
                           </tr>
                           @endif
                           @if($order_detail->admin_fee)
                           <tr>
                              <td><strong>Admin Fees:</strong></td>
                              <td>
                                 <strong class="color-orenge">${{ $order_detail->admin_fee }}</strong>
                              </td>
                           </tr>
                           @endif
                           @if($order_detail->total_tax)
                           <tr>
                              <td><strong>Tax:</strong></td>
                              <td>
                                 <strong class="color-orenge">${{ $order_detail->total_tax }}</strong>
                              </td>
                           </tr>
                           @endif
                           <tr>
                              <td><strong>Subtotal:</strong></td>
                              <td><strong class="color-orenge">${{ $order_detail->sub_total }}</strong></td>
                           </tr>
                           <tr>
                              <td><strong>Total:</strong></td>
                              <td><strong class="color-orenge">${{ $order_detail->order_amount }}</strong></td>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
                  <div class="my-order-detail-box">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="my-order-detail-box-inner">
                              <h4>Billing address</h4>
                              <ul>
                                 <li>{{ $order_detail->billing_address->name }}</li>
                                 <li>{{ $order_detail->billing_address->contact_number }}</li>
                                 <li> {{ $order_detail->billing_address->address }}, {{ $order_detail->billing_address->street_address }}, {{ $order_detail->billing_address->city }}, {{ $order_detail->billing_address->pincode }}, {{ $order_detail->billing_address->state }}, {{ $order_detail->billing_address->country }}</li>
                                 <li><img src="{{ url('public/images/p-svg.svg') }}" alt="p-svg.svg">{{ $order_detail->billing_address->contact_number }}</li>
                                 <li><img src="{{ url('public/images/m-svg.svg') }}" alt="#">{{ $order_detail->billing_address->email }}</li>
                              </ul>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="my-order-detail-box-inner">
                              <h4>Shipping address</h4>
                              @if($order_detail->billing_address->shipping_method == "Yes")
                                <ul>
                                  <li>{{ $order_detail->billing_address->shipping_name }}</li>
                                  <li>{{ $order_detail->billing_address->shipping_contact_number }}</li>
                                  <li>{{ $order_detail->billing_address->shipping_address }}, {{ $order_detail->billing_address->shipping_street_address }}, {{ $order_detail->billing_address->shipping_city }}, {{ $order_detail->billing_address->shipping_state }}, {{ $order_detail->billing_address->shipping_pincode }}, {{ $order_detail->billing_address->shipping_country }}</li>
                                  <li><img src="{{ url('public/images/p-svg.svg') }}" alt="p-svg.svg">{{ $order_detail->billing_address->shipping_contact_number }}</li>
                                  <li><img src="{{ url('public/images/m-svg.svg') }}" alt="#">{{ $order_detail->billing_address->shipping_email }}</li>
                                </ul>
                              @else 
                                <ul>
                                  <li>{{ $order_detail->billing_address->name }}</li>
                                  <li>{{ $order_detail->billing_address->contact_number }}</li>
                                  <li>{{ $order_detail->billing_address->address }}, {{ $order_detail->billing_address->street_address }}, {{ $order_detail->billing_address->city }}, {{ $order_detail->billing_address->pincode }}, {{ $order_detail->billing_address->state }}, {{ $order_detail->billing_address->country }}</li>
                                  <li><img src="{{ url('public/images/p-svg.svg') }}" alt="p-svg.svg">{{ $order_detail->billing_address->contact_number }}</li>
                                  <li><img src="{{ url('public/images/m-svg.svg') }}" alt="#">{{ $order_detail->billing_address->email }}</li>
                                </ul>
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endif
         </div>
      </div>
   </div>
</div>
@endsection