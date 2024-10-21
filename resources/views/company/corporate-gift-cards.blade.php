@extends('layouts.master')
@section('content')

<!-- First Breadcrumb Section Start -->
<div class="corporate-home">
    <div class="container">
        <div class="corporate-gift-card">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a><span> <img src="{{ url('public/images/breadcrub.svg') }}"></span>
                </li>
                <li><span class="current">CORPORATE GIFT CARDS</span></li>
            </ul>
            <div class="corporate-gift-title">
                <h2>Corporate <span> Gift Cards</span></h2>
            </div>
            <div class="comrporate_description">
                <h3>FBT Gift Cards Tax Rules (Australia) – Simplified</h3>
                <a href="{{ url('/company/corporate-gift-cards') }}">Read More <img src="{{ url('public/images/readmore.svg') }}"></a>
                <p>“When your company buys a gift card on our website, we will donate an equal amount to the 52 Degree Foundation to support children and their families.”</p>
            </div>
        </div>
    </div>
</div>
<!-- First Breadcrumb Section End -->

<form id="submit_purchaged_gift_card" action="#" method="POST">
    <!-- Secound Quantity Section Start -->
    <div class="corporate quantity_section">
        <div class="container">
            <div class="box_quentity_bg">
                <p class="title">What purpose do you need the gift card for?</p>
                <div class="grid">
                    <div class="card-counter">
                        <span>Christmas</span>
                        <div class="flex-quientity buton-ehat">
                            <button type="button" onclick="decrement('christmas')">-</button>
                            <span id="christmas" class="counter-value" data-quintity="1">1</span>
                            <button type="button" onclick="increment('christmas')">+</button>
                        </div>
                    </div>
                    <div class="card-counter">
                        <span>New Years</span>
                        <div class="flex-quientity buton-ehat">
                            <button type="button" onclick="decrement('new-years')">-</button>
                            <span id="new-years" class="counter-value" data-quintity="0">0</span>
                            <button type="button" onclick="increment('new-years')">+</button>
                        </div>
                    </div>
                    <div class="card-counter">
                        <span>Employees Birthday</span>
                        <div class="flex-quientity buton-ehat">
                            <button type="button" onclick="decrement('birthday')">-</button>
                            <span id="birthday" class="counter-value" data-quintity="0">0</span>
                            <button type="button" onclick="increment('birthday')">+</button>
                        </div>
                    </div>
                    <div class="card-counter">
                        <span>Target Bonus</span>
                        <div class="flex-quientity buton-ehat">
                            <button type="button" onclick="decrement('target-bonus')">-</button>
                            <span id="target-bonus" class="counter-value" data-quintity="0">0</span>
                            <button type="button" onclick="increment('target-bonus')">+</button>
                        </div>
                    </div>
                    <div class="card-counter">
                        <span>Maternity Leave</span>
                        <div class="flex-quientity buton-ehat">
                            <button type="button" onclick="decrement('maternity-leave')">-</button>
                            <span id="maternity-leave" class="counter-value" data-quintity="0">0</span>
                            <button type="button" onclick="increment('maternity-leave')">+</button>
                        </div>
                    </div>
                    <div class="card-counter">
                        <span>Customers</span>
                        <div class="flex-quientity buton-ehat">
                            <button type="button" onclick="decrement('customers')">-</button>
                            <span id="customers" class="counter-value" data-quintity="0">0</span>
                            <button type="button" onclick="increment('customers')">+</button>
                        </div>
                    </div>
                    <div class="card-counter">
                        <span>Cross Promotions</span>
                        <div class="flex-quientity buton-ehat">
                            <button type="button" onclick="decrement('cross-promotions')">-</button>
                            <span id="cross-promotions" class="counter-value" data-quintity="0">0</span>
                            <button type="button" onclick="increment('cross-promotions')">+</button>
                        </div>
                    </div>
                    <div class="card-counter">
                        <span>Events</span>
                        <div class="flex-quientity buton-ehat">
                            <button type="button" onclick="decrement('events')">-</button>
                            <span id="events" class="counter-value" data-quintity="0">0</span>
                            <button type="button" onclick="increment('events')">+</button>
                        </div>
                    </div>
                    <div class="card-counter last_child_cards">
                        <div class="total-gift-cards">
                            <span>Total Gift Cards: </span>
                        </div>
                        <div class="total-gift-cards">
                            <span id="total" data-need_total_cards="1">1</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Secound Quantity Section End -->

    <!-- 3rd Quantity Section start -->
    <div class="slection_box_corporate">
        <div class="container">
            <div class="box-dynmic">
                <h3>Selection:</h3>
            </div>
            <div class="gift_card_corporate card-counter">
                <div class="gift_card_corporate card-counter">
                    @php $gift_card_count = 1; @endphp
                    @foreach($all_gift_cards as $gift_card)
                        <div class="gift-box-card">
                            <div class="new-gift-box">
                                <label for="gift_card_amount_{{ $gift_card->id }}">
                                    <input type="hidden" name="gift_card_id[]" value="{{ $gift_card->id }}" id="gift_card_id_{{ $gift_card->id }}">
                                    <img class="card_img_gift" src="{{ url('public/uploads/gift-cards/'.$gift_card->image) }}">
                                    <div class="gift-card-details">
                                        <div class="price_gifting">${{ number_format($gift_card->amount, 2, '.', ',') }}</div>
                                    </div>
                                    <input type="checkbox" class="gift-card-checkbox" name="selected_gift_cards[]" value="{{ $gift_card->id }}" id="gift_card_amount_{{ $gift_card->id }}">
                                </label> 
                            </div>
                            <div class="flex-quientity card_gifting">
                                <div class="space_colpasse">
                                    <span>Please add the number of cards</span>
                                    <img src="{{ url('public/images/arrow-www.png') }}">
                                </div>
                                <div class="gifting_quient">
                                    <button type="button" class="left-buton" onclick="num_of_cards_decrement('number_of_card_value{{ $gift_card_count }}', {{ $gift_card_count }})">-</button>
                                    <span id="number_of_card_value{{ $gift_card_count }}" class="number-of-card-value" data-quintity="0" data-amount="{{ $gift_card->amount }}">0</span>
                                    <input type="hidden" name="gift_card_quantity[]" value="0" id="gift_card_quantity_{{ $gift_card_count }}">
                                    <button type="button" class="right-buton" onclick="num_of_cards_increment('number_of_card_value{{ $gift_card_count }}', {{ $gift_card_count }})">+</button>
                                </div>
                            </div>
                        </div>
                        @php $gift_card_count++; @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- 3rd Quantity Section End --> 

    <!-- 4rd Cart Area Section Start -->
    <div class="cart_area_section">
        <div class="container">
            <div class="cart-area">
                <h3 class="cart-area-heding">Cart Area</h3>
                    <div class="cart-summary">
                        <div class="cart-field">
                            <label for="total-amount">TOTAL AMOUNT OF GIFT CARDS</label>
                            <input type="text" value="0.00" name="gift_card_total_amount" id="gift_card_total_amount" disabled required>
                        </div>
                        <div class="cart-field">
                            <label for="total-value">TOTAL VALUE OF GIFT CARDS</label>
                            <input type="text" value="1" name="gift_card_total_value" id="gift_card_total_value" disabled required>
                            <input type="hidden" value="0" name="final_gift_card_total_value" id="final_gift_card_total_value">
                        </div>
                        <div class="cart-field">
                            <label for="amount-payable">AMOUNT PAYABLE TODAY</label>
                            <input type="text" value="0.00" name="payable_amount" id="payable_amount" disabled required>
                            <input type="hidden" value="0" name="final_payable_amount" id="final_payable_amount" >
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!-- 4rd Cart Area Section End -->

    <!-- 4rd Payment Section Start -->
    

    <!-- 4rd Payment Section Start -->
    <div class="payment_section-cart">
        <div class="container">
            <div class="payment-form">
                <div class="profile_payment">
                    <h2>Payment:</h2>
                    <div class="flex-payment-coberd">
                            <div class="flex-image-input">
                                <div class="input-payment-fixed">
                                    <!--<div class="input-group">
                                        <label for="card-number">Card Number</label>
                                        <input type="text" id="card-number" placeholder="1234 5678 9012 3456"
                                            maxlength="16">
                                    </div>
                                    <div class="input-group">
                                        <label for="expire-date">Expire Date</label>
                                        <input type="text" id="expire-date" placeholder="MM/YY" maxlength="5">
                                    </div>
                                    <div class="input-group">
                                        <label for="cvv">CVV</label>
                                        <input type="text" id="cvv" placeholder="123" maxlength="3">
                                    </div>-->
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
                                <div class="payment-methods">
                                    <img src="{{ url('public/images/apply-pay.png') }}">
                                    <img src="{{ url('public/images/paypal.png') }}">
                                    <img src="{{ url('public/images/aster-card.png') }}">
                                    <img src="{{ url('public/images/american.png') }}">
                                    <img src="{{ url('public/images/visa.png') }}">
                                    <img src="{{ url('public/images/gpay.png') }}"> 
                                </div>
                            </div>
                    </div>
                </div>
                <div class="terms-confermed">
                    <input type="checkbox" name="is_term_condition" value="Yes" id="is_term_condition">
                    <label for="terms">*Terms and conditions</label>
                </div>
                <div class="deploy_sumbit_code">
                    <button type="submit" class="submit-btn disable-button">Submit</button>
                    <div class="submit_purchaged_gift_card_res"></div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://js.stripe.com/v3/"></script>
<script>
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

    // Quentity JQuery Start
    function increment(id) {
        const element = document.getElementById(id);
        let value = parseInt(element.textContent);
        value++;
        element.textContent = value.toString();
        element.dataset.quintity = value.toString(); 
        updateTotal();
    }
    function decrement(id) {
        const element = document.getElementById(id);
        let value = parseInt(element.textContent);
        if (value > 0) {
            value--;
            element.textContent = value.toString();
            element.dataset.quintity = value.toString();
        }
        updateTotal();
    }
    function updateTotal() {
        // Select all elements with the class 'counter-value'
        const values = document.querySelectorAll('.counter-value');
        let total = 0;
        // Loop through each element and sum up the 'data-quintity' values
        values.forEach((el) => {
            total += parseInt(el.dataset.quintity || 0); // Use 'data-quintity' and ensure it defaults to 0 if not set
        });
    
        // Update the total value in the element with the id 'total'
        document.getElementById('total').textContent = total.toString();
        // Update the 'data-need_total_cards' attribute using jQuery
        $("#total").attr("data-need_total_cards", total);
    } 

    // Increment the number of selected cards
    function num_of_cards_increment(id, cardCount) {
        // Get the current total cards remaining
        const totalElement = $("#total");
        let needCardTotal = parseInt(totalElement.attr("data-need_total_cards"));

        // Allow increment only if the remaining total is greater than 0
        if (needCardTotal > 0) {
            const element = document.getElementById(id);
            let currentValue = parseInt(element.textContent);
            let cardAmount = parseFloat(element.dataset.amount);

            currentValue++;
            element.textContent = currentValue.toString();
            element.dataset.quintity = currentValue.toString();

            // Decrease the available card total
            needCardTotal--;
            totalElement.attr("data-need_total_cards", needCardTotal.toString());
            totalElement.text(needCardTotal.toString());

            // Update the hidden input value for the quantity
            document.getElementById('gift_card_quantity_' + cardCount).value = currentValue;

            // Recalculate the total
            updateTotalCart();
        }
    }

    // Decrement the number of selected cards
    function num_of_cards_decrement(id, cardCount) {
        const totalElement = $("#total");
        let needCardTotal = parseInt(totalElement.attr("data-need_total_cards"));
        const element = document.getElementById(id);
        let currentValue = parseInt(element.textContent);

        // Decrease only if the current value is greater than 0
        if (currentValue > 0) {
            currentValue--;
            element.textContent = currentValue.toString();
            element.dataset.quintity = currentValue.toString();

            // Increase the available card total
            needCardTotal++;
            totalElement.attr("data-need_total_cards", needCardTotal.toString());
            totalElement.text(needCardTotal.toString());

            // Update the hidden input value for the quantity
            document.getElementById('gift_card_quantity_' + cardCount).value = currentValue;
            
            // Recalculate the total
            updateTotalCart();
        }
    }

    // Update the total cart values
    function updateTotalCart() {
        let totalQuantity = 0;
        let totalAmount = 0;

        // Loop through each selected card and calculate the totals
        document.querySelectorAll('.number-of-card-value').forEach((el) => {
            let quantity = parseInt(el.dataset.quintity) || 0;
            let amount = parseFloat(el.dataset.amount) || 0;

            totalQuantity += quantity;
            totalAmount += quantity * amount;
        });

        // Update the total values in the cart area
        $("#gift_card_total_value").val(totalQuantity);
        $("#gift_card_total_amount").val(totalAmount.toFixed(2));
        $("#payable_amount").val(totalAmount.toFixed(2)); 

        $("#final_gift_card_total_value").val(totalQuantity); 
        $("#final_payable_amount").val(totalAmount.toFixed(2));
    }

    // When a checkbox is clicked, recalculate the total
    $(document).on('change', '.gift-card-checkbox', function() {
        updateTotalCart();
    });
</script>
@endsection