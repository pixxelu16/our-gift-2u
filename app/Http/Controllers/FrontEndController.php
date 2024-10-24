<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Product;
use App\Models\Membership;
use App\Models\BrandLogos;
use App\Models\ProductCategory;
use App\Models\CountryList;
use App\Models\Pagesetting;
use Carbon\Carbon;
use App\Helpers\Helper;

class FrontEndController extends Controller
{
    //function for home page
    public function home(){
        $home_products = Product::Where('is_home', 'Yes')->get()->ToArray();
        $home_memberships = Membership::Where('is_home', 'Yes')->get()->ToArray();
        $home_brands = BrandLogos::Where('type', 'Brand')->Where('is_home', 'Yes')->get()->ToArray();
        $home_logos = BrandLogos::Where('type', 'Logo')->Where('is_home', 'Yes')->get()->ToArray();
        $top_all_categories = ProductCategory::where('status', 'Active')->WhereNotIn('parent_category', [0])->inRandomOrder()->limit(12)->get();
        $middle_all_categories = ProductCategory::where('status', 'Active')->WhereNotIn('parent_category', [0])->inRandomOrder()->limit(12)->get();
        $bottom_all_categories = ProductCategory::where('status', 'Active')->WhereNotIn('parent_category', [0])->inRandomOrder()->limit(12)->get();
        $banner_one_products = Product::Where('is_banner_one', 'Yes')->get()->ToArray();
        $banner_two_products = Product::Where('is_banner_two', 'Yes')->get()->ToArray();
        
        return view('home-page', compact('home_products','home_memberships','home_brands','home_logos','top_all_categories','middle_all_categories','bottom_all_categories','banner_one_products','banner_two_products'));
    }

    //function for membership page
    public function membership(){
        return view('membership');
    }
    //function for membership page
    public function select_membership(){
        return view('select-your-membership');
    }
    //function for redeem center page
    public function redeem_center(){
        $home_logos = BrandLogos::Where('type', 'Logo')->Where('is_home', 'Yes')->get()->ToArray();

        $all_country_list = CountryList::WhereIn('name',['Australia','United States of America'])->get(); 
        return view('redeem-center',compact('all_country_list','home_logos'));
    }
    //function for business register page
    public function business_register(){
        $logos = BrandLogos::Where('type', 'Logo')->get()->ToArray();
        $all_country_list = CountryList::WhereIn('name',['Australia','United States of America'])->get(); 
        return view('business-register',compact('all_country_list','logos'));
    }

    //Function for earn more points page
    public function how_to_earn_more_points(){
        return view('how-to-earn-more-points');
    }

    //Function for the watchdog report page
    public function about_us(){
        $all_members = Team::orderBy('id', 'DESC')->get(); 
        $logos = BrandLogos::Where('type', 'Logo')->get()->ToArray();
        return view('about-us',compact('all_members','logos'));
    }

    //Function for careers opportunities page
    public function careers_opportunities(){
        return view('careers-opportunities');
    }
    
    //Function for faqs page
    public function faqs(){
        return view('faqs');
    }

    //Function for privacy policy page
    public function privacy_policy(){
        $privacy_and_policy_pdf = Pagesetting::where('pdf_type','privacy_and_policy')->first();
        return view('privacy-policy',compact('privacy_and_policy_pdf'));
    }

    //Function for terms and conditions page
    public function terms_and_conditions(){
        $terms_and_condition_pdf = Pagesetting::where('pdf_type','terms_and_condition')->first();
        //print_r($terms_and_condition_pdf->toArray());exit;
        return view('terms-and-conditions',compact('terms_and_condition_pdf'));
    }

    //Function for cookies page
    public function cookies(){
        $cookies_pdf = Pagesetting::where('pdf_type','cookies')->first();
        //print_r($terms_and_condition_pdf->toArray());exit;
        return view('cookies',compact('cookies_pdf'));
    }

    //Function for whistleblower policy page
    public function whistleblower_policy(){
        return view('whistleblower-policy');
    }

    //Function for vulnerability disclosure program page
    public function vulnerability_disclosure_program(){
        return view('vulnerability-disclosure-program');
    }

    //Function for the watchdog report page
    public function the_watchdog_report(){
        return view('the-watchdog-report');
    }

    //Function for the team  page
    public function view_team_members(){
        $all_member = Team::orderBy('id', 'DESC')->get(); 
        return view('team', compact('all_member'));
    }

    //Function for foundation page
    public function foundation_page(){
        $top_logos = BrandLogos::Where('type', 'Logo')->inRandomOrder()->get()->ToArray();
        $bottom_logos = BrandLogos::Where('type', 'Logo')->inRandomOrder()->get()->ToArray();

        return view('foundation', compact('top_logos','bottom_logos'));
    }

    //Function for corporate-business page
    public function corporate_business(){
        $all_categories = ProductCategory::where('status', 'Active')->WhereNotIn('parent_category', [0])->inRandomOrder()->limit(12)->get();
        $top_logos = BrandLogos::Where('type', 'Logo')->inRandomOrder()->get()->ToArray();
        $bottom_logos = BrandLogos::Where('type', 'Logo')->inRandomOrder()->get()->ToArray();
        
        return view('corporate-business',compact('all_categories','top_logos','bottom_logos'));
    }

    //Function for gift cards page
    public function gift_cards(){
        //Call Redirection Url
        Helper::redirect_check_login_user();

        $all_categories = ProductCategory::where('status', 'Active')->WhereNotIn('parent_category', [0])->inRandomOrder()->limit(12)->get();
        $all_logos = BrandLogos::Where('type', 'Logo')->inRandomOrder()->get()->ToArray();
        $card_category_product_list = ProductCategory::where('status', 'Active')->where('category_type','Card')->with('category_products')->get()->ToArray();
        //echo "<pre>"; print_r($card_category_product_list); exit;

        return view('gift-cards', compact('all_categories','all_logos','card_category_product_list'));
    }

    //Function for all brands page
    public function all_brands(){
        //Call Redirection Url
        Helper::redirect_check_login_user();
        
        $all_brands = BrandLogos::Where('type', 'Brand')->inRandomOrder()->get()->ToArray();
        return view('all-brands', compact('all_brands')); 
    }

    //Function for help center page
    public function help_center(){
        return view('help-center');
    }
}