@extends('layouts.master')
@section('content')
@if (!Auth::check()) 
  <script type="text/javascript">
    window.location = "{{ url('redeem-center') }}";
  </script> 
@endif
@if(count(session('cart', [])) == 0)
    <script>
        window.location.href = '{{ url("/shop"); }}';
    </script>
@endif

@php
   //Other Setting
   $table_admin_fee = 0;
   $table_insurance_fee = 0;
   $table_tax = 0;
   if(isset($other_setting) && count($other_setting) >= 1){
      $table_admin_fee = $other_setting['admin_fee'] ?? 0;
      $table_insurance_fee = $other_setting['insurance_fee'] ?? 0;
      $table_tax = $other_setting['tax'] ?? 0;
   }

   // Initialize the applied gift card amount
   $applied_cart_amount = 0;
   // Check if the applied gift card coupon exists in the session
   if (session()->has('applied_cart_coupon')) {
      // Get the discount value from the session
      $applied_cart_amount = session('applied_cart_coupon')['discount'];
   }

   //Total calculate
   $cart_sub_total_amount = 0;
   $cart_total_amount = 0;
   $postage_handling_charges = 0;
   $cart_points_total_amount = 0;
   foreach(session('cart', []) as $key => $item){
      $cart_sub_total_amount += $item['price'] * $item['quantity']; 
      $cart_total_amount += $item['price'] * $item['quantity'];  
      $postage_handling_charges += $item['shipping_price'];  

      //Check if points apply
      if(isset($item['is_points_apply']) && count($item['is_points_apply']) >= 1){
         $cart_points_total_amount += $item['is_points_apply']['points_price'];
      }
   }

   //Cal Postage Handling Charges Fees
   $discount_amount = ($cart_total_amount * $table_insurance_fee) / 100; 
   $total_cost = $cart_total_amount-$discount_amount; 
   $international_local_insurance = number_format($discount_amount, 2, '.', ','); 
   
   //Cal Sub total
   $sub_total_amount2 = $cart_total_amount-$cart_points_total_amount+$postage_handling_charges+$table_admin_fee+$international_local_insurance;
   $sub_total_amount = $sub_total_amount2-$applied_cart_amount;

   //Cal Tax
   $tax_discount_amount = ($sub_total_amount * $table_tax) / 100; 
   $tax_total_amount = number_format($tax_discount_amount, 2, '.', ','); 

   //Call Total Amount
   $total_amount2 = $cart_total_amount-$cart_points_total_amount+$postage_handling_charges+$table_admin_fee+$international_local_insurance+$tax_total_amount;
   $total_amount = $total_amount2-$applied_cart_amount;
@endphp
<div class="cart-page-saction">
   <div class="container">
      <h2>Shopping Cart</h2>
      <div class="cart-all-box">
         <div class="row">
            <div class="col-md-8">
               <div class="left-box-cart">
                  <div class="remove_cart_item_res"></div>
                  <div class="remove_cart_points_res"></div>
                  <table>
                     <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                     </tr>
                     @foreach(session('cart', []) as $key => $item)
                      <tr>
                          <td>
                            <a href="{{ url('product',$item['product_slug']) }}">
                                <div class="product-image-td"><img src="{{ url('public/uploads/products/'.$item['image']) }}" alt="{{ $item['image'] }}" /></div>
                                <div class="product-name-td">{{ $item['product_name'] }}</div>
                            </a>
                          </td>
                          <td class="price-td">${{ number_format($item['price'], 2, '.', ',') }}</td>
                          <td>
                            <div class="quantity">
                                <button class="minus" aria-label="Decrease">&minus;</button>
                                <input type="number" class="input-box" value="{{ $item['quantity'] }}" min="1" max="{{ $item['quantity'] }}">
                                <button class="plus" aria-label="Increase">&plus;</button>
                            </div>
                          </td>
                          <td class="price-td">${{ number_format($item['price'], 2, '.', ',') }}
                            <button class="remove_cart_item" data-item_id="{{ $item['itemId'] }}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                          </td>
                      </tr>
                     @endforeach
                  </table>
                  <form action="#" method="POST" id="submit_cart_coupon_code_form">
                     <div class="box-shoping-continew">
                        <!--<p>Continue Shopping</p>-->
                        <a href="{{ url('gift-cards') }}" class="update-cart">Continue Shopping</a>
                        <div class="wps_wpr_apply_custom_points">
                           <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon Code">
                           <button type="submit" class="button disable-button">Apply Coupon Code</button>
                           <!--<p class="wps_wpr_restrict_user_message">Your available points:2500</p>-->
                           <div class="submit_cart_coupon_code_form_res"></div>
                        </div>
                     </div>
                  <form>
               </div>
            </div>
            <div class="col-md-4">
               <div class="cart-right-box">
                  <!--<h3>Coupon apply</h3>
                  <div class="coupon-apply">
                     <input type="text" placeholder="Enter coupon code here..." />
                     <button>Apply</button>
                  </div>-->
                  <div class="cart-totals">
                     <h3>Cart totals</h3>
                     <table>
                        <tbody>
                           <tr>
                              <td>Item Price</td>
                              <td class="price-td td-text-right">${{ number_format($cart_sub_total_amount, 2, '.', ',') }}</td>
                           </tr>
                           <!--<tr>
                              <td>Shipping</td>
                              <td class="td-text-right">Flat rate including handling and<br />
                                 insurance: $49.95
                              </td>
                           </tr>
                           <tr>
                              <td></td>
                              <td class="td-text-right">Shipping to Victoria.</td>
                           </tr>
                           <tr>
                              <td></td>
                              <td class="td-text-right change-address">Change address <i class="fa fa-truck" aria-hidden="true"></i></td>
                           </tr>-->
                           <tr>
                              <td>Postage And Handling Charges</td>
                              <td class="price-td td-text-right">${{ $postage_handling_charges }}</td>
                           </tr>
                           <tr>
                              <td>International And Local Insurance</td>
                              <td class="price-td td-text-right">${{ $international_local_insurance; }}</td>
                           </tr>
                           <tr>
                              <td>Admin Fees</td>
                              <td class="price-td td-text-right">${{ $table_admin_fee; }}</td>
                           </tr>
                           @if(session()->has('applied_cart_coupon'))
                              <tr>
                                 <td>Coupon Amount</td>
                                 <td class="price-td td-text-right">-${{ $applied_cart_amount }}</td>
                              </tr>
                           @endif
                           <tr>
                              <td class="totle-sub">Sub Total</td>
                              <td class="price-td td-text-right totle-sub">${{ number_format($sub_total_amount, 2, '.', ',') }}</td>
                           </tr>
                           <tr>
                              <td>GST <span class="inc">Incl<span></td>
                              <td class="price-td td-text-right">${{ $tax_total_amount; }}</td>
                           </tr>
                           <tr>
                              <td class="totle-sub">Total</td>
                              <td class="price-td td-text-right totle-sub">${{ number_format($total_amount, 2, '.', ',') }}</td>
                           </tr>
                        </tbody>
                     </table>
                     <a href="{{ url('checkout') }}"><button type="button">Proceed to checkout</button></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection