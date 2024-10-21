<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;
    protected $table = 'user_addresses';

    protected $fillable = ['user_id','billing_name','billing_contact','billing_email','billing_street_address','billing_city','billing_state','billing_post_code','billing_country','shipping_method','shipping_name','shipping_contact','shipping_email','shipping_street_address','shipping_city','shipping_state','shipping_post_code','shipping_country','form_status'];
}
