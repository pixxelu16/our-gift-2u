<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCatRelation extends Model
{
    use HasFactory;
    
    protected $table = 'product_cat_relations';

    protected $fillable = ['product_id','category_id'];

    //Function for category Details
    public function category_detail(){
        return $this->belongsTo(ProductCategory::class,'category_id');
    }

    //Function for product detail
    public function product_detail(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
