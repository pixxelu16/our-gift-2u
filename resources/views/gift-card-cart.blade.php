@extends('layouts.master')
@section('content')
@if (!Auth::check()) 
  <script type="text/javascript">
    window.location = "{{ url('redeem-center') }}";
  </script> 
@endif
@if(count(session('gift_card_cart', [])) == 0)
    <script>
        window.location.href = '{{ url("/gift-cards"); }}';
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
   $applied_gift_card_amount = 0;
   // Check if the applied gift card credit exists in the session
   if (session()->has('applied_gift_card_credit')) {
      // Get the amount value from the session 
      $applied_gift_card_amount = session('applied_gift_card_credit')['amount'];
   }

   //Total calculate
   $cart_sub_total_amount = 0;
   $cart_total_amount = 0;
   $postage_handling_charges = 0;
   $cart_points_total_amount = 0;
   foreach(session('gift_card_cart', []) as $key => $item){
      $cart_sub_total_amount += $item['price'] * $item['quantity']; 
      $cart_total_amount += $item['price'] * $item['quantity'];  
   }

   //Cal Postage Handling Charges Fees
   $discount_amount = ($cart_total_amount * $table_insurance_fee) / 100; 
   $total_cost = $cart_total_amount-$discount_amount; 
   $international_local_insurance = number_format($discount_amount, 2, '.', ','); 
   
   //Cal Sub total
   $sub_total_amount2 = $cart_total_amount-$cart_points_total_amount;
   $sub_total_amount = $sub_total_amount2-$applied_gift_card_amount;

   //Cal Tax
   $tax_discount_amount = ($sub_total_amount * $table_tax) / 100; 
   $tax_total_amount = number_format($tax_discount_amount, 2, '.', ','); 

   //Call Total Amount
   $total_amount2 = $cart_total_amount-$cart_points_total_amount+$postage_handling_charges+$table_admin_fee+$international_local_insurance+$tax_total_amount;
   $total_amount =  $total_amount2-$applied_gift_card_amount;
@endphp
<div class="cart-page-saction">
   <div class="container">
      <h2>Shopping Cart</h2>
      <div class="cart-all-box">
         <div class="row">
            <div class="col-md-8">
               <div class="left-box-cart">
                  <div class="remove_gift_card_cart_item_res"></div>
                  <table>
                     <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                     </tr> 
                     @foreach(session('gift_card_cart', []) as $key => $item)
                     @php $cart_item_total_amount = $item['price']*$item['quantity']; @endphp
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
                          <td class="price-td">${{ number_format($cart_item_total_amount , 2, '.', ',') }}
                            <button class="remove_gift_card_cart_item" data-item_id="{{ $item['itemId'] }}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                          </td>
                      </tr>
                     @endforeach
                  </table>
                  @if(!session()->has('applied_gift_card_credit'))
                  <form action="#" method="POST" id="submit_gift_card_credit_cart_form">
                     <div class="box-shoping-continew">
                        <a href="{{ url('gift-cards') }}" class="update-cart">Continue Shopping</a>
                        <div class="wps_wpr_apply_custom_points">
                           @if(Auth::check())
                              <p class="wps_wpr_restrict_user_message">Your Available Balance: ${{ number_format(Auth::user()->total_points, 2, '.', ',') }} </p>
                           @endif
                           <input type="text" name="apply_credit" class="input-text" id="apply_credit" value="" placeholder="Apply Credit">
                           <button type="submit" class="button disable-button">Apply Credit</button>
                           <div class="submit_gift_card_credit_cart_form_res"></div>
                        </div>
                     </div>
                  <form>
                  @endif
               </div>
            </div>
            <div class="col-md-4">
               <div class="cart-right-box">
                  <div class="cart-totals">
                     <h3>Cart totals</h3>
                     <div class="remove_cart_credit_res"></div>
                     <table>
                        <tbody>
                           <tr>
                              <td>Item Price</td>
                              <td class="price-td td-text-right">${{ number_format($cart_sub_total_amount, 2, '.', ',') }}</td>
                           </tr>
                           @if(session()->has('applied_gift_card_credit'))
                              <tr>
                                 <td>Applied Credit Amount</td>
                                 <td class="price-td td-text-right">${{ number_format($applied_gift_card_amount, 2, '.', ',') }}<a href="javascript:void()" class="remove_cart_credit">[Remove Credit]</a></td>
                              </tr>
                           @endif
                           <tr>
                              <td class="totle-sub">Sub Total</td>
                              <td class="price-td td-text-right totle-sub">${{ number_format($sub_total_amount, 2, '.', ',') }}</td>
                           </tr>
                           @if(session()->has('applied_gift_card_credit'))
                           <tr>
                              <td>International And Local Insurance</td>
                              <td class="price-td td-text-right">${{ $international_local_insurance; }}</td>
                           </tr>
                           <tr>
                              <td>Admin Fees</td>
                              <td class="price-td td-text-right">${{ $table_admin_fee; }}</td>
                           </tr>
                           <tr>
                              <td>GST <span class="inc">Incl<span></td>
                              <td class="price-td td-text-right">${{ $tax_total_amount; }}</td>
                           </tr>
                           <tr>
                                 <td class="totle-sub">Total</td>
                                 <td class="price-td td-text-right totle-sub">${{ number_format($total_amount, 2, '.', ',') }}</td>
                              </tr>
                           @endif
                        </tbody>
                     </table>
                     <a href="{{ url('gift-card-checkout') }}"><button type="button">Proceed to checkout</button></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection