<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['menu_status'];

    public function post(){
        return $this->belongsTo('App\Models\Post');
    }
}
