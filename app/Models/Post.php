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

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query
                ->where('title_lv', 'like', '%' . $search . '%')
                ->orWhere('title_en', 'like', '%' . $search . '%')
                ->orWhere('content_lv', 'like', '%' . $search . '%')
                ->orWhere('content_en', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn ($query) =>
                $query->where('slug', $category)
            )
        );
    }
}
