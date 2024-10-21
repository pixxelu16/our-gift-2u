<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyCoupon extends Model
{
    use HasFactory;
    protected $table = 'customer_verify_coupon_codes';

    protected $fillable = ['user_id','coupon_id'];
}
