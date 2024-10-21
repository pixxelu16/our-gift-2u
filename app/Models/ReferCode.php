<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferCode extends Model
{
    use HasFactory;

    protected $table = 'user_refer_codes';
    protected $fillable = ['user_id','refer_code','expire_date','status'];
}
