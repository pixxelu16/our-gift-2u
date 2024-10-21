$(document).ready(function(){
    //View Order detail
    $('body').on('click', '.view-order-detail', function(){
        var order_id = $(this).data('order_id');
 
        // Call AJAX request to fetch order items using POST method
        $.ajax({
            type: 'GET',
            url: base_url+'/order-detail',
            data: { order_id: order_id},
            beforeSend: function() {
                $('body').addClass("responce-load");  
                $(".admin-loader").show();
            },
            success: function(response) {
                $("#orderItemsContainer").html(response);
                $('#viewOrderModal').modal('show');
                $('body').removeClass("responce-load");    
                $(".admin-loader").hide();
            }
        });
    });

    //View-manual-invoice-detail detail
    $('body').on('click', '.view-manual-invoice-detail', function(){
        var invoice_id = $(this).data('invoice_id');
 
        // Call AJAX request to fetch order items using POST method
        $.ajax({
            type: 'GET',
            url: base_url+'/manual-invoice-detail',
            data: { invoice_id: invoice_id},
            beforeSend: function() {
                $('body').addClass("responce-load");  
                $(".admin-loader").show();
            },
            success: function(response) {
                $("#manual_invoice_responce").html(response);
                $('#viewManualInvoiceModal').modal('show');
                $('body').removeClass("responce-load");    
                $(".admin-loader").hide();
            }
        });
    });

    //View purchased-gift-card detail
    $('body').on('click', '.view-purchased-gift-card-detail', function(){
        var purchased_id = $(this).data('purchased_id'); 
 
        // Call AJAX request to fetch order items using POST method
        $.ajax({
            type: 'GET',
            url: base_url+'/purchased-gift-card-detail',
            data: { purchased_id: purchased_id},
            beforeSend: function() {
                $('body').addClass("responce-load");  
                $(".admin-loader").show();
            },
            success: function(response) {
                $("#viewPurchasedGiftCardModalRes").html(response);
                $('#viewPurchasedGiftCardModal').modal('show');
                $('body').removeClass("responce-load");    
                $(".admin-loader").hide();
            }
        });
    });
});