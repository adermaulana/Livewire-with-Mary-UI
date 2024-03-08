<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
    ];

    public function scopeSearch($query,$value){
        $query->where('title','like',"%$value%")->orWhere('body','like',"%$value%");
    }
}
