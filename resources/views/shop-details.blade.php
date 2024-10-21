@extends('layouts.master')
@section('content')

@if (!Auth::check())
   <script type="text/javascript">
      window.location = "{{ url('redeem-center') }}";
   </script>
@endif

<div class="shop-details-saction-all">
   <div class="container">
      @if($product_detail)
      
      @php
         $discount_percentage = 10; // 90% discount
         $product_cost = $product_detail->product_cost;
         
         // Calculate the discount amount
         $discount_amount = ($product_cost * $discount_percentage) / 100;
         
         // Apply the discount to get the total cost after discount
         $total_cost = $product_cost - $discount_amount;

         // Format the values
         $formatted_total_cost = number_format($product_cost, 2, '.', ',');
         $total_cost_points = $formatted_total_cost*50;
      @endphp

      {!! Helper::increase_product_view_page($product_detail->id) !!}
      <div class="shop-details-saction-inner">
         <div class="row">
            <div class="col-md-5">
               <div class="left-shop-details">
                  <img src="{{ url('public/uploads/products/'.$product_detail->image) }}" alt="{{ $product_detail->image }}">
               </div>
            </div>
            <div class="col-md-7">
               <div class="right-shop-details">
                  <h2>{{ $product_detail->product_name }}</h2>
                  <span class="views"><i class="fa fa-eye" aria-hidden="true"></i> {{ $product_detail->view_count }} Views</span> <span class="sold">Sold: 6,370</span>
                  <ul class="social-media">
                     <li><a href="javascript:void(0)"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                     <li><a href="javascript:void(0)"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                     <li><a href="javascript:void(0)"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                     <li><a href="javascript:void(0)"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                  </ul>
                  <div class="price-detalis">${{ number_format($product_detail->product_price, 2, '.', ',') }}</div>
                  <div class="disc">
                     {!! $product_detail->description !!}
                     <span class="avail">Availability: <em>Available on backorder</em></span>
                     <div class="button-detalis-box">
                        <div class="quantity">
                           <button class="minus" aria-label="Decrease">&minus;</button>
                           <input type="number" class="input-box product_quantity" value="1" min="1" max="1">
                           <button class="plus" aria-label="Increase">&plus;</button>
                        </div>
                        <input type="hidden" id="product_price" name="product_price" value="{{ number_format($product_detail->product_price, 2, '.', ',') }}">
                        <input type="hidden" id="product_cost" name="product_cost" value="{{ number_format($product_detail->product_cost, 2, '.', ',') }}">
                        <input type="hidden" id="default_total_points" name="default_total_points" value="{{ $total_cost_points; }}">
                        <input type="hidden" id="default_total_cost_points" name="default_total_cost_points" value="">
                        <input type="hidden" id="points_value" name="points_value" value="">
                        <input type="hidden" id="points_price_value" name="points_price_value" value="">
                        {!! Helper::is_order_capacity($product_detail->id) !!}
                     </div>
                     <div class="pre_order_now_res"></div>
                     <div class="buy_now_res"></div>
                     <span class="sku">SKU: {{ $product_detail->product_sku }}</span>
                     @if($product_detail->product_category)
                        <p class="categories-list">
                           <strong>Categories:</strong> 
                           @foreach($product_detail->product_category as $product_category)
                              <i>{{ $product_category->category_detail->name }},</i> 
                           @endforeach
                        </p>
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="tab-shop-details">
         <div id="tabs">
            <div class="tab-list">
               <div class="tab whiteborder">Product Description</div>
               <div class="tab">Technical Details</div>
               <div class="tab">Reviews</div>
            </div>
            <div class="tab-box-content">
               <div class="tabContent">
                  {!! $product_detail->short_description !!}
               </div>
               <div class="tabContent">
                  <div class="tab-table">
                     {!! $product_detail->technical_details !!}
                  </div>
               </div>
               <div class="tabContent">
                  <!--<p>There are no reviews yet.</p>-->
                  <span>Be the first to review “STING Elasticized Boxing Hand Wraps, <br />Boxing Equipment for Professional Competition and Training”</span>                  
                  <form id="rating_form">
                     <div class="rating">
                        <div class="rate">
                           <input type="checkbox" id="star1" name="rating[]" value="1" checked />
                           <label for="star5" title="1 stars">
                                 <i class="fa fa-star" aria-hidden="true"></i>
                           </label>
                        </div>
                        <div class="rate">
                           <input type="checkbox" id="star2" name="rating[]" value="2" />
                           <label for="star4" title="2 stars">
                                 <i class="fa fa-star" aria-hidden="true"></i>
                           </label>
                        </div>
                        <div class="rate">
                           <input type="checkbox" id="star3" name="rating[]" value="3" />
                           <label for="star3" title="3 stars">
                                 <i class="fa fa-star" aria-hidden="true"></i>
                           </label>
                        </div>
                        <div class="rate">
                           <input type="checkbox" id="star4" name="rating[]" value="4" />
                           <label for="star2" title="4 stars">
                                 <i class="fa fa-star" aria-hidden="true"></i>
                           </label>
                        </div>
                        <div class="rate">
                           <input type="checkbox" id="star5" name="rating[]" value="5" />
                           <label for="star1" title="5 star">
                                 <i class="fa fa-star" aria-hidden="true"></i>
                           </label>
                        </div>
                     </div>
                     <label>Your review </label>
                     <textarea name="review"></textarea>
                     <input type="hidden" id="product_id" name="product_id" value="{{ $product_detail->id }}">
                     <button type="submit" class="disable-button">Submit</button>
                     <div class="rating-form-res"></div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      @else
         <div class="shop-details-saction-inner">
            <div class="row">
               <div class="col-md-5">
                  <p>No Product Found!</p>
               </div>
            </div>
         </div>
      @endif
   </div>
</div>
<script>
   //Quantity Js Code
   (function () {
     const quantityContainer = document.querySelector(".quantity");
     const minusBtn = quantityContainer.querySelector(".minus");
     const plusBtn = quantityContainer.querySelector(".plus");
     const inputBox = quantityContainer.querySelector(".input-box");
   
     updateButtonStates();
   
     quantityContainer.addEventListener("click", handleButtonClick);
     inputBox.addEventListener("input", handleQuantityChange);
   
     function updateButtonStates() {
       const value = parseInt(inputBox.value);
       minusBtn.disabled = value <= 1;
       plusBtn.disabled = value >= parseInt(inputBox.max);
     }
   
     function handleButtonClick(event) {
       if (event.target.classList.contains("minus")) {
         decreaseValue();
       } else if (event.target.classList.contains("plus")) {
         increaseValue();
       }
     }
   
     function decreaseValue() {
       let value = parseInt(inputBox.value);
       value = isNaN(value) ? 1 : Math.max(value - 1, 1);
       inputBox.value = value;
       updateButtonStates();
       handleQuantityChange();
     }
   
     function increaseValue() {
       let value = parseInt(inputBox.value);
       value = isNaN(value) ? 1 : Math.min(value + 1, parseInt(inputBox.max));
       inputBox.value = value;
       updateButtonStates();
       handleQuantityChange();
     }
   
     function handleQuantityChange() {
       let value = parseInt(inputBox.value);
       value = isNaN(value) ? 1 : value;
     }
   })();

   //Tab js code
   var tab;
   var tabContent;
   window.onload=function() {
       tabContent=document.getElementsByClassName('tabContent');
       tab=document.getElementsByClassName('tab');
       hideTabsContent(1);
   }
   
   document.getElementById('tabs').onclick= function (event) {
       var target=event.target;
       if (target.className=='tab') {
          for (var i=0; i<tab.length; i++) {
              if (target == tab[i]) {
                  showTabsContent(i);
                  break;
              }
          }
       }
   }
   
   function hideTabsContent(a) {
       for (var i=a; i<tabContent.length; i++) {
           tabContent[i].classList.remove('show');
           tabContent[i].classList.add("hide");
           tab[i].classList.remove('whiteborder');
       }
   }
   
   function showTabsContent(b){
       if (tabContent[b].classList.contains('hide')) {
           hideTabsContent(0);
           tab[b].classList.add('whiteborder');
           tabContent[b].classList.remove('hide');
           tabContent[b].classList.add('show');
       }
   }
</script>
@endsection