<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    protected $id = '	blog_id ';
    protected $table = 'blog';
    protected $fillable = [
        'meta_title',
        'slug',
        'meta_keyword',
        'meta_description',
        'page_description',
        'blog_photo',
        'user_id',
        'status',
        'active_status',
        'created_at',
        'updated_at'
    ];
}
