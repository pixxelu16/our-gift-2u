<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagesetting extends Model
{
    use HasFactory;
    Protected $table= 'pagesettings';
    Protected $fillable= ['pdf','pdf_type'];
}
