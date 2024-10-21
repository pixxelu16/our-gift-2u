<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCatRelation;
use App\Models\CountryList;
use App\Models\UserAddress;
use App\Models\OtherSetting;
use App\Models\BrandLogos;
use Carbon\Carbon;

class ShopController extends Controller
{
    //Function for shop page
    public function shop(){
        //Get All Products
        $all_categories = ProductCategory::Where('status', 'Active')->get();
        $all_brands = BrandLogos::Where('type', 'Brand')->get();
        $logos = BrandLogos::Where('type', 'Logo')->get()->ToArray();
        $bottom_all_categories = ProductCategory::where('status', 'Active')->WhereNotIn('parent_category', [0])->inRandomOrder()->limit(12)->get();

        return view('shop', compact('all_categories','all_brands','logos','bottom_all_categories'));
    }

	//Function for shopdetails page
    public function shopdetails(Request $request, $slug){
        $product_detail = Product::Where('product_slug',$slug)->Where('status', 'Active')->with('product_category','product_image')->first();
       // echo "<pre>"; print_r($product_detail->ToArray()); exit;
        return view('shop-details', compact('product_detail'));
    }

    //Function for aussie rules rewards promotion welcome page
    public function aussie_rules_rewards_promotion(){
        $all_country_list = CountryList::WhereIn('name',['Australia','United States of America'])->get(); 
        return view('rewards-promotion', compact('all_country_list')); 
    }

    //Function for features page
    public function features(){
        return view('features');
    }

    //Function for cart page
    public function cart(){
        // Check if the user is authenticated
        if (!auth()->check()) {
            // If the user is not authenticated, redirect to the home page or login page
            $home_url = url('/');
            echo '<script> window.location = "' . $home_url . '";</script>';
            exit; // Make sure to exit after the redirect
        }

        //Check if Compnay is exist or not
        if(auth()->user()->user_type == "Company"){
            $home_url = url('/');
            echo '<script> window.location = "' . $home_url . '";</script>';
        } else {
            $other_setting = OtherSetting::first()->ToArray();

            return view('cart', compact('other_setting'));
        }
    }

    //Function for gift cart cart page
    public function gift_cart_cart(){
        // Check if the user is authenticated
        if (!auth()->check()) {
            // If the user is not authenticated, redirect to the home page or login page
            $home_url = url('/');
            echo '<script> window.location = "' . $home_url . '";</script>';
            exit; // Make sure to exit after the redirect
        }

        //Check if Compnay is exist or not
        if(auth()->user()->user_type == "Company"){
            $home_url = url('/');
            echo '<script> window.location = "' . $home_url . '";</script>';
        } else {
            $other_setting = OtherSetting::first()->ToArray();

            return view('gift-card-cart', compact('other_setting'));
        }
    }
    

    //Function for checkout page
    public function checkout(){
        // Check if the user is authenticated
        if (!auth()->check()) {
            // If the user is not authenticated, redirect to the home page or login page
            $home_url = url('/');
            echo '<script> window.location = "' . $home_url . '";</script>';
            exit; // Make sure to exit after the redirect
        }
        
        //Check if Compnay is exist or not
        if(auth()->user()->user_type == "Company"){
            $home_url = url('/');
            echo '<script> window.location = "' . $home_url . '";</script>';
        } else {
            //Get login user id
            $user_id = auth()->user()->id;
            $all_country_list = CountryList::WhereIn('name',['Australia','United States of America'])->get(); 
            $user_address_detail = UserAddress::Where('user_id',$user_id)->first(); 
            $other_setting = OtherSetting::first()->ToArray();

            return view('checkout', compact('all_country_list','user_address_detail','other_setting'));
        }
    }

    //Function for gift_card_checkout page
    public function gift_card_checkout(){
        // Check if the user is authenticated
        if (!auth()->check()) {
            // If the user is not authenticated, redirect to the home page or login page
            $home_url = url('/');
            echo '<script> window.location = "' . $home_url . '";</script>';
            exit; // Make sure to exit after the redirect
        }
        
        //Check if Compnay is exist or not
        if(auth()->user()->user_type == "Company"){
            $home_url = url('/');
            echo '<script> window.location = "' . $home_url . '";</script>';
        } else {
            //Get login user id
            $user_id = auth()->user()->id;
            $all_country_list = CountryList::WhereIn('name',['Australia','United States of America'])->get(); 
            $user_address_detail = UserAddress::Where('user_id',$user_id)->first(); 
            $other_setting = OtherSetting::first()->ToArray();

            return view('gift-card-checkout', compact('all_country_list','user_address_detail','other_setting'));
        }
    }

    // Function for searching top header products
    public function search_top_header_products(Request $request) {
        $top_header_keyword = $request->top_header_keyword;

        // Get products based on IDs and name keyword
        $products = Product::where('status', 'Active')
                    ->where('product_name', 'like', '%' . $top_header_keyword . '%')
                    ->get(['id', 'product_name','product_slug','image','product_price']) 
                    ->toArray();

        $product_count = count($products);
        //Check if product is exist or not
        if ($product_count >= 1) {
            echo '<p>' . $product_count . ' result' . ($product_count > 1 ? 's' : '') . ' found with "' .$top_header_keyword.'"</p>';
            echo '<ul>';
            foreach ($products as $key2 => $product_detail) {
                echo '<li>
                        <a href="'.url("product/".$product_detail["product_slug"]).'">
                        <div class="product-img-li">
                            <img src="'.url('public/uploads/products/',$product_detail["image"]).'" alt="'.$product_detail["image"].'">
                        </div>
                        <div class="product-text-li">
                            '.$product_detail["product_name"].'
                        </div>
                        <div class="product-ptice-li">$'.number_format($product_detail["product_price"], 2, '.', ',').'</div>
                        </a>
                    </li>';
            }
            echo '</ul>';
            //Check if product is more then 5
            if ($product_count > 5) {
                echo '<div class="view-all-products">
                        <a href="'.url('shop').'"><span>View all results</span></a>
                    </div>';
            }
        } else {
            echo '<p>No products found.</p>';
        }
    }

    //search products
    public function search_products(Request $request){
        $product_cat = $request->query('product_cat');
        $main_cat_slug = $request->query('main_cat');
        $stock = $request->query('stock');
        $product_visibility = $request->query('product_visibility');
        $product_type = $request->query('product_type');
        $orderby = $request->query('orderby');

        $minPrice = $request->query('min_price'); 
        $maxPrice = $request->query('max_price'); 
    
        $all_categories = ProductCategory::where('status', 'Active')->get();
        $all_products = Product::query()->where('status', 'Active');

        if ($product_cat) {
            $category_id = ProductCategory::where('status', 'Active')->where('slug', $product_cat)->pluck('id');
            $product_ids = ProductCatRelation::whereIn('category_id', $category_id)->pluck('product_id');
            $all_products = $all_products->whereIn('id', $product_ids);
        }

        if ($stock) {
            $all_products = $all_products->where('product_quantity', '>', 0);
        }

        if ($product_visibility) {
            $all_products = $all_products->where('is_featured', 'yes');
        }
        // filter by product type
        if ($product_type) {
            if ($product_type == 'featured_product') {
                $all_products = $all_products->where('is_featured', 'yes');
            } elseif ($product_type == 'random') {
                $all_products = $all_products->inRandomOrder();
            } elseif ($product_type == 'recent_product') {
                $all_products = $all_products->orderBy('created_at', 'desc');
            }
        }

        //filter by orderBy
        if ($minPrice && $maxPrice) {
            $all_products = $all_products
            ->where('product_price', '>=', $minPrice)
            ->where('product_price', '<=', $maxPrice);
        }

        //filter by slider
        if ($orderby) {
            if ($orderby == 'date') {
                $all_products = $all_products->orderBy('created_at', 'desc');
            } elseif ($orderby == 'price') {
                $all_products = $all_products->orderBy('product_price', 'asc');
            } elseif ($orderby == 'price-desc') {
                $all_products = $all_products->orderBy('product_price', 'desc');
            }
        }

        $all_products = $all_products->with('wishlist_product')->paginate(20)->withQueryString();
        // Get product ids by category id
        //echo "<pre>"; print_r($all_products->toArray());exit;
        // Paginate results
        return view('search-shop', compact('all_products','all_categories','main_cat_slug','product_cat'));
    }
}
