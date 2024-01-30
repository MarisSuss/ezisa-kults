<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $fillable = [
        'title_lv',
        'title_en',
        'slug',
        'is_pinned',
    ];  

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
