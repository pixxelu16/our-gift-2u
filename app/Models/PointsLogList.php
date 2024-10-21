<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointsLogList extends Model
{
    use HasFactory;
    protected $table = 'user_point_logs_list';

    protected $fillable = ['user_point_log_id','name','description','points','point_type'];
}
