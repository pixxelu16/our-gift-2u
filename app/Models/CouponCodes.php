<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponCodes extends Model
{
    use HasFactory;
    protected $table = 'coupon_codes';

    protected $fillable = ['code', 'coupon_type', 'status', 'expire_date','price','is_used','company_id','purchaged_gift_card_id']; 
}
