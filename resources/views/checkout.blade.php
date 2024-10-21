@extends('layouts.master')
@section('content')
@if (!Auth::check())
   <script type="text/javascript">
      window.location = "{{ url('redeem-center') }}";
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
      <h2>Checkout</h2>
      <div class="row">
         <div class="col-md-7">
            <form action="#" method="POST" id="submit_checkout_form">
               <div class="checkout-box-left">
                  <div class="step-one">
                     <h3>1. Contact information</h3>
                     <p>We'll use this email to send you details and updates about your order.</p>
                     <input type="email" name="customer_email" id="customer_email" value="{{ Auth::user()->email }}" placeholder="Email Address" />
                  </div>
                  <div class="step-tow">
                     <h3>2. Billing address</h3>
                     <p>Enter the address where you want your order delivered.</p>
                     <div class="left-checkout-input">
                        <input type="text" name="fname" id="fname" value="{{ Auth::user()->first_name }}" placeholder="First Name" />
                     </div>
                     <div class="right-checkout-input">
                        <input type="text" name="lname" id="lname" value="{{ Auth::user()->last_name }}" placeholder="Last Name" />
                     </div>
                     <div class="full-checkout-input">
                        <textarea placeholder="Address" name="address" id="address">{{ $user_address_detail->billing_street_address }}</textarea>
                     </div>
                     <div class="full-checkout-input">
                        <input type="text" name="address2" id="address2" value="{{ $user_address_detail->billing_street_address }}" placeholder="Apartment, suite, etc. (optional)" />
                     </div>
                     <div class="full-checkout-input">
                        <input type="text" name="city" id="city" value="{{ $user_address_detail->billing_city }}" placeholder="City" />
                     </div>
                     <div class="left-checkout-input">
                        <select name="country" id="country" class="select_country" required>
                           <option value="">Please Select</option>
                           @foreach($all_country_list as $country_detail)
                              <option value="{{ $country_detail->name }}" 
                                    data-country_id="{{ $country_detail->id }}" 
                                    @if($country_detail->name == $user_address_detail->billing_country) 
                                       selected 
                                    @endif>
                                 {{ $country_detail->name }}
                              </option>
                           @endforeach

                        </select>
                     </div>
                     <div class="right-checkout-input">
                        <select name="state" id="state" class="select_states" required>
                           <option value="{{ $user_address_detail->billing_state }}" data-state_id="" selected>{{ $user_address_detail->billing_state }}</option>
                        </select>
                     </div>
                     <div class="left-checkout-input">
                        <input type="text" name="post_code" id="post_code" value="{{ $user_address_detail->billing_post_code }}" placeholder="Postcode" onkeypress="return onlyNumber(event)"/>
                     </div>
                     <div class="right-checkout-input">
                        <input type="text" name="phone_number" id="phone_number" value="{{ $user_address_detail->billing_contact }}" placeholder="Phone" onkeypress="return onlyNumber(event)"/>
                     </div>
                  </div>
                  <div class="check-button-row">
                     <div class="form-group">
                        <input type="checkbox" name="is_same_as_billing_address" id="is_same_as_billing_address" value="Yes">
                        <label for="is_same_as_billing_address">(Same as Billing Address)</label>
                     </div>
                     <div class="step-tow" id="is_shiping_address_form" style="display:none;"> 
                        <input type="email" name="shiping_customer_email" id="shiping_customer_email" value="" placeholder="Email Address" />
                        <div class="left-checkout-input">
                           <input type="text" name="shiping_fname" id="shiping_fname" value="" placeholder="First Name" />
                        </div>
                        <div class="right-checkout-input">
                           <input type="text" name="shiping_lname" id="shiping_lname" value="" placeholder="Last Name" />
                        </div>
                        <div class="full-checkout-input">
                           <textarea placeholder="Address" name="shiping_address" id="shiping_address"></textarea>
                        </div>
                        <div class="full-checkout-input">
                           <input type="text" name="shiping_address2" id="shiping_address2" value="" placeholder="Apartment, suite, etc. (optional)" />
                        </div>
                        <div class="full-checkout-input">
                           <input type="text" name="shiping_city" id="shiping_city" value="" placeholder="City" />
                        </div>
                        <div class="left-checkout-input">
                           <input type="text" name="shiping_country" id="shiping_country" value="" placeholder="Country"/>
                        </div>
                        <div class="right-checkout-input">
                           <input type="text" name="shiping_state" id="shiping_state" value="" placeholder="State"/>
                        </div> 
                        <div class="left-checkout-input">
                           <input type="text" name="shiping_post_code" id="shiping_post_code" value="" placeholder="Postcode" onkeypress="return onlyNumber(event)"/>
                        </div> 
                        <div class="right-checkout-input">
                           <input type="text" name="shiping_phone_number" id="shiping_phone_number" value="" placeholder="Phone" onkeypress="return onlyNumber(event)"/> 
                        </div>
                     </div> 
                  </div>
                  <div class="check-button-row">
                     <div class="form-group">
                        <input type="checkbox" name="is_order_note" id="is_order_note" value="Yes">
                        <label for="is_order_note">Add a note to your order</label>
                     </div>
                     <textarea id="order_note_desc" name="order_note_desc" placeholder="Notes about your order, e.g. special notes for delivery." style="display:none;"></textarea>
                  </div>
                  <div class="step-three">
                     <h3>4. Payment options</h3>
                     <!--<p class="payment">
                        <input type="radio" id="cash_on_delivery" name="payment_method" value="Cash On Delivery" checked="checked">
                        <label for="cash_on_delivery">Cash on delivery</label>
                     </p>-->
                     <!--Stripe Payment-->
                     <input type="hidden" name="payment_method" value="Stripe">
                     <div class="credit-card-form">
                        <div class="card-image-left">
                           <img src="{{ url('public/images/visaa.png') }}">
                        </div>
                        <div class="card-form-right">
                           <div id="card-element"></div>
                        </div>
                        <div class="submit-btn">
                           <div id="card-errors" role="alert"></div>
                        </div>
                     </div>
                  </div>
                  <div class="check-button-row">
                     <div class="form-group">
                        <input type="checkbox" name="is_term_condition" id="is_term_condition" value="Yes">
                        <label for="is_term_condition">By proceeding with your purchase you agree to our <a href="{{ url('terms-and-conditions') }}">Terms and Conditions</a> and <a href="{{ url('privacy-policy') }}">Privacy Policy</a></label>
                     </div>
                  </div> 
                  <div class="place-order-btn">
                     <button type="submit" class="disable-button" disabled>Place Order</button>
                     <div class="submit_checkout_form_res"></div>
                  </div>
               </div>
            </form>
         </div>
         <div class="col-md-5">
               <div class="checkout-box-right">
                  <div class="order-summery">
                     <h3>Order summary</h3>
                     @foreach(session('cart', []) as $key => $item)
                        <div class="product-left-img">
                           <img src="{{ url('public/uploads/products/'.$item['image']) }}" alt="{{ $item['image'] }}">
                        </div>
                        <div class="product-right-name">
                           <span>{{ $item['product_name'] }}</span>
                           <strong>${{ number_format($item['price'], 2, '.', ',') }}</strong>
                           <span>{!! Str::words($item['short_description'], 20, '...') !!}</span>
                        </div>
                     @endforeach
                     <form action="#" method="POST" id="submit_cart_coupon_code_form">
                        <div class="box-shoping-continew">
                           <div class="wps_wpr_apply_custom_points">
                              <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon Code">
                              <button type="submit" class="button disable-button">Apply Coupon Code</button>
                              <div class="submit_cart_coupon_code_form_res"></div>
                           </div>
                        </div>
                     <form>
                  </div> 
                  <!--<div class="add-coupn"><a href="#">Add a coupon</a></div>-->
                  <div class="table-price">
                     <table>
                        <tbody>
                           <tr>
                              <td>Item Price</td>
                              <td><strong>${{ number_format($cart_sub_total_amount, 2, '.', ',') }}</strong></td>
                           </tr>
                           @if($cart_points_total_amount >= 1)
                           <tr>
                              <td>Points</td>
                              <td><strong>-${{ number_format($cart_points_total_amount, 2, '.', ',') }} </strong></td>
                           </tr>
                           @endif
                           <!--<tr>
                              <td>Shipping
                                 <span>Flat rate including handling and insurance</span>
                                 <span>Shipping to Victoria, Australia </span>
                              </td>
                              <td><strong>$49.95</strong></td>
                           </tr>-->
                           <tr>
                              <td>Postage And Handling Charges</td>
                              <td><strong>${{ number_format($postage_handling_charges, 2, '.', ',') }} </strong></td>
                           </tr>
                           <tr>
                              <td>International And Local Insurance</td>
                              <td><strong>${{ number_format($international_local_insurance, 2, '.', ',') }} </strong></td>
                           </tr>
                           <tr>
                              <td>Admin Fees</td>
                              <td><strong>${{ $table_admin_fee; }} </strong></td>
                           </tr>
                           @if(session()->has('applied_cart_coupon'))
                              <tr>
                                 <td>Coupon Amount</td>
                                 <td><strong>-${{ $applied_cart_amount }}</strong></td>
                              </tr>
                           @endif
                           <tr>
                              <td>Sub Total</td>
                              <td><strong>${{ number_format($sub_total_amount, 2, '.', ',') }}</strong></td>
                           </tr>
                           <tr>
                              <td>GST <span class="inc">Incl<span></td>
                              <td><strong>${{ $tax_total_amount; }}</strong></td>
                           </tr>
                           <tr>
                              <td>Total</td>
                              <td><strong>${{ number_format($total_amount, 2, '.', ',') }}</strong></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <!--<div class="apyly-store">
                     <h3>Apply store credit discounts?</h3>
                     <span><strong>$0.00</strong> available store credits.</span>
                     <p>Enter the amount of store credits you want to apply as discount for this order.</p>
                     <input type="text" name="credit_amount" id="credit_amount" values="" placeholder="Enter amount" onkeypress="return onlyNumber(event)"/>
                     <button type="submit" class="disable-button2">Apply</button>
                     <div class="submit_store_credit_form_res"></div>
                  </div>-->
               </div>
         </div>
      </div>
   </div>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script>
   function onlyNumber(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57)){
            return false;
         }
      return true;
   }
   //Stripe Detail Start
   //var stripe = Stripe('pk_test_51H0nPoDvceTrdDqdDyON6VKbZKqutj1dkXymETGv0UiNk8SxtHyVljdLbl5WkFmTCqnAts6bKiCJdgfPjT9KtF4300mzrxVmt5');
   var stripeSecretKey = "{{ env('STRIPE_PUBLISHABLE_KEY') }}";
   var stripe = Stripe(stripeSecretKey);
   var elements = stripe.elements({
      fonts: [
         {
            cssSrc: 'https://fonts.googleapis.com/css?family=Roboto',
         },
      ],
      locale: window.__exampleLocale
   });
   var card = elements.create('card', {
      iconStyle: 'solid',
      style: {
         base: {
            iconColor: '#000',
            color: '#000',
            fontWeight: 500,
            fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
            fontSize: '16px',
            fontSmoothing: 'antialiased',

            ':-webkit-autofill': {
            color: '#000',
            },
            '::placeholder': {
            color: '#000',
            },
         },
         invalid: {
            iconColor: '#FFC7EE',
            color: '#FFC7EE',
         },
      },
   });
   card.mount('#card-element');
   //Stripe Detail End
</script>
@endsection