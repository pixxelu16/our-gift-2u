<?php //app\Helpers\Helper.php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\Product;
use App\Models\Order;
use App\Models\ProductCategory;
use App\Models\ProductCatRelation;
use App\Models\User;
use App\Models\UserPointsLog;
use App\Models\PointsLogList;
use App\Models\Wishlist;
use Carbon\Carbon;
use Session;

class Helper
{
    // Function to Generate Unique Product SKU Number
    public static function generated_product_sku_number() { 
        // Generate a unique SKU using uniqid
        $random_sku_number = uniqid();

        // Check if the SKU already exists
        $is_product_sku_exist = Product::Where('product_sku', $random_sku_number)->exists();
        // If the SKU exists, regenerate it
        while($is_product_sku_exist) {
            $random_sku_number = uniqid();
            $is_product_sku_exist = Product::Where('product_sku', $random_sku_number)->exists();
        }

        // Return or echo the unique SKU number
        echo $random_sku_number;
    }
    
    //Function For check order capacity
    public static function is_order_capacity($product_id) { 
        //Get Login user id
        $userId = Auth::id();
        //get Product detail
        $product_detail = Product::Where('id',$product_id)->Where('status', 'Active')->first();
        //Check if product is exist or not
        if($product_detail){
            // Get the current date
           /* $currentDate = Carbon::now();
            // Get the start of the week (Monday)
            $start_week_date = $currentDate->startOfWeek()->toDateString();
            // Get the end of the week (Sunday)
            $end_week_date = $currentDate->endOfWeek()->toDateString();
            //Get Last week Order count is 4 or not
            $is_last_week_simple_order_count = Order::where('is_order_type', 'simple_order')->whereBetween('created_at', [$start_week_date, $end_week_date])->count();
            $is_last_week_pre_order_count = Order::where('is_order_type', 'pre_order')->whereBetween('created_at', [$start_week_date, $end_week_date])->count();*/

            //Check if simple order capacity is full
            if($product_detail->product_quantity >= 1){
                echo '<div class="button-2">
                           <button class="buy_now" data-product_id="'.$product_detail->id.'">Buy Now</button>
                        </div>';
            } elseif($product_detail->pre_order_capacity >= 1){
                echo '<div class="button-1">
                           <button class="pre_order_now" data-product_id="'.$product_detail->id.'">Pre-order Now</button>
                        </div>';
            } else {
                echo '<div class="button-1">
                           <button class="out-of-stock">Out Of Stock</button>
                        </div>';
            }
        }
    }

    // Function to get header main Category list
    public static function header_main_category_list() {
        // Get all categories
        $all_categories = ProductCategory::where('status', 'Active')->Where('parent_category', '0')->Where('category_type','Normal')->get();

        // Check if categories exist
        if ($all_categories->count() >= 1) {
            foreach($all_categories as $category) {
               echo '<li class="nav-item"><a class="nav-link" href="'.url("category")."/".$category->slug.'">'.$category->name.'</a></li>';
            }
            echo '<li class="nav-item"><a class="nav-link" href="'.url("gift-cards").'">Gift Cards</a></li>';
        }
    }

    // Function to get top header category dropdown list
    public static function top_header_category_dropdown_list() {
        // Get all categories
        $all_categories = ProductCategory::where('status', 'Active')->Where('category_type','Normal')->get();


        // Check if categories exist
        if ($all_categories->count() >= 1) {
            foreach ($all_categories as $category) {
                // Check for main categories (parent_category = 0)
                if ($category->parent_category == 0) {
                    $subcategories = $all_categories->where('parent_category', $category->id);
                    echo '<div class="mega-menu-box">';
                    echo '<a class="main_category dropdown-item" href="'.url("category")."/".$category->slug.'">'.$category->name.'</a>';
                
                    // If subcategories exist, display them under the main category
                    if ($subcategories->isNotEmpty()) {
                        foreach ($subcategories as $subcategory) {
                            //Category Product Count
                            $sub_cat_products_count = ProductCatRelation::Where('category_id', $subcategory->id)->count();
                            echo '<a class="sub_category dropdown-item" href="'.url("category")."/".$subcategory->slug.'">&nbsp;&nbsp;&nbsp;&nbsp;'.$subcategory->name . " (".$sub_cat_products_count.") ".'</a>';
                        }
                    }
                    echo '</div>';
                }
            }
        }
    }

    //Funtion to increase view single product page
    public static function increase_product_view_page($product_id){
        //Get product details
        $product_detail = Product::Select('id','view_count')->where('id', $product_id)->first();
        //Check product is exist
        if($product_detail){
            $old_view_count = $product_detail->view_count;
            $new_view_count = $old_view_count+1;

            //Update product
            Product::where('id', $product_id)->update(['view_count' => $new_view_count]);
        }
    }

    //function to count wishlist products
    public static function count_wishlist_products(){
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the currently authenticated user's ID
            $login_user_id = Auth::id(); // More concise way to get the user's ID

            // Count wishlist items for the logged-in user
            $wishlist_count =  Wishlist::where('user_id', $login_user_id)->count();

            //Check if whishlist count is exit
            if($wishlist_count >= 1){
                echo '<span>'.$wishlist_count.'</span>';
            }
        }
    }

    // Function to get single category page all category dropdown list
    public static function single_category_dropdown_list() {
        // Get all categories
        $all_categories = ProductCategory::where('status', 'Active')->Where('category_type','Normal')->get();

        // Check if categories exist
        if ($all_categories->count() >= 1) {
            foreach ($all_categories as $category) {
                //Category Product Count
                $category_products_count = ProductCatRelation::Where('category_id', $category->id)->count();
                // Check for main categories (parent_category = 0)
                if ($category->parent_category == 0) {
                    $subcategories = $all_categories->where('parent_category', $category->id);
                    echo '<li class="menu-item"><a class="main_category dropdown-item" href="'.url("category")."/".$category->slug.'">'.$category->name.'<i class="fa fa-angle-down" aria-hidden="true"></i></a>';
                
                    // If subcategories exist, display them under the main category
                    if ($subcategories->isNotEmpty()) {
                        echo '<ul class="submenu">';
                        foreach ($subcategories as $subcategory) {
                            echo '<li><a class="sub_category dropdown-item" href="'.url("category")."/".$subcategory->slug.'">&nbsp;&nbsp;&nbsp;&nbsp;'.$subcategory->name.'</a></li>';
                        }
                        echo '</ul>';
                    }
                    echo '</li>';
                }
            }
        }
    }
    
    // Function to get mini cart
    public static function mini_cart() {
        // Check if gift_card_cart and cart exist
        if(count(session('gift_card_cart', [])) >= 1 || count(session('cart', []))) {
            $total_cart_count = count(session('gift_card_cart', [])) + count(session('cart', []));

            echo '<div class="mini-cart-box">
                    <div class="cart-image">
                        <img src="'. url('public/images/mini-cart-icon.png') .'">
                        <span>' . $total_cart_count . '</span>
                    </div>';

            // If there are items in the regular cart
            if(count(session('cart', [])) >= 1) {
                echo '<a href="' . url('cart') . '" class="go-to-card">Go to Cart</a>';
                echo '<a href="' . url('checkout') . '" class="meni-check">Checkout</a>';
            }

            // If there are gift cards in the cart
            if(count(session('gift_card_cart', [])) >= 1) {
                echo '<a href="' . url('gift-card-cart') . '" class="go-to-card">Go to Cart</a>';
                echo '<a href="' . url('gift-card-checkout') . '" class="meni-check">Checkout</a>';
            }
            echo '</div>';
        }
    }

    // Function to check the current login user and redirect based on conditions
    public static function redirect_check_login_user(){
        // Check if the user is logged in
        if (Auth::check()) {
            // Get the logged-in user
            $user = auth()->user();

            // Check the user type and is_user_payble flag
            if ($user->user_type == "Company" && $user->is_user_payble == "No") {
                $url = url('company/my-account');
                echo '<script> window.location.href = "' . $url . '"; </script>';   
            } elseif ($user->user_type == "Company" && $user->is_user_payble == "Yes") {
                $url = url('company/my-account');
                echo '<script> window.location.href = "' . $url . '"; </script>';   
            } 
        } else {
            $url = url('login');
            echo '<script> window.location.href = "' . $url . '"; </script>';  
        }
    }

    //Funtion to manage user points
    public static function manage_user_points($user_id,$tab_type,$new_points,$point_type,$name){
        //Get user details
        $user_detail = User::Select('id','total_points')->where('id', $user_id)->first();
        //Check if use if exits or not
        if($user_detail){
            $old_total_points = $user_detail->total_points;
            //Check if point_type is plus or minus
            if($point_type == "Plus"){
                $new_total_points = $old_total_points+$new_points;
            } else {
                $new_total_points = $old_total_points-$new_points;
            }

            //Check if tab_type
            if($tab_type == "apply_coupon"){
                //Update User points
                User::Where('id', $user_id)->Update(['total_points' => $new_total_points]);
                //Create logs
                $user_log = UserPointsLog::create([
                    'user_id' => $user_id,
                    'tab_name' => "Gift Voucher",
                    'tab_type' => "apply_coupon",
                ]);

                //Create logs List
                PointsLogList::create([
                    'user_point_log_id' => $user_log->id,
                    'name' => $name ?? "Redeem Coupon",
                    'description' => "Gift Voucher Logs",
                    'point_type' => $point_type,
                    'points' => $new_points,
                ]);
            } else if($tab_type == "manual_invoice"){
                //Update User points
                User::Where('id', $user_id)->Update(['total_points' => $new_total_points]); 

                //Create logs
                $user_log = UserPointsLog::create([
                    'user_id' => $user_id,
                    'tab_name' => "Upload Invoice Reward",
                    'tab_type' => "normal_upload_invoice",
                ]);

                //Create logs List
                PointsLogList::create([
                    'user_point_log_id' => $user_log->id,
                    'name' => $name ?? "Upload Invoice Reward",
                    'description' => $name ?? "Upload Invoice Reward",
                    'point_type' => $point_type,
                    'points' => $new_points,
                ]);
            } else if($tab_type == "order_spend_points"){
                //Create logs
                $user_log = UserPointsLog::create([
                    'user_id' => $user_id,
                    'tab_name' => "Per Order Spend Points",
                    'tab_type' => "order_spend_points",
                ]);

                //Create logs List again
                PointsLogList::create([
                    'user_point_log_id' => $user_log->id,
                    'name' => $name,
                    'description' => $name,
                    'point_type' => $point_type,
                    'points' => $new_points,
                ]); 
            } else if($tab_type == "order_rewards"){
                //Update User points
                User::Where('id', $user_id)->Update(['total_points' => $new_total_points]); 

                //Create logs
                $user_log = UserPointsLog::create([
                    'user_id' => $user_id,
                    'tab_name' => "Order Reward Points",
                    'tab_type' => "order_rewards",
                ]);

                //Create logs List
                PointsLogList::create([
                    'user_point_log_id' => $user_log->id,
                    'name' => $name,
                    'description' => $name,
                    'point_type' => $point_type,
                    'points' => $new_points,
                ]); 
            }
        }
    }
}