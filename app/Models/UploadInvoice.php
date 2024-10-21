<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadInvoice extends Model
{
    use HasFactory;
    protected $table = 'user_upload_invoices';

    protected $fillable = ['user_id','store_name','invoice_date','invoice_total','invoice_number','invoice_phone','invoice_type','invoice_original_image','invoice_edited_image','status'];
}
