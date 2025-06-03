<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $primaryKey = 'product_id  ';
    protected $table = 'products';
    protected $fillable = [
        'product_title',
        'slug',
        'product_category',
        'pro_short_des',
        'pro_description',
        'pro_image',
        'pro_video',
        'meta_keyword',
        'meta_description',
        'meta_image',
        'product_price',
        'product_size',
        'modal_id',
        'del_action',
        'status',
        'created_at',
        'updated_at'
    ];
}
