<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'products';

    protected $fillable = ['product_name','product_slug','description','short_description','product_sku','factory_id','barcode_number','meta_title','meta_description','product_price','product_quantity',
    'pre_order_capacity','min_order_capacity','image','status','view_count','technical_details','product_cost','manufacturer_email','shipping_price','is_home','is_banner_one','is_banner_two'];  

    //Function for product category
    public function product_category(){
        return $this->hasMany(ProductCatRelation::class,'product_id')->with('category_detail'); 
    }

    //Function for product images
    public function product_image(){
        return $this->hasMany(ProductImage::class,'product_id');
    }

    //Function for get wishlist product
    public function wishlist_product(){
        return $this->hasMany(Wishlist::class,'product_id');
    }
}
