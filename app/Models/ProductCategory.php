<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    
    protected $table = 'product_categories';

    protected $fillable = ['name','slug','description','short_description','meta_title','meta_description','image','parent_category','status','category_type'];

    //Function for call sub category list
    public function sub_category_list()
    {
        return $this->hasMany(ProductCategory::class, 'parent_category');
    }

    //Function for call category product list
    public function category_products()
    {
        return $this->hasMany(ProductCatRelation::class, 'category_id')->with('product_detail');
    }

}
