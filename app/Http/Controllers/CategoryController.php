<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($language) {
        $categories = Category::all();
        return view('categories.index', [
            'language' => $language,
            'categories' => $categories
        ]);
    }

    public function show(string $language, Category $category) {
        $posts = $category->posts()->get();
        return view('categories.show', [
            'language' => $language,
            'category' => $category,
            'posts' => $posts
        ]);
    }
}
