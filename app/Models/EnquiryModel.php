<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnquiryModel extends Model
{
    protected $table = 'enquiry';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_id',
        'name',
        'email',
        'number',
        'location',
        'pincode',
        'quentity',
        'message',
    ];
}
