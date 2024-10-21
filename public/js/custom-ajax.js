$(document).ready(function(){
    //Function to handle pre_order_now
    $('body').on('click', '.pre_order_now', function() { 
        var product_id = $(this).data("product_id");
        var quantity = $(".product_quantity").val();
        var points_value = $("#points_value").val();
        var points_price_value = $("#points_price_value").val();
        
        // AJAX request
        $.ajax({
            type: 'POST',
            url: base_url+'/pre-order-add-to-cart', 
            data: {
                product_id: product_id,
                quantity: quantity,
                points_value: points_value,
                points_price_value: points_price_value,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                $(".pre_order_now").prop('disabled', true);
            },
            success: function(response) {
                $('.pre_order_now_res').html(response);
                $(".pre_order_now").prop('disabled', false);
            }
        });
    }); 

    //Function to handle buy_now
    $('body').on('click', '.buy_now', function() { 
        var product_id = $(this).data("product_id");
        var quantity = $(".product_quantity").val();
        var points_value = $("#points_value").val();
        var points_price_value = $("#points_price_value").val();
         
        // AJAX request
        $.ajax({
            type: 'POST',
            url: base_url+'/add-to-cart', 
            data: {
                product_id: product_id,
                quantity: quantity,
                points_value: points_value,
                points_price_value: points_price_value,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                $(".buy_now").prop('disabled', true);
            },
            success: function(response) {
                $('.buy_now_res').html(response);
                $(".buy_now").prop('disabled', false);
            }
        });
    }); 

    //Function to handle buy_now
    $('body').on('click', '.add_to_cart', function() { 
        var product_id = $(this).data("product_id");
        var quantity = $('#product-' + product_id).val();
        $(this).prop('disabled', true);

        // AJAX request
        $.ajax({
            type: 'POST',
            url: base_url+'/gift-card-add-to-cart', 
            data: {
                product_id: product_id,
                quantity: quantity,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                //$(".add_to_cart").prop('disabled', true);
            },
            success: function(response) {
                $('.add_to_cart_res_'+product_id).html(response);
                //$(".add_to_cart").prop('disabled', false);
            }
        });
    }); 


    //Function to handle remove_cart_item
    $('body').on('click', '.remove_cart_item', function() { 
        var item_id = $(this).data("item_id");
        
        // AJAX request
        $.ajax({
            type: 'POST',
            url: base_url+'/remove-cart-item', 
            data: {
                item_id: item_id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                $(".remove_cart_item").prop('disabled', true);
            },
            success: function(response) {
                $('.remove_cart_item_res').html(response);
                $(".remove_cart_item").prop('disabled', false);
                setTimeout(function() {
                    $('.remove_cart_item_res').html("");
                }, 5000);
            }
        });
    }); 

    //Function to handle remove_gift_card_cart_item
    $('body').on('click', '.remove_gift_card_cart_item', function() { 
        var item_id = $(this).data("item_id");
        
        // AJAX request
        $.ajax({
            type: 'POST',
            url: base_url+'/remove-gift-card-cart-item', 
            data: {
                item_id: item_id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                $(".remove_gift_card_cart_item").prop('disabled', true);
            },
            success: function(response) {
                $('.remove_gift_card_cart_item_res').html(response);
                $(".remove_gift_card_cart_item").prop('disabled', false);
                setTimeout(function() {
                    $('.remove_gift_card_cart_item_res').html("");
                }, 5000);
            }
        });
    }); 

    //Function to handle remove_cart_points
    $('body').on('click', '.remove_cart_points', function() { 

        // AJAX request
        $.ajax({
            type: 'POST',
            url: base_url+'/remove-cart-points', 
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                $(".remove_cart_points").prop('disabled', true);
            },
            success: function(response) {
                $('.remove_cart_points_res').html(response);
                $(".remove_cart_points").prop('disabled', false);
            }
        });
    }); 

    //Function to get states according to country
    $('body').on('change', '.select_country', function() { 
        var country_id = $(this).find('option:selected').data("country_id");
        
        // AJAX request
        $.ajax({
            type: 'GET',
            url: base_url+'/get-country-states', 
            data: {
                country_id: country_id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                $(".select_country").prop('disabled', true);
            },
            success: function(response) {
                $('.select_states').html(response);
                $(".select_country").prop('disabled', false);
            }
        });
    }); 

    //Submit For custom Register Form
    $("#custom_register_form").validate({
        rules: {
            membership_type: {
                required: true,
            },
            country: {
                required: true,
            },
            state: {
                required: true,
            },
            postal_code: {
                required: true,
            },
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            email: {
                required: true,
            },
            email_confirmation: {
                required: true,
            },
            password: {
                required: true,
            },
            password_confirmation: {
                required: true,
            },
        },
        submitHandler: function (form,e) {
            e.preventDefault();
            var formDataArray = $(form).serializeArray();
          
            jQuery.ajax({  
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, 
                url: base_url+'/submit-custom-register', 
                data: formDataArray,
                beforeSend: function () {
                    $(".disable-button").prop('disabled', true);
                },
                success: function(response) {
                    $('.custom_register_form_res').html(response);
                    $(".disable-button").prop('disabled', false);
                }
            });
        }
    });

    //Submit For customer Form
    $("#add_company_form").validate({
        rules: {
            company_name: {
                required: true,
            },
            company_abn: {
                required: true,
            },
            address: {
                required: true,
            },
            phone: {
                required: true,
            },
            suburb: {
                required: true,
            },
            country: {
                required: true,
            },
            state: {
                required: true,
            },  
            postal_code: {
                required: true,
            },
            email: {
                required: true,
            },
            email_confirmation: {
                required: true,
            },
            password: {
                required: true,
            },
            password_confirmation: {
                required: true,
            },
            contact_person: {
                required: true,
            },
            department: {
                required: true,
            },
        },
        submitHandler: function (form,e) {
            e.preventDefault();
            var formDataArray = $(form).serializeArray();
          
            jQuery.ajax({  
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, 
                url: base_url+'/submit-company', 
                data: formDataArray,
                beforeSend: function () {
                    $(".disable-button").prop('disabled', true);
                },
                success: function(response) {
                    $('.custom_register_form_res').html(response);
                    $(".disable-button").prop('disabled', false);
                }
            });
        }
    });

    
    //Submit chechckout from
    $("#submit_checkout_form").validate({
        rules: {
            customer_email: {
                required: true,
            },
            fname: {
                required: true,
            },
            lname: {
                required: true,
            },
            street_address: {
                required: true,
            },
            country: {
                required: true,
            },
            state: {
                required: true,
            },
            post_code: {
                required: true,
            },
            phone_number: {
                required: true,
            },
            payment_method: {
                required: true,
            },
            is_term_condition: {
                required: true,
            },
        },
        messages: {
            is_term_condition: {
                required: "You must agree to the terms and conditions.",
            },
        },
        submitHandler: function (form,e) {
            stripe.createToken(card).then(function(result) {
                //Check if error or not
                if (result.error) {
                    $('.submit_checkout_form_res').html(result.error.message);
                } else {
                    //Get token id
                    var tokenId = result.token.id;
                    // Serialize form data
                    var formDataArray = $("#submit_checkout_form").serialize();
                    // Append token id to form data
                    formDataArray += '&stripeToken=' + tokenId;

                    // Proceed with the AJAX call to submit the form
                    jQuery.ajax({
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: base_url + '/submit-checkout',
                        data: formDataArray,
                        beforeSend: function () {
                            $(".disable-button").prop('disabled', true);
                            $('.submit_checkout_form_res').html("Please Wait..");
                        },
                        mimeType: "multipart/form-data",
                        success: function (response) {
                            $('.submit_checkout_form_res').html(response);
                            $(".disable-button").prop('disabled', false);
                            setTimeout(function () {
                                //$('.submit_checkout_form_res').html("");
                            }, 5000);
                        }
                    });
                }
            });
        }
    });

    //Submit gift card chechckout from
    $("#submit_gift_card_checkout_form").validate({
        rules: {
            customer_email: {
                required: true,
            },
            fname: {
                required: true,
            },
            lname: {
                required: true,
            },
            street_address: {
                required: true,
            },
            country: {
                required: true,
            },
            state: {
                required: true,
            },
            post_code: {
                required: true,
            },
            phone_number: {
                required: true,
            },
            payment_method: {
                required: true,
            },
            is_term_condition: {
                required: true,
            },
        },
        messages: {
            is_term_condition: {
                required: "You must agree to the terms and conditions.",
            },
        },
        submitHandler: function (form,e) {
            stripe.createToken(card).then(function(result) {
                //Check if error or not
                if (result.error) {
                    $('.submit_gift_card_checkout_form_res').html(result.error.message);
                } else {
                    //Get token id
                    var tokenId = result.token.id;
                    // Serialize form data
                    var formDataArray = $("#submit_gift_card_checkout_form").serialize();
                    // Append token id to form data
                    formDataArray += '&stripeToken=' + tokenId;

                    // Proceed with the AJAX call to submit the form
                    jQuery.ajax({
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: base_url + '/submit-gift-card-checkout',
                        data: formDataArray,
                        beforeSend: function () {
                            $(".disable-button").prop('disabled', true);
                            $('.submit_gift_card_checkout_form_res').html("Please Wait..");
                        },
                        mimeType: "multipart/form-data",
                        success: function (response) {
                            $('.submit_gift_card_checkout_form_res').html(response);
                            $(".disable-button").prop('disabled', false);
                            setTimeout(function () {
                                //$('.submit_gift_card_checkout_form_res').html("");
                            }, 5000);
                        }
                    });
                }
            });
        }
    });


    //Submit submit redeem gift card form
    $("#submit_gift_card_coupon_code_form").validate({
        rules: {
            coupon_code: {
                required: true,
            },
        },
        submitHandler: function (form,e) {
            e.preventDefault();
            var formDataArray = $(form).serializeArray();

            jQuery.ajax({  
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, 
                url: base_url+'/submit-gift-card-apply-coupon-code',  
                data: formDataArray,
                beforeSend: function () {
                    $(".disable-button").prop('disabled', true);
                },
                mimeType: "multipart/form-data",
                success: function(response) {
                    $('.submit_gift_card_coupon_code_form_res').html(response);
                    $(".disable-button").prop('disabled', false);
                }
            });
        }
    });

    //Submit submit card form
    $("#submit_cart_coupon_code_form").validate({
        rules: {
            coupon_code: {
                required: true,
            },
        },
        submitHandler: function (form,e) {
            e.preventDefault();
            var formDataArray = $(form).serializeArray();

            jQuery.ajax({  
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, 
                url: base_url+'/submit-cart-apply-coupon-code',  
                data: formDataArray,
                beforeSend: function () {
                    $(".disable-button").prop('disabled', true);
                },
                mimeType: "multipart/form-data",
                success: function(response) {
                    $('.submit_cart_coupon_code_form_res').html(response);
                    $(".disable-button").prop('disabled', false);
                }
            });
        }
    });

    //Submit gift card card form
    $("#verify_gift_card_form").validate({
        rules: {
            coupon_code: {
                required: true,
            },
        },
        submitHandler: function (form,e) {
            e.preventDefault();
            var formDataArray = $(form).serializeArray();

            jQuery.ajax({  
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, 
                url: base_url+'/customer/submit-verify-coupon-code',  
                data: formDataArray,
                beforeSend: function () {
                    $(".disable-button").prop('disabled', true);
                },
                mimeType: "multipart/form-data",
                success: function(response) {
                    $('.verify_gift_card_form_res').html(response);
                    $(".disable-button").prop('disabled', false);
                }
            });
        }
    });

    //Submit product rating and review 
    $("#rating_form").validate({
        rules: {
            review: {
                required: true,
            }
        },
        submitHandler: function (form,e) {
            e.preventDefault();
            var formDataArray = $(form).serializeArray();

            jQuery.ajax({  
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, 
                url: base_url+'/submit-rating', 
                data: formDataArray,
                beforeSend: function () {
                    $(".disable-button").prop('disabled', true);
                    $('.rating-form-res').html("Please Wait...");
                },
                success: function(response) {
                    $('.rating-form-res').html(response);
                    $(".disable-button").prop('disabled', false);
                    setTimeout(function() {
                        $('.rating-form-res').html("");
                    }, 3000);
                }
            });
        }
    });

    //Submit For Search To Header Product 
    $("#serach_top_header_category_products").validate({
        rules: {
            top_header_keyword: {
                required: true,
            }
        },
        submitHandler: function (form,e) {
            e.preventDefault();
            var formDataArray = $(form).serializeArray();

            jQuery.ajax({  
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, 
                url: base_url+'/search-top-header-products', 
                data: formDataArray,
                beforeSend: function () {
                    $(".top-disable-button").prop('disabled', true);
                },
                success: function(response) {
                    $('.serach_top_header_category_products_res').html(response);
                    $(".top-disable-button").prop('disabled', false);
                    $('.serach_top_header_category_products_res').show();
                }
            });
        }
    });

    //on keyup For Search To Header Product 
    $('body').on('keyup', '#top_header_keyword', function() { 
        var top_header_keyword = $(this).val();
        var category_id = $('#top_header_category_id').val();
        if (top_header_keyword.length >= 3) {
            jQuery.ajax({  
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, 
                url: base_url+'/search-top-header-products', 
                data: { 
                    top_header_keyword: top_header_keyword, 
                    top_header_category_id: category_id 
                },
                beforeSend: function () {
                    $(".top-disable-button").prop('disabled', true);
                },
                success: function(response) {
                    $('.serach_top_header_category_products_res').html(response);
                    $(".top-disable-button").prop('disabled', false);
                    $('.serach_top_header_category_products_res').show();
                }
            });
        }
    });

    

    //Submit upload invoice
    jQuery("#upload_invoice").validate({
        rules: {
            invoice_image: {
                required: true,
            }
        },
        messages: {
            invoice_image: {
                required: "Please select an invoice image to upload."
            }
        },
        submitHandler: function (form, e) {
            e.preventDefault();

            var formData = new FormData(form);

            // Ajax call
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, 
                url: base_url+'/customer/submit-upload-invoice',  
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    jQuery(".disable-button").prop('disabled', true);
                    jQuery(".page-loader").show();
                },
                success: function(response) {
                    jQuery(".page-loader").hide();
                    jQuery('.upload_invoice_responce').html(response);
                    jQuery(".disable-button").prop('disabled', false);
                    
                }
            });
        }
    });

    // Validate the form to manual upload invoice
    jQuery("#manual_upload_invoice").validate({
        rules: {
            store_name: {
                required: true,
            },
            invoice_date: {
                required: true,
            },
            invoice_total: {
                required: true,
                number: true,
            },
            invoice_number: {
                required: true,
            },
            manual_invoice_image: {
                required: true,
            }
        },
        messages: {
            manual_invoice_image: {
                required: "Please select an invoice image to upload." 
            }
        },
        submitHandler: function (form, e) {
            e.preventDefault();

            var formData = new FormData(form);

            // Ajax call
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, 
                url: base_url+'/customer/submit-manual-upload-invoice', 
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    jQuery(".model-disable-button").prop('disabled', true);
                    jQuery(".model-loader").show();
                },
                success: function(response) {
                    jQuery(".model-loader").hide();
                    jQuery('.manual_upload_invoice_responce').html(response);
                    jQuery(".model-disable-button").prop('disabled', false);
                }
            });
        }
    });

    // Validate the form to invite friend to refer
    jQuery("#invite_friend_to_refer").validate({
        rules: {
            email: {
                required: true,
            },
        },
        submitHandler: function (form, e) {
            e.preventDefault();

            var formData = new FormData(form);

            // Ajax call
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, 
                url: base_url+'/customer/submit-invite-friend-to-refer', 
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    jQuery(".disable-button").prop('disabled', true);
                    jQuery(".page-loader").show();
                },
                success: function(response) {
                    jQuery(".page-loader").hide();
                    jQuery('.invite_friend_to_refer_responce').html(response);
                    jQuery(".disable-button").prop('disabled', false);
                    
                }
            });
        }
    });

    //Submit For Contact  Us page
    $("#submit_contact_us_form").validate({
        rules: {
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            phone_number: {
                required: true,
            },
            message: {
                required: true,
            }
        },
        submitHandler: function (form,e) {
            e.preventDefault();
            var formDataArray = $(form).serializeArray();

            jQuery.ajax({  
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, 
                url: base_url+'/submit-contact-us', 
                data: formDataArray,
                beforeSend: function () {
                    $(".disable-button").prop('disabled', true);
                    $(".disable-button").html('Sending...');
                },
                success: function(response) {
                    $('.submit_contact_us_form_res').html(response);
                    $(".disable-button").prop('disabled', false);
                    $(".disable-button").html('Send Message');
                }
            });
        }
    });

    //Submit Purchaged Gift Card from
    $("#submit_purchaged_gift_card").validate({
        rules: {
            payment_method: {
                required: true,
            },
            is_term_condition: {
                required: true,
            },
        },
        messages: {
            is_term_condition: {
                required: "You must agree to the terms and conditions.",
            },
        },
        submitHandler: function (form,e) {
            stripe.createToken(card).then(function(result) {
                //Check if error or not
                if (result.error) {
                    $('.submit_purchaged_gift_card_res').html(result.error.message);
                } else {
                    //Get token id
                    var tokenId = result.token.id;
                    // Serialize form data
                    var formDataArray = $("#submit_purchaged_gift_card").serialize();
                    // Append token id to form data
                    formDataArray += '&stripeToken=' + tokenId;

                    // Proceed with the AJAX call to submit the form
                    jQuery.ajax({
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: base_url + '/company/submit-purchaged-gift-card',
                        data: formDataArray,
                        beforeSend: function () {
                            $(".disable-button").prop('disabled', true);
                            $('.submit_purchaged_gift_card_res').html("Please Wait..");
                        },
                        mimeType: "multipart/form-data",
                        success: function (response) {
                            $('.submit_purchaged_gift_card_res').html(response);
                            $(".disable-button").prop('disabled', false);
                            setTimeout(function () {
                                //$('.submit_purchaged_gift_card_res').html("");
                            }, 5000);
                        }
                    });
                }
            });
        }
    });

    //Submit Management Gift Card from
    $("#submit_management_gift_card").validate({
        rules: {
            company_name: {
                required: true,
            },
        },
        messages: {
            company_name: {
                required: "Company Name Is Required.",
            },
        },
        submitHandler: function (form,e) {
            // Serialize form data
            var formDataArray = $("#submit_management_gift_card").serialize();

            // Proceed with the AJAX call to submit the form
            jQuery.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: base_url + '/company/submit-management-gift-card',
                data: formDataArray,
                beforeSend: function () {
                    $(".disable-button").prop('disabled', true);
                    $('.submit_management_gift_card_res').html("Please Wait..");
                },
                mimeType: "multipart/form-data",
                success: function (response) {
                    $('.submit_management_gift_card_res').html(response);
                    $(".disable-button").prop('disabled', false);
                    setTimeout(function () {
                        //$('.submit_management_gift_card_res').html("");
                    }, 5000);
                }
            });
        }
    });
    
    //Submit Issued Coupon Code
    $("#submit_company_issued_coupon_code").validate({
        rules: {
            coupon_code_id: {
                required: true,
            },
            email: {
                required: true,
            },
        },
        messages: {
            /*coupon_code_id: {
                required: "Required.",
            },*/
        },
        submitHandler: function (form,e) {
            // Serialize form data
            var formDataArray = $("#submit_company_issued_coupon_code").serialize();

            // Proceed with the AJAX call to submit the form
            jQuery.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: base_url + '/company/submit-issued-coupon-code',
                data: formDataArray,
                beforeSend: function () {
                    $(".disable-button").prop('disabled', true);
                    $('.submit_company_issued_coupon_code_res').html("Please Wait..");
                },
                mimeType: "multipart/form-data",
                success: function (response) {
                    $('.submit_company_issued_coupon_code_res').html(response);
                    $(".disable-button").prop('disabled', false);
                    setTimeout(function () {
                        //$('.submit_company_issued_coupon_code_res').html("");
                    }, 5000);
                }
            });
        }
    });
});

//Code For Show sent_link_coupon_code
$('body').on('click', '.sent_link_coupon_code', function() { 
    var coupon_id = $(this).data("coupon_id");
    $(".sent_link_coupon_code").prop('disabled', true);

    //Call Ajax
    jQuery.ajax({  
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }, 
        url: base_url+'/company/sent-link-coupon-code', 
        data: { 
            coupon_id: coupon_id, 
        },
        beforeSend: function () {
            //$(".add_to_wishlist").prop('disabled', true);
        },
        success: function(response) {
            $('.sent_link_coupon_code_res').html(response);
            //$(".add_to_wishlist").prop('disabled', false);
        }
    });
});

//Code For Show issued_coupon_code
$('body').on('click', '.issued_coupon_code', function() { 
    var coupon_id = $(this).data("coupon_id");
    $("#coupon_code_id").val(coupon_id); 
    //Open popup
    $('#issuedCouponCodeModel').modal('show');
});

//Code For Show is_order_note
$('body').on('change', '#is_order_note', function() { 
    var is_checked = $(this).prop("checked");
    //Check if true or false
    if(is_checked == true){
       $('#order_note_desc').show();
    } else {
       $('#order_note_desc').hide();
    }
});

//Code For append Biiling address under Shipping address from
$('body').on('change', '#is_same_as_billing_address', function() { 
    var is_checked = $(this).prop("checked");
    //Billing Address
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var address = $('#address').val();
    var address2 = $('#address2').val();
    var customer_email = $('#customer_email').val();
    var city = $('#city').val();
    var country = $('#country').val();
    var state = $('#state').val();
    var post_code = $('#post_code').val();
    var phone_number = $('#phone_number').val();
    
    if(is_checked == true){
        //Append Value
        $('#shiping_fname').val(fname);
        $('#shiping_lname').val(lname);
        $('#shiping_address').val(address);
        $('#shiping_address2').val(address2);
        $('#shiping_customer_email').val(customer_email);
        $('#shiping_city').val(city);
        $('#shiping_country').val(country);
        $('#shiping_state').val(state);
        $('#shiping_post_code').val(post_code);
        $('#shiping_phone_number').val(phone_number);
        //show shiping form
        $('#is_shiping_address_form').show();
    } else {
        //Append Value
        $('#shiping_fname').val("");
        $('#shiping_lname').val("");
        $('#shiping_address').val("");
        $('#shiping_address2').val("");
        $('#shiping_customer_email').val("");
        $('#shiping_city').val("");
        $('#shiping_country').val("");
        $('#shiping_state').val("");
        $('#shiping_post_code').val("");
        $('#shiping_phone_number').val("");
        //hide shiping form
        $('#is_shiping_address_form').hide();
    }
});

//Code For Show is_term_condition
$('body').on('change', '#is_term_condition', function() { 
    var is_checked = $(this).prop("checked");
    //Check if true or false
    if(is_checked == true){
        jQuery(".disable-button").prop('disabled', false);
    } else {
        jQuery(".disable-button").prop('disabled', true);
    }
}); 


//code for search products
// $('body').on('click', '.is_category', function() { 
//     var categorySlug = $(this).data('category_slug');
//     var main_category_slug = $(this).data('main_category_slug');
//     window.location.href = base_url + '/shop-search' + '?main_cat=' + main_category_slug + '&product_cat=' + categorySlug;
// }); 

// Function to update URL parameters and redirect
$(document).ready(function() {
    function updateUrl(params) {
        var newUrl = base_url + '/shop-search?' + params.toString();
        window.location.href = newUrl;
    }

    // Handle category click
    $('body').on('click', '.is_category', function() {
        var categorySlug = $(this).data('category_slug');
        var main_category_slug = $(this).data('main_category_slug');

        var params = new URLSearchParams(window.location.search);
        params.set('main_cat', main_category_slug);
        params.set('product_cat', categorySlug);

        updateUrl(params);
    });

    // Handle stock checkbox change
    $('body').on('change', '.is_in_stock', function() {
        var params = new URLSearchParams(window.location.search);
        if ($(this).is(':checked')) {
            params.set('stock', 'instock');
        } else {
            params.delete('stock'); // Remove the parameter when unchecked
        }

        updateUrl(params);
    });

    // Handle featured checkbox change
    $('body').on('change', '.is_featured_products', function() {
        var params = new URLSearchParams(window.location.search);
        if ($(this).is(':checked')) {
            params.set('product_visibility', 'featured');
        } else {
            params.delete('product_visibility'); // Remove the parameter when unchecked
        }

        updateUrl(params);
    });

    // handle product type option change
    $('body').on('change', '.product-type-search', function() {
        var product_type = $(this).val();
        var params = new URLSearchParams(window.location.search);
        params.set('product_type', product_type);
        updateUrl(params);
    });
    // handle orderBy option change
    $('body').on('change', '.product-orderby-search', function() {
        var orderby = $(this).val();
        var params = new URLSearchParams(window.location.search);
        params.set('orderby', orderby);
        updateUrl(params);
    });

    //handle range slider
    // Set initial slider values from URL
    function setSliderValuesFromUrl() {
        const urlParams = new URLSearchParams(window.location.search);
        const minPrice = urlParams.get('min_price') || 0; // Default to 0 if not set
        const maxPrice = urlParams.get('max_price') || 5000; // Default to 5000 if not set

        // Set slider values
        const minSlider = document.getElementById('min_price_slider');
        const maxSlider = document.getElementById('max_price_slider');
        
        minSlider.value = minPrice;
        maxSlider.value = maxPrice;

        // Update displayed values
        document.getElementById('output-a').textContent = '$' + minPrice;
        document.getElementById('output-b').textContent = '$' + maxPrice;

        // Update visual feedback
        minSlider.parentNode.style.setProperty('--value-a', minPrice);
        maxSlider.parentNode.style.setProperty('--value-b', maxPrice);

        // Update handle positions
        updateHandlePosition(minSlider);
        updateHandlePosition(maxSlider);
    }

    // Function to update handle position
    function updateHandlePosition(slider) {
        const value = slider.value;
        const min = slider.min || 0; // Default min value
        const max = slider.max || 5000; // Default max value
        const percentage = ((value - min) / (max - min)) * 100;

        slider.style.backgroundSize = `${percentage}% 100%`;
    }

    // Event listeners for sliders
    const sliders = document.querySelectorAll('.range-slider input[type="range"]');
    sliders.forEach((slider) => {
        const outputId = slider.nextElementSibling.id; // Assuming output is immediately after the slider

        slider.addEventListener('input', () => {
            const value = slider.value;
            slider.parentNode.style.setProperty('--value-' + (slider === sliders[0] ? 'a' : 'b'), value);
            document.getElementById(outputId).textContent = '$' + value; // Update displayed value
            updateHandlePosition(slider); // Update handle position
        });

        slider.addEventListener('change', () => {
            const minSliderValue = sliders[0].value;
            const maxSliderValue = sliders[1].value;
            const params = new URLSearchParams(window.location.search);
            params.set('min_price', minSliderValue);
            params.set('max_price', maxSliderValue);
            updateUrl(params); // Function to update the URL
        });
    });

    // Call to set initial values from URL
    setSliderValuesFromUrl();

});


// Function to read URL parameters
function getUrlParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
  }
  
  // Set the select dropdown and checkboxes based on the URL parameters
  document.addEventListener('DOMContentLoaded', function() {
    const productType = getUrlParam('product_type');
    if (productType) {
      document.querySelector('.product-type-search').value = productType;
    }
  
    const ordereBy = getUrlParam('orderby');
    if (ordereBy) {
      document.querySelector('.product-orderby-search').value = ordereBy;
    }

    // Check if 'stock' parameter exists and equals 'instock'
    if (getUrlParam('stock') === 'instock') {
      document.getElementById('is_in_stock').checked = true; // Check the checkbox
    }
  
    // Check if 'product_visibility' parameter exists and equals 'featured'
    if (getUrlParam('product_visibility') === 'featured') {
      document.getElementById('is_featured_products').checked = true; // Check the checkbox
    }
  });



//Code for hide open div with use class
$(document).mouseup(function(e) {
    var search_top_header = $(".serach_top_header_category_products_res");

    // If the target of the click isn't the container nor a descendant of the container
    if (!search_top_header.is(e.target) && search_top_header.has(e.target).length === 0) {
        search_top_header.hide();
    }
});

//add wishlist with ajax
$('body').on('click', '.add_to_wishlist', function() {
    var product_id = $(this).data('product_id');
    jQuery.ajax({  
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }, 
        url: base_url+'/customer/add-to-wishlist', 
        data: { 
            product_id: product_id, 
        },
        beforeSend: function () {
            $(".add_to_wishlist").prop('disabled', true);
        },
        success: function(response) {
            $('.respnose_wish_list').html(response);
            $(".add_to_wishlist").prop('disabled', false);
        }
    });
});

//remove prdouct from wishlist
$('body').on('click', '.remove-wishlist', function() {
    var product_id = $(this).data('product_id');
    jQuery.ajax({  
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }, 
        url: base_url+'/customer/remove-my-wishlist', 
        data: { 
            product_id: product_id, 
        },
        beforeSend: function () {
            $(".remove-wishlist").prop('disabled', true);
        },
        success: function(response) {
            $('.respnose_wish_list').html(response);
            $(".remove-wishlist").prop('disabled', false);
        }
    });
});