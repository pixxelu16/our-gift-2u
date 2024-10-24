<?php

namespace App\Http\Controllers\Customer;
use App\Helpers\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Order;
use App\Models\UserAddress;
use App\Models\User;
use App\Models\UserPointsLog;
use App\Models\PointsLogList;
use App\Models\CouponCodes;
use App\Models\ReferCode;
use App\Models\VerifyCoupon;
use Carbon\Carbon;

use Mail;
use App\Mail\InvitFriendReferEmail; 

class DashboardController extends Controller
{
    //Function to show customer my account page
    public function my_account(){
        return view('customer.my-account');
    }

    //Function to show customer my orders page
    public function my_orders(){
        //Get Login user id
        $login_user_id = Auth::id();

        $all_orders = Order::OrderBy('id', 'DESC')->Where('user_id',$login_user_id)->with('order_items','billing_address')->get();

        return view('customer.my-orders',compact('all_orders'));
    }

    //Function to show customer addresses page
    public function addresses(){
        //Get Login user id
        $login_user_id = Auth::id();

        $user_billing_detail = UserAddress::Where('user_id', $login_user_id)->first();
        $user_shipping_detail = UserAddress::Where('user_id', $login_user_id)->first();

        return view('customer.addresses',compact('user_billing_detail','user_shipping_detail'));
    }

    //Function to show customeraccount_details page
    public function account_details(){
        //Get Login user id
        $login_user_id = Auth::id();

        $user_account_detail = User::Where('id', $login_user_id)->first();

        return view('customer.account-details', compact('user_account_detail'));
    }

    //Function for submit account details page
    public function submit_account_detail(Request $request){
        // Get logged-in user
        $user = Auth::user();
        $login_user_id = $user->id;

        // Check if current_password and new_password are provided
        if ($request->has('current_password') && $request->has('new_password')) {
            // Check if new_password and confirm_new_password match
            if ($request->new_password === $request->confirm_new_password) {
                // Verify current password
                if (!Hash::check($request->current_password, $user->password)) {
                    return back()->with('unsuccess', 'Your current password does not match with the password you provided.');
                }

                // Update password
                $user->password = Hash::make($request->new_password);
                $user->save();
            } else {
                return back()->with('unsuccess', 'New password and Confirm password do not match. Please try again.');
            }
        }

        // Update user info
        $is_account_updated = $user->update([
            'name' => $request->first_name . " " . $request->last_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);

        // Check if account update was successful
        if ($is_account_updated) {
            return back()->with('success', 'Account details updated successfully.');
        } else {
            return back()->with('unsuccess', 'Oops, something went wrong.');
        }
    }

    //Function to show order placed page
    public function order_placed($id){
        //Get oder detail with  use order id
        $order_detail = Order::with('order_items','billing_address')->find($id);
       
        //Check if order is exist or not
        if($order_detail){
            return view('customer.order-placed',compact('order_detail'));
        } else {
            return redirect('/');
        } 
    }

    //Function to show my downloads page
    public function my_downloads(){
        return view('customer.my-downloads');
    } 

    //Function to show my store credit page
    public function my_store_credit(){
        return view('customer.my-store-credit');
    }

    //Function to show edit billing address credit page
    public function edit_billing_address(){ 
         //Get Login user id
         $login_user_id = Auth::id();

         $user_billing_detail = UserAddress::Where('user_id', $login_user_id)->first();

        return view('customer.edit-billing-address', compact('user_billing_detail'));
    }

    //Function for submit customer add billing address
    public function submit_billing_address(Request $request){
        //Get Login user id
        $login_user_id = Auth::id();
       
        //Update and insert address
        $is_address_insert = UserAddress::updateOrCreate(
                ['user_id' => $login_user_id], 
                [
                    'billing_name' => $request['billing_name'],
                    'billing_contact' => $request['billing_contact'],
                    'billing_email' => $request['billing_email'],
                    'billing_street_address' => $request['billing_street_address'],
                    'billing_city' => $request['billing_city'],
                    'billing_state' => $request['billing_state'],
                    'billing_post_code' => $request['billing_post_code'],
                    'billing_country' => $request['billing_country'],     
                ] 
            );

        //Check if billing address is insert or not
        if($is_address_insert){
            return back()->with('success','Billing Address Updated Successfully.');
        } else {
            return back()->with('unsuccess','Oops something wrong.');
        }
    }

    //Function to show edit shipping address page
    public function edit_shipping_address(){
        //Get Login user id
        $login_user_id = Auth::id();

        $user_shipping_detail = UserAddress::Where('user_id', $login_user_id)->first();

        return view('customer.edit-shipping-address', compact('user_shipping_detail'));
    }

    //Function for submit customer add shipping address
    public function submit_shipping_address(Request $request){
        //Get Login user id
        $login_user_id = Auth::id();
       
        //Update and insert address
        $is_address_insert = UserAddress::updateOrCreate(

                ['user_id' => $login_user_id], 
                [
                    'shipping_name' => $request['shipping_name'],
                    'shipping_contact' => $request['shipping_contact'],
                    'shipping_email' => $request['shipping_email'],
                    'shipping_street_address' => $request['shipping_street_address'],
                    'shipping_city' => $request['shipping_city'],
                    'shipping_state' => $request['shipping_state'],
                    'shipping_post_code' => $request['shipping_post_code'],
                    'shipping_country' => $request['shipping_country']
                ]
            );

        // Check if shipping address is inserted or not
        if($is_address_insert){
            return back()->with('success','Shipping Address Created Successfully.');
        } else {
            return back()->with('unsuccess','Oops something wrong.');
        }

    }
    
    //Function to show my order detail page
    public function my_order_detail($id){
        //Get Order Detail
        $order_detail = Order::where('id', $id)->with('order_items','billing_address','customer_details')->first();

       // echo "<pre>"; print_r($order_detail); exit;
        return view('customer.my-order-detail',compact('order_detail'));
    }

    //Function to show refer to friends page
    public function refer_to_friends(){
        return view('customer.refer-to-friends');
    }

    //Function for submit refer to friends
    public function submit_invite_friend_to_refer(Request $request){
        //Get Request
        $email = $request->email;
        $currentDate = Carbon::now(); 
        $expire_date = $currentDate->addDays(5)->format('Y-m-d');
        $is_refer_code = Str::random(25);
        $url = url('/')."/redeem-center?=is_refer_code=".$is_refer_code;

        //Create Refer Code
        $is_insert = ReferCode::create([
            'user_id' => Auth::user()->id,
            'refer_code' => $is_refer_code,
            'expire_date' => $expire_date,
        ]);
        //Check if mail is sent or not
        if($is_insert){ 
            //Mail data
            $MailData = [
                'link' => $url,
            ];
            //Send Email 
            $send_email = Mail::to($email)->send(new InvitFriendReferEmail($MailData));
            //Check if mail is sent or not
            if($send_email){  
                echo '<p style="color:green;">Success! Email has been sent successfully.</p>';
                echo  '<script>
                        jQuery(document).ready(function($) {
                            setTimeout(function() {
                                window.location = ""; 
                            }, 3000); 
                        });
                    </script>'; 
            } else { 
                echo '<p style="color:red">Opps Something wrong with email. Please try Again.<p>'; 
            }
        } else {
            echo '<p style="color:red">Opps Something wrong with create code. Please try Again.<p>'; 
        }
    }

    //Function to show my gift cart page
    public function my_gift_card(){
        //Get Login user id
        $login_user_id = Auth::id();

        //Get Order Detail
        $my_coupon_list = VerifyCoupon::where('user_id', $login_user_id)->with('coupon_detail')->get()->ToArray();

        //echo "<pre>"; print_r($my_coupon_list); exit;
        return view('customer.my-gift-card',compact('my_coupon_list'));
    }

    //Function to show my order detail page
    public function redeem_gift_cards(){
        return view('customer.redeem-gift-card');
    }

    //Function to show my balance page
    public function my_balance(){
        // Get logged-in user
        $user = Auth::user();
        $login_user_id = $user->id;

        //Get oder detail with  use order id
        $my_points_logs = UserPointsLog::Where('user_id',$login_user_id)->with('points_log_list')->get()->groupBy('tab_type');  

        //echo "<pre>"; print_r($my_points_logs->ToArray()); exit;
        return view('customer.my-balance', compact('my_points_logs'));
    }

    //Function to show page
    public function submit_verify_coupon_code(Request $request){
        //Get Login user id
        $login_user_id = Auth::id();
        
        $coupon_code = $request->coupon_code;

        // Check if the coupon code exists and is valid
        $coupon_detail = CouponCodes::where('code', $coupon_code)->where('status', 'Active')->where('is_used', 'No')->first();

        // Check if the coupon exists
        if (!$coupon_detail) {
            echo '<p style="color:red;">Invalid or inactive coupon code.</p>';
            exit;
        }

        // Check if the coupon is expired
        if (Carbon::now()->greaterThan($coupon_detail->expire_date)) {
            echo '<p style="color:red;">Coupon code has expired.</p>';
            exit;
        }
        
        // Apply the discount (adjust according to your logic)
        $coupon_id = $coupon_detail->id; 
        $coupon_price = $coupon_detail->price;
        
        //Insert verify coupon cide
        $verify_coupon = VerifyCoupon::create(['user_id' => $login_user_id, 'coupon_id' => $coupon_id]);
        //chekck if added or not 
        if($verify_coupon){
            //Update Coupon Status
           CouponCodes::Where('id', $coupon_id)->update(['is_used'=>'Yes']);
           //Call helper to manage user points
           $tab_type = "apply_coupon";
           $new_points = $coupon_price;
           $point_type = 'Plus';
           $name = $coupon_code;
           Helper::manage_user_points($login_user_id,$tab_type,$new_points,$point_type,$name);

            echo '<p style="color:green;">Coupon code verified successfully.</p>';
            echo  '<script>
                    jQuery(document).ready(function($) {
                        setTimeout(function() {
                            window.location = ""; 
                        }, 3000); 
                    });
                </script>'; 
        } else {
            echo '<p style="color:red;">Oops something wrong!</p>';
        }
    }
}
