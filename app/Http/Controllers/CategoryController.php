<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProductCategory;
use App\Models\BrandLogos;

class CategoryController extends Controller
{
    //Function for Show single category detail page
    public function single_category_detail($slug){
        $category_product_list = ProductCategory::where('status', 'Active')->Where('category_type','Normal')->with('category_products')->Where('slug', $slug)->first()->ToArray();
        $home_logos = BrandLogos::Where('type', 'Logo')->Where('is_home', 'Yes')->get()->ToArray();
        $bottom_all_categories = ProductCategory::where('status', 'Active')->WhereNotIn('parent_category', [0])->inRandomOrder()->limit(12)->get();

        //echo "<pre>"; print_r($category_product_list); exit;

        return view('category-detail', compact('category_product_list','home_logos','bottom_all_categories')); 
    }
}
