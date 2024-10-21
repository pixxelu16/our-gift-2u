<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherSetting extends Model
{
    use HasFactory;
    protected $table = 'other_setting';
    protected $fillable = ['user_id','admin_fee','insurance_fee','tax'];
}
