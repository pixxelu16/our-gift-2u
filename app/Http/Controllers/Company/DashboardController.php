<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GiftCardsExport;
use App\Models\PurchagedGiftCard;
use App\Models\GiftCard;
use App\Models\CouponCodes;
use App\Models\User;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use Session;
use Exception;
use Mail;

use App\Mail\CompanySentLinkCouponCodeEmail; 
use App\Mail\CompanyIssuedCouponCodeEmail; 
use Carbon\Carbon;

class DashboardController extends Controller
{
    //Function to show company my account page
    public function my_account(){
        return view('company.my-account');
    }

    //Function to show company my corporate gift card
    public function my_corporate_gift_card(){
        //Login User id
        $login_user_id = auth()->user()->id; 

        //Get purchased all gift card list
        $purchased_gift_card_list = PurchagedGiftCard::Orderby('id', 'DESC')->Where('company_id', $login_user_id)->with('gift_card_detail')->get();  

       // echo "<pre>"; print_r($purchased_gift_card_list); exit;
        return view('company.my-purchaged-gift-card-list', compact('purchased_gift_card_list'));
    }

    //Function for corporate gift_cards page
    public function corporate_gift_cards(){
        $all_gift_cards = GiftCard::Orderby('id', 'DESC')->get();

        return view('company.corporate-gift-cards', compact('all_gift_cards')); 
    }

    //Function for management gift_cards page
    public function management_gift_cards(){
        $all_gift_cards = GiftCard::Orderby('id', 'DESC')->get();

        return view('company.management-gift-cards', compact('all_gift_cards')); 
    }

    //Function to show company my account page
    public function my_purchaged_gift_card_detail($id){
        //Login User id
        $login_user_id = auth()->user()->id; 

        //Get purchased all gift card details
        $purchased_gift_card_detail = PurchagedGiftCard::Where('id', $id)->Where('company_id', $login_user_id)->with('user_detail','gift_card_detail','coupon_code_list')->first();  

        //echo "<pre>"; print_r($purchased_gift_card_detail->toArray()); exit;
        return view('company.my-purchaged-gift-card-detail', compact('purchased_gift_card_detail'));
    }

    //Function to submit purchaged gift card form
    public function submit_purchaged_gift_card(Request $request) {  
        //Check if user is login or not
        if (Auth::check()) {
            //Check payment method
            if($request->payment_method == "Stripe"){      
                //Login id 
                $user_detail = User::Where('id', auth()->user()->id)->first();
                $user_id = auth()->user()->id; 
                $is_user_payble = auth()->user()->is_user_payble; 
                $quintity = $request->final_gift_card_total_value;
                $payable_amount = $request->final_payable_amount; 
                $selected_gift_cards = $request->gift_card_id ?? [];
                $quantities = $request->gift_card_quantity ?? [];
                
                //Call Total Amount
                $total_amount = number_format($payable_amount, 2, '.', ''); 
               
                // Create a new order in database
                $purchaged_gift_card = PurchagedGiftCard::create([
                    'company_id' => $user_id,  
                    'gift_card_id' => 1,
                    'order_amount' => $total_amount,
                    'payment_status' => "Pending",
                    'trasaction_id' => "",
                    'payment_method_type' => $request->payment_method,
                    'is_term_condition' => $request->is_term_condition,
                    'sub_total' => $total_amount,
                    'quintity' => $quintity,
                    'company_name' => $user_detail->company_name ?? "",
                ]);

                //Order Id 
                $purchaged_gift_card_id = $purchaged_gift_card->id;

                // Loop through the selected gift cards and quantities
                foreach ($selected_gift_cards as $index => $gift_card_id) {
                    $quantity = (int)$quantities[$index]; // Get the corresponding quantity

                    $gift_card = GiftCard::find($gift_card_id); // Find the gift card in the database

                    if ($gift_card && $quantity > 0) {
                        // Calculate total for this gift card
                        $gift_card_total = $gift_card->amount * $quantity;
                        $total_amount += $gift_card_total;

                        // Generate coupon codes
                        for ($i = 0; $i < $quantity; $i++) {
                            $couponCode = $this->generateUniqueCouponCode();

                            CouponCodes::create([
                                'company_id' => $user_id,
                                'purchaged_gift_card_id' => $purchaged_gift_card->id,
                                'code' => $couponCode,
                                'expire_date' => Carbon::now()->addDays(30),
                                'price' => number_format($gift_card->amount, 2, '.', ''),
                                'coupon_type' => "Company",
                                'status' => 'Active'
                            ]);
                        }
                    }
                }
                //For loop according to quintity
                /*for($i=0; $i <= $quintity; $i++){
                    // Generate a random unique coupon code
                    $couponCode = $this->generateUniqueCouponCode();

                    //Create Coupon Code Items
                    $couponCodeItem = CouponCodes::create([
                        'company_id' => $user_id,
                        'purchaged_gift_card_id' => $purchaged_gift_card_id,
                        'code' => $couponCode,
                        'expire_date' => Carbon::now()->addDays(30),
                        'price' => number_format($payable_amount, 2, '.', ','),
                        'coupon_type' => "Company",
                        'status' => 'Active'
                    ]);
                } */

                //Check if login  user is payble And Manger
                if($is_user_payble == "No"){
                    //Update Purchaged Gift Card 
                    $gift_card = PurchagedGiftCard::Where('id',$purchaged_gift_card_id)->update(['order_amount' => "0.00",'sub_total' => "0.00",'payment_status' => "Completed",'payment_method_type' => 'None']);

                    //Url
                    $success_page_url = url('/company/purchaged-gift-card-detail').'/'.$purchaged_gift_card_id;
                    echo '<p style="color:green;">Gift Card Purchased Successfully.</p>';
                    echo '<script> 
                        setTimeout(function(){
                            window.location.href = "' . $success_page_url . '";
                        }, 5000); 
                    </script>'; 
                } else {
                    //Call Stripe Payment function
                    $this->card_stripe_payment($request,$purchaged_gift_card_id,$total_amount);  
                }
            } else {
                echo '<p style="color:Red;">Please Choose Payment Method.</p>';
            }
        } else {
            echo '<p style="color:Red;">Please Login Before Place Order.</p>';
        }
    }

    //Function to submit management gift card form
    public function submit_management_gift_card(Request $request) {  
        //echo "<pre>"; print_r($request->all());  exit;
        //Check if user is login or not
        if (Auth::check()) { 
            //Check payment method
            if($request->payment_method == "Stripe"){      
                //Login id  
                $user_id = auth()->user()->id;  
                $quintity = $request->final_gift_card_total_value;
                $payable_amount = $request->final_payable_amount; 
                $selected_gift_cards = $request->gift_card_id ?? [];
                $quantities = $request->gift_card_quantity ?? [];
                
                //Call Total Amount
                $total_amount = number_format($payable_amount, 2, '.', ''); 
                // Create a new order in database
                $purchaged_gift_card = PurchagedGiftCard::create([
                    'company_id' => $user_id,  
                    'gift_card_id' => 1,
                    'order_amount' => $total_amount,
                    'payment_status' => "Pending",
                    'trasaction_id' => "",
                    'payment_method_type' => $request->payment_method,
                    'is_term_condition' => $request->is_term_condition,
                    'sub_total' => $total_amount,
                    'quintity' => $quintity,
                    'company_name' => $request->company_name,
                ]);

                //Order Id 
                $purchaged_gift_card_id = $purchaged_gift_card->id;

                // Loop through the selected gift cards and quantities
                foreach ($selected_gift_cards as $index => $gift_card_id) {
                    $quantity = (int)$quantities[$index]; // Get the corresponding quantity

                    $gift_card = GiftCard::find($gift_card_id); // Find the gift card in the database

                    if ($gift_card && $quantity > 0) {
                        // Calculate total for this gift card
                        $gift_card_total = $gift_card->amount * $quantity;
                        $total_amount += $gift_card_total;

                        // Generate coupon codes
                        for ($i = 0; $i < $quantity; $i++) {
                            $couponCode = $this->generateUniqueCouponCode();

                            CouponCodes::create([
                                'company_id' => $user_id,
                                'purchaged_gift_card_id' => $purchaged_gift_card->id,
                                'code' => $couponCode,
                                'expire_date' => Carbon::now()->addDays(30),
                                'price' => number_format($gift_card->amount, 2, '.', ''),
                                'coupon_type' => "Company",
                                'status' => 'Active'
                            ]);
                        }
                    }
                }

                //For loop according to quintity
                /*for($i=0; $i <= $quintity; $i++){
                    // Generate a random unique coupon code
                    $couponCode = $this->generateUniqueCouponCode();

                    //Create Coupon Code Items
                    $couponCodeItem = CouponCodes::create([
                        'company_id' => $user_id,
                        'purchaged_gift_card_id' => $purchaged_gift_card_id,
                        'code' => $couponCode,
                        'expire_date' => Carbon::now()->addDays(30),
                        'price' => number_format($payable_amount, 2, '.', ','),
                        'coupon_type' => "Company",
                        'status' => 'Active'
                    ]);
                } */

                //Update Gift Card 
                $gift_card = PurchagedGiftCard::Where('id',$purchaged_gift_card_id)->update(['payment_status' => "Completed",'payment_method_type' => 'None']);

                //Url
                $success_page_url = url('/company/purchaged-gift-card-detail').'/'.$purchaged_gift_card_id;
                echo '<p style="color:green;">Gift Card Purchased Successfully.</p>';
                echo '<script> 
                        setTimeout(function(){
                            window.location.href = "' . $success_page_url . '";
                        }, 5000); 
                    </script>';  
            } else {
                echo '<p style="color:Red;">Please Choose Payment Method.</p>';
            }
        } else {
            echo '<p style="color:Red;">Please Login Before Place Order.</p>';
        }
    }

    function generateUniqueCouponCode(){
        do {
            // Generate a random string of 10 characters
            $code = strtoupper(Str::random(10));
        } while (CouponCodes::where('code', $code)->exists()); // Ensure it's unique

        return $code;
    }

    //Function to stripe payment 
    function card_stripe_payment($request,$purchaged_gift_card_id,$total_amount) {
        //Url
        $success_page_url = url('/company/purchaged-gift-card-detail').'/'.$purchaged_gift_card_id;

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
                'amount' => $total_amount * 100,
                'currency' => 'inr',
                'source' => $sourceId,
                'description' => 'New Gift Card Purchaged',
                'receipt_email' => "testing123456543@gmail.com",
                'metadata' => array(
                    'name' => auth()->user()->fname." ".auth()->user()->lname,
                    'email' => auth()->user()->email,
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
                //Update Purchaged Gift Card if Payment is done
                $gift_card = PurchagedGiftCard::Where('id',$purchaged_gift_card_id)->update([
                    'payment_status' => "Completed",
                    'trasaction_id' => $trxn_id,
                ]);

                echo '<p style="color:green;">Gift Card Purchased Successfully.</p>';
                echo '<p style="color:black;">Here is Your Payment Transaction Id. '.$trxn_id.'</p>';
                echo '<script> 
                    setTimeout(function(){
                        window.location.href = "' . $success_page_url . '";
                    }, 5000); 
                </script>';   
            } else {
                echo '<p style="color:green;">Gift Card Purchased Successfully. But Payment is not completed.</p>';
                echo '<script> 
                    setTimeout(function(){
                        window.location.href = "' . $success_page_url . '";
                    }, 3000); 
                </script>';   
            } 
        } else {
            echo '<p style="color:green;">Gift Card Purchased Successfully. But Payment is not completed.</p>';
            echo '<script> 
                setTimeout(function(){
                    window.location.href = "' . $success_page_url . '";
                }, 3000); 
            </script>'; 
        }
    }

    //Function to sent link coupon code
    public function sent_link_coupon_code(Request $request){
        $coupon_id = $request->coupon_id;

        $coupon_code_detail = CouponCodes::where('id',$coupon_id)->first();
        //Chekc if coupon code is exist or not
        if($coupon_code_detail){
            //Email
            $email = auth()->user()->email ?? "";

             //Mail data
             $mail_data = [
                'coupon_code' => $coupon_code_detail->code
            ];

            //Send Email 
            $send_email = Mail::to($email)->send(new CompanySentLinkCouponCodeEmail($mail_data));

            //Check  if emaul is sent ot not
            if($send_email){
                echo '<p style="color:green;">Please check email. Coupon code has been sent in email.</p>';
                 echo '<script>setTimeout(function() { window.location.href = ""; }, 3000);</script>';
            } else {
                echo '<p style="color:green;">Oops something wrong!</p>';
            }
        } 
    }

    //Function to issued coupon code
    public function submit_issued_coupon_code(Request $request){
        $coupon_id = $request->coupon_code_id;
        $email = $request->email ?? "";

        $coupon_code_detail = CouponCodes::where('id',$coupon_id)->first();
        //Chekc if coupon code is exist or not
        if($coupon_code_detail){
             //Mail data
             $mail_data = [
                'coupon_code' => $coupon_code_detail->code
            ];

            //Send Email 
            $send_email = Mail::to($email)->send(new CompanyIssuedCouponCodeEmail($mail_data));

            //Check  if emaul is sent ot not
            if($send_email){
                echo '<p style="color:green;">Coupon code has been sent in email.</p>';
                 echo '<script>setTimeout(function() { window.location.href = ""; }, 3000);</script>';
            } else {
                echo '<p style="color:green;">Oops something wrong!</p>';
            }
        } 
    }

    //export gift cards
    public function export_gift_cards($id)
    {
        return Excel::download(new GiftCardsExport($id), 'gift_cards.xlsx');
    }
} 
