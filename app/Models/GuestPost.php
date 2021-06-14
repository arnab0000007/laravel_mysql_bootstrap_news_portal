<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestPost extends Model
{
    use HasFactory;
    protected $fillable = ['post_image'];
}
