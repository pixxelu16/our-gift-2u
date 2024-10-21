<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPointsLog extends Model
{
    
    use HasFactory;
    protected $table = 'user_point_logs';

    protected $fillable = ['user_id','tab_name','tab_type'];

    //Define the relationship with the PointsLogList model. An order has many points logs item.
    public function points_log_list(){
        return $this->hasMany(PointsLogList::class,'user_point_log_id');
    }
}
