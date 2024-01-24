<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $fillable = [
        'title_lv',
        'title_en',
        'body_en',
        'body_lv',
        'date',
        'user_id',
        'slug',
    ];
}
