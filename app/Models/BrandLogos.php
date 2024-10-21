<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandLogos extends Model
{
    use HasFactory;
    protected $table = 'brand_logs';

    protected $fillable = ['name','main_logo','logo','type','is_home','status']; 
}
