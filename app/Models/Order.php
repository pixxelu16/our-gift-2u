<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['user_id','coupon_code','order_amount','status','payment_status','trasaction_id','shipping_type','shipping_amount','payment_method_type','is_order_type','is_term_condition','point_price','shiping_charges','insurance_fee','admin_fee','total_tax','sub_total'];  

    //Define the relationship with the User model. An order belongs to a user.
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //Define the relationship with the OrderItems model. An order has many order items.
    public function order_items()
    {
        return $this->hasMany(OrderItems::class,'order_id');
    }

   //Define the relationship with the Billing Address model. belongs to a billing address.
    public function billing_address()
    {
        return $this->belongsTo(BillingAddress::class,'id','order_id');
    }

    //Function for order customer detail
    public function customer_details(){
        return $this->hasOne(User::class,'id','user_id');
    }

    //Function for customer address detail
    public function customer_addresses_details(){
        return $this->belongsTo(UserAddress::class,'user_id','user_id');
    }
}
