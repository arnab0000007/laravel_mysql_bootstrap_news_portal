<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_title',
        'author_name',
        'category_id',
        'post_description',
        'post_image',
    ];

    function relationCategory()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
}
