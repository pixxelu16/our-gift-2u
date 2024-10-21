<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchagedGiftCard extends Model
{
    use HasFactory;

    protected $table = 'purchaged_gift_cards';

    protected $fillable = ['company_id','gift_card_id','order_amount','payment_status','trasaction_id','payment_method_type','is_term_condition','sub_total','quintity','company_name'];

    //Define the relationship with the User model. An order belongs to a user.
    public function user_detail(){
         return $this->belongsTo(User::class, 'company_id');
    }

    //Define the relationship with the GiftCard model.
    public function gift_card_detail(){
        return $this->belongsTo(GiftCard::class, 'gift_card_id');
    }

    //Define the relationship with the CouponCodes model
    public function coupon_code_list(){
        return $this->hasMany(CouponCodes::class,'purchaged_gift_card_id');
    }
}
