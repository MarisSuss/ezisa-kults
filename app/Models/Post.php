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
        'image',
        'likes',
        'category_id',
        'is_pinned',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
