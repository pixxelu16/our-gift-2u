@extends('layouts.master')
@section('content')
<div class="corporate-home">
    <div class="container">
        <div class="corporate-gift-card">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a><span> <img src="{{ url('public/images/breadcrub.svg') }}"></span>
                </li>
                <li><span class="current">Ourgift2u  Management Gift Cards</span></li>
            </ul>
            <div class="corporate-gift-title">
                <h2>Promotional <span>Gift card </span> by <span>giftcard2u</span></h2>
            </div>
        </div>
    </div> 
</div>

<form id="submit_management_gift_card" action="#" method="POST">
    <div class="corporate quantity_section">
        <div class="container">
            <div class="comrporate_description">
                <input type="text" name="company_name" placeholder="Name of company or event:" id="company_name" value="">
            </div>
        </div>
    </div>

    <div class="slection_box_corporate">
        <div class="container">
            <div class="box-dynmic">
                <h3>Selection:</h3>
            </div>
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
                            <input type="hidden" value="0" name="final_payable_amount" id="final_payable_amount">
                            <input type="hidden" name="payment_method" value="Stripe">
                        </div>
                    </div>
            </div>
        </div>
    </div>
    
    <div class="payment_section-cart">
        <div class="container">
            <div class="payment-form">
                <div class="deploy_sumbit_code">
                    <button type="submit" class="submit-btn disable-button">Submit</button>
                    <div class="submit_management_gift_card_res"></div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    // Increment the number of selected cards
    function num_of_cards_increment(id, cardCount) {
        const element = document.getElementById(id);
        let currentValue = parseInt(element.textContent);
        let cardAmount = parseFloat(element.dataset.amount);

        currentValue++;
        element.textContent = currentValue.toString();
        element.dataset.quintity = currentValue.toString();

        // Update the hidden input value for the quantity
        document.getElementById('gift_card_quantity_' + cardCount).value = currentValue;

        // Recalculate the total
        updateTotalCart();
    }

    // Decrement the number of selected cards
    function num_of_cards_decrement(id, cardCount) {
        const element = document.getElementById(id);
        let currentValue = parseInt(element.textContent);

        // Decrease only if the current value is greater than 0
        if (currentValue > 0) {
            currentValue--;
            element.textContent = currentValue.toString();
            element.dataset.quintity = currentValue.toString();

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