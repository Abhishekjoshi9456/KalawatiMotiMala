<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImageModel extends Model
{
    protected $primaryKey = 'product_id';
    protected $table = 'product_image';
    protected $fillable = [
        'ref_id',
        'product_img',
        'status',
        'created_at',
        'updated_at'
    ];
}
