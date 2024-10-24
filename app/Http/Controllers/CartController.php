<?php

namespace App\Http\Controllers;
use App\Helpers\Helper;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\BillingAddress;
use App\Models\UserAddress;
use App\Models\OtherSetting;
use App\Models\CouponCodes;
use App\Models\VerifyCoupon;

use Auth;
use Session;
use Exception;
use Mail;
use App\Mail\ProductManufacturerEmail; 
use App\Mail\OrderPlaceEmail; 
use App\Mail\OrderCustomerInvoiceEmail; 
use App\Mail\AdminPlaceNewOrderEmail; 
use Carbon\Carbon;

class CartController extends Controller
{
    //Function to pre order add to cart
    public function pre_order_add_to_cart(Request $request) {
        //echo "<pre>"; print_r($request->all()); exit;  
        //Get Request
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $points_value = $request->points_value;
        $points_price_value = $request->points_price_value;

        // Initialize the array
        $is_points_apply = []; 
        // Get current cartSession
        $cartItems = session('cart', []);

        //Check if gift card cart session is aleady exist
        if(count(session('gift_card_cart', [])) >= 1){
            echo "<p style='color:red;'>Sorry you have already added Gift Card item in cart.</p>";
            echo '<script>setTimeout(function() { window.location.href = ""; }, 3000);</script>';
        } else {
            //Check if only 1 item is added in the cart
            if(count($cartItems) >= 1){
                echo "<p style='color:red;'>You Can't Add More Item In Cart.</p>";
            } else {
                //Get Product Details
                $product_detail = Product::Where('id',$product_id)->first();
                $product_price = $product_detail->product_price ?? 0;

                // Check if the item is already in the cart
                if (array_key_exists($product_id, $cartItems)) {
                    // If it exists, update the quantity
                    $cartItems[$product_id]['quantity'] += $quantity;
                    $cartItems[$product_id]['product_price'] = $product_price * $cartItems[$product_id]['quantity'];
                } else {
                    // If it doesn't exist, add it to the cart with its attributes and quantity
                    $cartItems[$product_id] = [
                        'itemId' => $product_id,
                        'product_name' => $product_detail->product_name ?? "",
                        'product_slug' => $product_detail->product_slug ?? "", 
                        'description' => $product_detail->description ?? "",
                        'short_description' => $product_detail->short_description ?? "",
                        'product_sku' => $product_detail->product_sku ?? "",
                        'meta_title' => $product_detail->meta_title ?? "",
                        'meta_description' => $product_detail->meta_description ?? "",
                        'price' => $product_price * $quantity,
                        'shipping_price' => $product_detail->shipping_price ?? 0,
                        'quantity' => $quantity,
                        'image' => $product_detail->image ?? "", 
                        'is_cart_type' => 'pre_order',
                        'is_points_apply' => $is_points_apply, 
                    ];
                }
                //Store the updated cart items in the session
                session(['cart' => $cartItems]); 
                
                echo '<p style="color:green;">Pre Order Item Added In Cart Successfully</p>';
                // Url here
                $url = url('/cart');
                echo '<script>setTimeout(function() { window.location.href = "'.$url.'"; }, 2000);</script>';
            }
        }
    }

    //Function toadd to cart
    public function add_to_cart(Request $request) {
        //echo "<pre>"; print_r(session('cart', [])); exit;  
        //Get Request
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $points_value = $request->points_value ?? 0;
        $points_price_value = $request->points_price_value ?? 0;
        
        // Initialize the array
        $is_points_apply = [];
        // Get current cartSession
        $cartItems = session('cart', []);

        //Check if gift card cart session is aleady exist
        if(count(session('gift_card_cart', [])) >= 1){
            echo "<p style='color:red;'>Sorry you have already added Gift Card item in cart.</p>";
            echo '<script>setTimeout(function() { window.location.href = ""; }, 3000);</script>';
        } else {
            //Check if only 1 item is added in the cart
            if(count($cartItems) >= 1){
                echo "<p style='color:red;'>You Can't Add More Item In Cart.</p>";
            } else {
                //Get Product Details
                $product_detail = Product::Where('id',$product_id)->first();
                $product_price = $product_detail->product_price ?? 0;

                // Check if the item is already in the cart
                if (array_key_exists($product_id, $cartItems)) {
                    // If it exists, update the quantity
                    $cartItems[$product_id]['quantity'] += $quantity;
                    $cartItems[$product_id]['product_price'] = $product_price * $cartItems[$product_id]['quantity'];
                } else {
                    // If it doesn't exist, add it to the cart with its attributes and quantity
                    $cartItems[$product_id] = [
                        'itemId' => $product_id,
                        'product_name' => $product_detail->product_name ?? "",
                        'product_slug' => $product_detail->product_slug ?? "", 
                        'description' => $product_detail->description ?? "",
                        'short_description' => $product_detail->short_description ?? "",
                        'product_sku' => $product_detail->product_sku ?? "",
                        'meta_title' => $product_detail->meta_title ?? "",
                        'meta_description' => $product_detail->meta_description ?? "",
                        'price' => $product_price * $quantity,
                        'shipping_price' => $product_detail->shipping_price ?? 0,
                        'quantity' => $quantity,
                        'image' => $product_detail->image ?? "", 
                        'is_cart_type' => 'simple_order',
                        'is_points_apply' => $is_points_apply,
                    ];
                }
                //Store the updated cart items in the session
                session(['cart' => $cartItems]); 
                
                echo '<p style="color:green;">Item Added In Cart Successfully</p>';
                // Url here
                $url = url('/cart');
                echo '<script>setTimeout(function() { window.location.href = "'.$url.'"; }, 2000);</script>';
            }
        }
    }

    //Function to gift card add to cart
    public function gift_card_add_to_cart(Request $request) {
        //echo "<pre>"; print_r(session('cart', [])); exit;  
        //Get Request
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        
        // Get current cartSession
        $cartItems = session('gift_card_cart', []);

        //Check if gift card cart session is aleady exist
        if(count(session('cart', [])) >= 1){
            echo "<p style='color:red;'>Sorry you have already added Product item in cart.</p>";
            echo '<script>setTimeout(function() { window.location.href = ""; }, 3000);</script>';
        } else {
            //Get Product Details
            $product_detail = Product::Where('id',$product_id)->first();
            $product_price = $product_detail->product_price ?? 0;

            // Check if the item is already in the cart
            if (array_key_exists($product_id, $cartItems)) {
                // If it exists, update the quantity
                $cartItems[$product_id]['quantity'] += $quantity;
                $cartItems[$product_id]['product_price'] = $product_price * $cartItems[$product_id]['quantity'];
            } else {
                // If it doesn't exist, add it to the cart with its attributes and quantity
                $cartItems[$product_id] = [
                    'itemId' => $product_id,
                    'product_name' => $product_detail->product_name ?? "",
                    'product_slug' => $product_detail->product_slug ?? "", 
                    'description' => $product_detail->description ?? "",
                    'short_description' => $product_detail->short_description ?? "",
                    'product_sku' => $product_detail->product_sku ?? "",
                    'meta_title' => $product_detail->meta_title ?? "",
                    'meta_description' => $product_detail->meta_description ?? "",
                    'price' => $product_price,
                    'shipping_price' => $product_detail->shipping_price ?? 0,
                    'quantity' => $quantity,
                    'image' => $product_detail->image ?? "", 
                    'is_cart_type' => 'gift_card_order',
                ];
            }
            //Store the updated cart items in the session
            session(['gift_card_cart' => $cartItems]); 
            
            echo '<p style="color:green;">Item Added In Cart Successfully</p>';
            echo '<script>setTimeout(function() { window.location.href = ""; }, 2000);</script>';
        }
    }

    //Function to remove item from cart
    public function remove_cart_item(Request $request){  
        //Get request
        $item_id = $request->item_id;
        //Call Cart session
        $cartItems = session('cart', []);
        //check if session item iexs or not
        if (array_key_exists($item_id, $cartItems)) {
            //unset the session
            unset($cartItems[$item_id]);
            session(['cart' => $cartItems]);
            
            echo '<p style="color:green;">Item Removed From Cart List</p>';
            echo '<script> 
                        setTimeout(function(){
                            location.reload();
                        }, 3000); 
                    </script>';  
        } else {
            echo '<p style="color:red;">Oops Something Wrong.</p>';
        }
    } 

    //Function to remove cart credit from cart
    public function remove_cart_credit(Request $request) { 
        //Get Login user id
        $login_user_id = Auth::id();
        $applied_cart_amount = 0;
        // Check if applied_cart_credit session is exist
        if (session()->has('applied_cart_credit')) {
            // Get the amount value from the session
            $applied_cart_amount = session('applied_cart_credit')['amount'];

            //Call helper to manage user points
            $tab_type = "order_spend_points";
            $new_points = $applied_cart_amount;
            $point_type = 'Plus';
            $name = "Remove Credit";
            Helper::manage_user_points($login_user_id,$tab_type,$new_points,$point_type,$name);

            //distroy session
            session()->forget('applied_cart_credit');

            // Display success message and reload the page
            echo '<p style="color:green;">Credit Removed From Cart Successfully.</p>';
            echo '<script> 
                    setTimeout(function(){
                        location.reload();
                    }, 3000); 
                </script>';  
        } elseif(session()->has('applied_gift_card_credit')) {
            // Get the amount value from the session
            $applied_cart_amount = session('applied_gift_card_credit')['amount'];

            //Call helper to manage user points
            $tab_type = "order_spend_points";
            $new_points = $applied_cart_amount;
            $point_type = 'Plus';
            $name = "Remove Credit";
            Helper::manage_user_points($login_user_id,$tab_type,$new_points,$point_type,$name);

            //distroy session
            session()->forget('applied_gift_card_credit');

            // Display success message and reload the page
            echo '<p style="color:green;">Credit Removed From Cart Successfully.</p>';
            echo '<script> 
                    setTimeout(function(){
                        location.reload();
                    }, 3000); 
                </script>';  
        } else {
            echo '<p style="color:red;">Oops something wrong.</p>';
        }
    }  
    
    //Function to submit apply credit from cart
    public function submit_apply_gift_card_apply_credit(Request $request) {
        //Get Login user id
        $login_user_id = Auth::id();
        $my_balance = Auth::user()->total_points;
        $apply_credit = $request->apply_credit;

        //Check user has  enough balance or not
        if($my_balance >= 1 AND $apply_credit <= $my_balance) {
            $cart_sub_total_amount = 0;
            foreach(session('gift_card_cart', []) as $key => $item){
                $cart_sub_total_amount += $item['price'] * $item['quantity']; 
            }
    
            //Check if cart items subtotal is less than or equal to apply credit
            if($apply_credit < $cart_sub_total_amount){
                // Optionally, store coupon details in the session
                Session::put('applied_gift_card_credit', ['amount' => $apply_credit]);
    
                //Call helper to manage user points
                $tab_type = "order_spend_points";
                $new_points = $apply_credit;
                $point_type = 'Minus';
                $name = "Apply Credit";
                Helper::manage_user_points($login_user_id,$tab_type,$new_points,$point_type,$name);
    
                echo '<p style="color:green;">Credit Applied Successfully.</p>';
                echo '<script>setTimeout(function() { window.location.href = ""; }, 3000);</script>';
            } else {
                echo '<p style="color:red;">Sorry your item subtotal is less than from applied credit.</p>';
            }
        } else {
            echo '<p style="color:red;">Sorry you have not enough balance in your account.</p>';
        }
    }

    //Function to submit apply credit from cart
    public function submit_apply_credit_cart(Request $request) {
        //Get Login user id
        $login_user_id = Auth::id();
        $my_balance = Auth::user()->total_points;
        $apply_credit = $request->apply_credit;

        //Check user has  enough balance or not
        if($my_balance >= 1 AND $apply_credit <= $my_balance) {
            $cart_sub_total_amount = 0;
            foreach(session('cart', []) as $key => $item){
                $cart_sub_total_amount += $item['price'] * $item['quantity'];
                $cart_sub_total_amount += $item['shipping_price'];  
            }
           
            //Check if cart items subtotal is less than or equal to apply credit
            if($apply_credit < $cart_sub_total_amount){
                // Optionally, store coupon details in the session
                Session::put('applied_cart_credit', ['amount' => $apply_credit]);
    
                //Call helper to manage user points
                $tab_type = "order_spend_points";
                $new_points = $apply_credit;
                $point_type = 'Minus';
                $name = "Apply Credit";
                Helper::manage_user_points($login_user_id,$tab_type,$new_points,$point_type,$name);
    
                echo '<p style="color:green;">Credit Applied Successfully.</p>';
                echo '<script>setTimeout(function() { window.location.href = ""; }, 3000);</script>';
            } else {
                echo '<p style="color:red;">Sorry your item subtotal is less than from applied credit.</p>';
            }
        } else {
            echo '<p style="color:red;">Sorry you have not enough balance in your account.</p>';
        }
    }

    //Function to remove gift card item from cart
    public function remove_gift_card_cart_item(Request $request){  
        //Get request
        $item_id = $request->item_id;
        //Call Cart session
        $cartItems = session('gift_card_cart', []);
        //check if session item iexs or not
        if (array_key_exists($item_id, $cartItems)) {
            //unset the session
            unset($cartItems[$item_id]);
            session(['gift_card_cart' => $cartItems]);
            
            echo '<p style="color:green;">Item Removed From Cart List</p>';
            echo '<script> 
                        setTimeout(function(){
                            location.reload();
                        }, 3000); 
                    </script>';  
        } else {
            echo '<p style="color:red;">Oops Something Wrong.</p>';
        }
    } 

    //Function to submit checkout form
    public function submit_checkout(Request $request) {   
        //Check if user is login or not
        if (Auth::check()) {
            //Check payment method
            if($request->payment_method == "Stripe"){      
                //Login id
                $user_id = auth()->user()->id;
                 //Other Setting
                $other_setting = OtherSetting::first()->ToArray();
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
                if (session()->has('applied_cart_credit')) {
                    // Get the discount value from the session
                    $applied_cart_amount = session('applied_cart_credit')['amount'];
                }

                //cart Total Amount
                $cartItems = session('cart', []);
                $cart_total_amount = 0;
                $postage_handling_charges = 0;
                $is_order_type = "simple_order";
                // Calculate total amount
                foreach($cartItems as $item) {
                    $cart_total_amount += $item['price'] * $item['quantity'];
                    $postage_handling_charges += $item['shipping_price'];  
                    $is_order_type = $item['is_cart_type'];

                    //Check if order type  is pre_order
                    if($is_order_type == "pre_order"){
                        $product_id = $item['itemId'];
                        //Call Send Product Manufacturer Email
                        $this->send_product_manufacturer_email($product_id,$request);
                    }
                }
                //Cal Postage Handling Charges Fees
                $discount_amount = ($cart_total_amount * $table_insurance_fee) / 100; 
                $total_cost = $cart_total_amount-$discount_amount; 
                $international_local_insurance = number_format($discount_amount, 2, '.', ','); 
                
                //Cal Sub total
                $sub_total_amount2 = $cart_total_amount;
                $sub_total_amount = $sub_total_amount2-$applied_cart_amount;

                //Cal Tax
                $tax_discount_amount = ($sub_total_amount * $table_tax) / 100; 
                $tax_total_amount = number_format($tax_discount_amount, 2, '.', ','); 

                //Call Total Amount
                $total_amount2 = $cart_total_amount+$postage_handling_charges+$table_admin_fee+$international_local_insurance+$tax_total_amount;
                $total_amount = $total_amount2-$applied_cart_amount;

                // Create a new order in database
                $order = Order::create([
                    'user_id' => $user_id,
                    'order_amount' => $total_amount,
                    'payment_status' => "Pending",
                    'trasaction_id' => "",
                    'payment_method_type' => $request->payment_method,
                    'is_order_type' => $is_order_type,
                    'is_term_condition' => $request->is_term_condition,
                    'point_price' => $applied_cart_amount,
                    'shiping_charges' => $postage_handling_charges,
                    'insurance_fee' => $international_local_insurance,
                    'admin_fee' => $table_admin_fee,
                    'total_tax' => $tax_total_amount,
                    'sub_total' => $sub_total_amount,
                ]);

                //Order Id
                $order_id = $order->id;
                //Call Function to Send Placed New Order Email
                $this->send_place_new_order_email($order_id,$request);

                // Insert order items into the database
                foreach($cartItems as $item) {
                    //Call manage order capacity function
                    $product_id = $item['itemId'];
                    $quantity = $item['quantity'];
                    $order_type = $is_order_type;
                    $this->manage_order_capacity($product_id, $quantity, $order_type); 
                    //Create Order Items
                    $orderItem = OrderItems::create([
                        'order_id' => $order->id,
                        'product_id' => $item['itemId'],
                        'product_name' => $item['product_name'],
                        'price' => number_format($item['price'], 2, '.', ','),
                        'image' => $item['image'],
                        'quantity' => $item['quantity']
                    ]);
                } 
                
                //Check if shipping address is checked or not
                $is_shiping_address = 'No';
                $shiping_address_name = null;
                $shiping_contact_number = null;
                $shiping_address_email = null;
                $shiping_address_street_address = null;
                $shipping_address = null;
                $shiping_address_city = null;
                $shiping_address_state = null;
                $shiping_address_country = null;
                $shiping_address_pincode = null;
                if($request['is_same_as_billing_address'] == "Yes"){
                    $is_shiping_address = $request['is_same_as_billing_address'];
                    $shiping_address_name = $request['shiping_address'];
                    $shiping_contact_number = $request['shiping_phone_number'];
                    $shiping_address_email = $request['shiping_customer_email'];
                    $shiping_address_street_address = $request['shiping_address2'];
                    $shipping_address = $request['shiping_address'];
                    $shiping_address_city = $request['shiping_city'];
                    $shiping_address_state = $request['shiping_state'];
                    $shiping_address_country = $request['shiping_country'];
                    $shiping_address_pincode = $request['shiping_post_code'];
                }

                // Insert billing address into the database
                BillingAddress::create([
                    'order_id' => $order->id,
                    'name' => $request['fname'].' '.$request['lname'],
                    'contact_number' => $request['phone_number'],
                    'email' => $request['customer_email'],
                    'address' => $request['address'],
                    'street_address' => $request['address2'],
                    'city' => $request['city'],
                    'state' => $request['state'],
                    'country' => $request['country'],
                    'pincode' => $request['post_code'],
                    'shipping_method' => $is_shiping_address,
                    'shipping_name' => $shiping_address_name,
                    'shipping_contact_number' => $shiping_contact_number,
                    'shipping_email' => $shiping_address_email,
                    'shipping_address' => $shipping_address,
                    'shipping_street_address' => $shiping_address_street_address,
                    'shipping_city' => $shiping_address_city,
                    'shipping_state' => $shiping_address_state,
                    'shipping_pincode' => $shiping_address_pincode,
                    'shipping_country' => $shiping_address_country,
                    'is_order_note' => $request['is_order_note'],
                    'order_note_desc' => $request['order_note_desc'],
                ]);

                // Insert user addresses into the database using updateOrCreate
                UserAddress::updateOrCreate(
                    ['user_id' => $user_id], 
                    [
                        'billing_name' => $request['fname'].' '.$request['lname'],
                        'billing_contact' => $request['phone_number'],
                        'billing_email' => $request['customer_email'],
                        'billing_street_address' => $request['address2'],
                        'billing_city' => $request['city'],
                        'billing_state' => $request['state'],
                        'billing_post_code' => $request['post_code'],
                        'billing_country' => $request['country'],
                        'shipping_method' => $is_shiping_address,
                        'shipping_name' => $shiping_address_name,
                        'shipping_contact' => $shiping_contact_number,
                        'shipping_email' => $shiping_address_email,
                        'shipping_street_address' => $shiping_address_street_address,
                        'shipping_city' => $shiping_address_city,
                        'shipping_state' => $shiping_address_state,
                        'shipping_pincode' => $shiping_address_pincode,
                        'shipping_country' => $shiping_address_country,
                    ]
                );
                // Clear the cart and image session after processing the order
                session()->forget('cart');  
                session()->forget('applied_cart_credit');  
                
                //Call Send Admin Place New Order Email Function
                $this->send_admin_place_new_order_email($order_id,$request);
                //Call Send Customer Order Invoice Email Function 
                $this->send_customer_invoice_order_email($order_id,$request);

                //Call Stripe Payment function
                $this->card_stripe_payment($request,$order_id,$total_amount); 
            } else {
                echo '<p style="color:Red;">Please Choose Payment Method.</p>';
            }
        } else {
            echo '<p style="color:Red;">Please Login Before Place Order.</p>';
        }
    }

    //Function to submit gift card checkout form
    public function submit_gift_card_checkout(Request $request) {  
        //Check if user is login or not
        if (Auth::check()) {
            //Check payment method
            if($request->payment_method == "Stripe"){      
                //Login id
                $user_id = auth()->user()->id;
                 //Other Setting
                $other_setting = OtherSetting::first()->ToArray();
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
                if (session()->has('applied_gift_card_credit')) {
                    // Get the discount value from the session
                    $applied_cart_amount = session('applied_gift_card_credit')['amount'];
                }

                //cart Total Amount
                $cartItems = session('gift_card_cart', []);
                $cart_total_amount = 0;
                $postage_handling_charges = 0;
                $is_order_type = "gift_card_order";
                // Calculate total amount
                foreach($cartItems as $item) {
                    $cart_total_amount += $item['price'] * $item['quantity']; 
                }
                //Cal Postage Handling Charges Fees
                $discount_amount = ($cart_total_amount * $table_insurance_fee) / 100; 
                $total_cost = $cart_total_amount-$discount_amount; 
                $international_local_insurance = number_format($discount_amount, 2, '.', ','); 
                
                //Cal Sub total
                $sub_total_amount2 = $cart_total_amount;
                $sub_total_amount = $sub_total_amount2-$applied_cart_amount;

                //Cal Tax
                $tax_discount_amount = ($sub_total_amount * $table_tax) / 100; 
                $tax_total_amount = number_format($tax_discount_amount, 2, '.', ','); 

                //Call Total Amount
                $total_amount2 = $cart_total_amount+$postage_handling_charges+$table_admin_fee+$international_local_insurance+$tax_total_amount;
                $total_amount = $total_amount2-$applied_cart_amount;


                // Create a new order in database
                $order = Order::create([
                    'user_id' => $user_id,
                    'order_amount' => $total_amount,
                    'payment_status' => "Pending",
                    'trasaction_id' => "",
                    'payment_method_type' => $request->payment_method,
                    'is_order_type' => $is_order_type,
                    'is_term_condition' => $request->is_term_condition,
                    'point_price' => $applied_cart_amount,
                    'shiping_charges' => $postage_handling_charges,
                    'insurance_fee' => $international_local_insurance,
                    'admin_fee' => $table_admin_fee,
                    'total_tax' => $tax_total_amount,
                    'sub_total' => $sub_total_amount,
                ]);

                //Order Id
                $order_id = $order->id;
                //Call Function to Send Placed New Order Email
                $this->send_place_new_order_email($order_id,$request);

                // Insert order items into the database
                foreach($cartItems as $item) {
                    //Call manage order capacity function
                    $product_id = $item['itemId'];
                    $quantity = $item['quantity'];
                    $order_type = $is_order_type;
                    $this->manage_order_capacity($product_id, $quantity, $order_type); 
                    //Create Order Items
                    $orderItem = OrderItems::create([
                        'order_id' => $order->id,
                        'product_id' => $item['itemId'],
                        'product_name' => $item['product_name'],
                        'price' => number_format($item['price'], 2, '.', ','),
                        'image' => $item['image'],
                        'quantity' => $item['quantity']
                    ]);
                } 
                
                //Check if shipping address is checked or not
                $is_shiping_address = 'No';
                $shiping_address_name = null;
                $shiping_contact_number = null;
                $shiping_address_email = null;
                $shiping_address_street_address = null;
                $shipping_address = null;
                $shiping_address_city = null;
                $shiping_address_state = null;
                $shiping_address_country = null;
                $shiping_address_pincode = null;
                if($request['is_same_as_billing_address'] == "Yes"){
                    $is_shiping_address = $request['is_same_as_billing_address'];
                    $shiping_address_name = $request['shiping_address'];
                    $shiping_contact_number = $request['shiping_phone_number'];
                    $shiping_address_email = $request['shiping_customer_email'];
                    $shiping_address_street_address = $request['shiping_address2'];
                    $shipping_address = $request['shiping_address'];
                    $shiping_address_city = $request['shiping_city'];
                    $shiping_address_state = $request['shiping_state'];
                    $shiping_address_country = $request['shiping_country'];
                    $shiping_address_pincode = $request['shiping_post_code'];
                }

                // Insert billing address into the database
                BillingAddress::create([
                    'order_id' => $order->id,
                    'name' => $request['fname'].' '.$request['lname'],
                    'contact_number' => $request['phone_number'],
                    'email' => $request['customer_email'],
                    'address' => $request['address'],
                    'street_address' => $request['address2'],
                    'city' => $request['city'],
                    'state' => $request['state'],
                    'country' => $request['country'],
                    'pincode' => $request['post_code'],
                    'shipping_method' => $is_shiping_address,
                    'shipping_name' => $shiping_address_name,
                    'shipping_contact_number' => $shiping_contact_number,
                    'shipping_email' => $shiping_address_email,
                    'shipping_address' => $shipping_address,
                    'shipping_street_address' => $shiping_address_street_address,
                    'shipping_city' => $shiping_address_city,
                    'shipping_state' => $shiping_address_state,
                    'shipping_pincode' => $shiping_address_pincode,
                    'shipping_country' => $shiping_address_country,
                    'is_order_note' => $request['is_order_note'],
                    'order_note_desc' => $request['order_note_desc'],
                ]);

                // Insert user addresses into the database using updateOrCreate
                UserAddress::updateOrCreate(
                    ['user_id' => $user_id], 
                    [
                        'billing_name' => $request['fname'].' '.$request['lname'],
                        'billing_contact' => $request['phone_number'],
                        'billing_email' => $request['customer_email'],
                        'billing_street_address' => $request['address2'],
                        'billing_city' => $request['city'],
                        'billing_state' => $request['state'],
                        'billing_post_code' => $request['post_code'],
                        'billing_country' => $request['country'],
                        'shipping_method' => $is_shiping_address,
                        'shipping_name' => $shiping_address_name,
                        'shipping_contact' => $shiping_contact_number,
                        'shipping_email' => $shiping_address_email,
                        'shipping_street_address' => $shiping_address_street_address,
                        'shipping_city' => $shiping_address_city,
                        'shipping_state' => $shiping_address_state,
                        'shipping_pincode' => $shiping_address_pincode,
                        'shipping_country' => $shiping_address_country,
                    ]
                );
                // Clear the cart and image session after processing the order
                session()->forget('gift_card_cart');  
                session()->forget('applied_gift_card_credit');  
                
                //Call Send Admin Place New Order Email Function
                $this->send_admin_place_new_order_email($order_id,$request);
                //Call Send Customer Order Invoice Email Function 
                $this->send_customer_invoice_order_email($order_id,$request);

                //Call Stripe Payment function
                $this->card_stripe_payment($request,$order_id,$total_amount); 
            } else {
                echo '<p style="color:Red;">Please Choose Payment Method.</p>';
            }
        } else {
            echo '<p style="color:Red;">Please Login Before Place Order.</p>';
        }
    }

    //Function to stripe payment 
    function card_stripe_payment($request,$order_id,$order_amount) {
        //Url
        $success_page_url = url('/customer/order-placed').'/'.$order_id;

        // Stripe Secret Key
        $token = $request->stripeToken;
        //$stripe_secret_key = 'sk_test_51H0nPoDvceTrdDqddk0zM9K8PaRwyrC4zTbqzbsKLpCtsa3jv6TwrZZrzw7CnH1ov4FDvqUxHCYFhw8YTC1YEFLA00wDsEB5cY'; 
        $stripe_secret_key = env('STRIPE_SECRET_KEY');
        $sourceParams = array(
            'type' => 'card', 
            'token' => $token,
            'owner' => array(
                'name' => "Admin",
                'address' => array(
                    'line1' => '123 Test Street',
                    'city' => 'Test City',
                    'state' => 'Test State',
                    'postal_code' => '12345',
                    'country' => 'IN',
                ),
            ),
        );

        // Create a source
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.stripe.com/v1/sources",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => http_build_query($sourceParams),
            CURLOPT_USERPWD => "$stripe_secret_key:",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded"
            ),
        ));
        $sourceResponse = curl_exec($curl);
        //Source Json Decode
        $sourceData = json_decode($sourceResponse);

        //Check if source status is chargeable or not
        if($sourceData->status == "chargeable") {
            //Source Id
            $sourceId = $sourceData->id;

            //Charge creation parameters
            $chargeParams = array(
                'amount' => $order_amount * 100,
                'currency' => 'inr',
                'source' => $sourceId,
                'description' => 'New Order Placed',
                'receipt_email' => "testing123456543@gmail.com",
                'metadata' => array(
                    'name' => $request->fname." ".$request->lname,
                    'email' => $request->email,
                )
            );
          
            // Charge the customer
            $curl2 = curl_init();
            curl_setopt_array($curl2, array(
                CURLOPT_URL => "https://api.stripe.com/v1/charges",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POSTFIELDS => http_build_query($chargeParams),
                CURLOPT_USERPWD => "$stripe_secret_key:",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/x-www-form-urlencoded"
                ),
            ));
          
            $response = curl_exec($curl2);
            curl_close($curl2);
            //Charge Json Decode
            $chargeResponse = json_decode($response);
            //Check if charge status is succeeded or not
            if($chargeResponse->status == "succeeded") {
                $trxn_id = $chargeResponse->id;
                //Update Order if Payment is done
                $order = Order::Where('id',$order_id)->update([
                    'payment_status' => "Completed",
                    'trasaction_id' => $trxn_id,
                ]);

                echo '<p style="color:green;">Your Order Is Placed Successfully.</p>';
                echo '<p style="color:black;">Here is Your Payment Transaction Id. '.$trxn_id.'</p>';
                echo '<script> 
                    setTimeout(function(){
                        window.location.href = "' . $success_page_url . '";
                    }, 5000); 
                </script>';   
            } else {
                echo '<p style="color:green;">Your Order Is Placed Successfully. But Payment is not completed.</p>';
                echo '<script> 
                    setTimeout(function(){
                        window.location.href = "' . $success_page_url . '";
                    }, 3000); 
                </script>';   
            } 
        } else {
            echo '<p style="color:green;">Your Order Is Placed Successfully. But Payment is not completed.</p>';
            echo '<script> 
                setTimeout(function(){
                    window.location.href = "' . $success_page_url . '";
                }, 3000); 
            </script>'; 
        }
    }

    //Function to send Customer Order Invoice Email 
    function send_customer_invoice_order_email($order_id,$request) {
        //Get Order detail
        $order_detail = Order::Where('id', $order_id)->with('order_items','billing_address')->first();
        //Chekc if prouduct is exist or not
        if($order_detail){
            $customer_email = $request->customer_email ?? "";
            //Send Email 
            $send_email = Mail::to($customer_email)->send(new OrderCustomerInvoiceEmail($order_detail));
        } 
    }
    
    //Function to Send Admin Place New Order Email 
    function send_admin_place_new_order_email($order_id,$request) {
        //Get Order detail
        $order_detail = Order::Where('id', $order_id)->with('order_items','billing_address')->first();
        //Chekc if prouduct is exist or not
        if($order_detail){
            $admin_email = env('ADMIN_EMAIL_ADDRESS') ?? "";
            //Send Email 
            $send_email = Mail::to($admin_email)->send(new AdminPlaceNewOrderEmail($order_detail));
        } 
    } 
    
    //Function to send Product Manufacturer Email
    function send_product_manufacturer_email($product_id,$request) {
        // Calculate total amount
        $cartItems = session('cart', []);
        $cart_total_amount = 0;
        foreach($cartItems as $item) {
            $cart_total_amount += $item['price'] * $item['quantity'];
        }

        //Get Product detail
        $product_detail = Product::Where('id', $product_id)->first();
        //Chekc if prouduct is exist or not
        if($product_detail){
            $manufacturer_email = $product_detail->manufacturer_email ?? "";
            //Mail data
            $MailData = [
                'product_name' => $product_detail->product_name,
                'product_sku_number' => $product_detail->product_sku,
                'product_price' => "$".$cart_total_amount,
                'customer_name' => $request->fname." ".$request->lname,
                'customer_email' => $request->customer_email,
                'customer_mobile' => $request->phone_number,
            ];
            //Send Email 
            $send_email = Mail::to($manufacturer_email)->send(new ProductManufacturerEmail($MailData));
        }
    }

    //Function to send New Order Placed Email
    function send_place_new_order_email($order_id,$request) {
        //Get Order detail
        $order_detail = Order::Where('id', $order_id)->first();
        //Chekc if prouduct is exist or not
        if($order_detail){
            $order_amount = $order_detail->order_amount ?? "";
            $customer_email = $request->customer_email ?? "";
            //Mail data
            $MailData = [
                'customer_name' => $request->fname." ".$request->lname,
                'order_id' => "#".$order_id,
                'total_amount' => "$".$order_amount,
                'order_link' => url('/customer/order-placed').'/'.$order_id,
            ];
            //Send Email 
            $send_email = Mail::to($customer_email)->send(new OrderPlaceEmail($MailData));
        }
    } 

    //Function to check order capacity or pre order capacity
    public function manage_order_capacity($product_id, $quantity, $order_type) {
        // Determine the column to update based on the order type
        $column = $order_type === 'pre_order' ? 'pre_order_capacity' : 'product_quantity';
    
        // Decrement the appropriate column by the specified quantity
        $updated = Product::where('id', $product_id)
            ->where('status', 'Active')
            ->decrement($column, $quantity);
    }
}