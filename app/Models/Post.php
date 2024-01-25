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
        'content_lv',
        'content_en',
        'date',
        'user_id',
        'slug',
    ];
}
