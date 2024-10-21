<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{
    use HasFactory;
    protected $table = 'order_billing_address';
    protected $fillable = ['order_id','name','contact_number','email','address','street_address','city','state','country','pincode','shipping_method','shipping_name','shipping_contact_number','shipping_email','shipping_address','shipping_street_address','shipping_city','shipping_state','shipping_pincode','shipping_country','is_order_note','order_note_desc'];
}
