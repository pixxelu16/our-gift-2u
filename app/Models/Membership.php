<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    protected $table = 'memberships';

    protected $fillable = ['name','monthly_spend','rewards_points','membership_cost_per_year','revenue','price','membership_type','is_home','status'];  
}
