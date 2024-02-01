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
        $posts = $category->posts()->get()->sortByDesc('id')->load('author');

        return view('categories.show', [
            'language' => $language,
            'posts' => $posts,
            'category' => $category
        ]);
    }

    public function create($language) {
        return view('categories.create', [
            'language' => $language
        ]);
    }

    public function store($language) {

        $attributes = request()->validate([
            'title_lv' => ['required', 'max:20', 'min:1'],
            'title_en' => ['required', 'max:20', 'min:1'],
        ]);

        $slug = strtolower(preg_replace('/[^a-z]/', '', $attributes['title_en']));

        $existingSlug = Category::where('slug', $slug)->exists();

        if ($existingSlug) {
            return redirect()->back()->withInput()->withErrors(['title_en' => 'The title has already been taken.']);
        }

        if ($slug == 'create') {
            return redirect(url($language . '/categories/create'))->with('error', 'Category name cannot be "create"');
        }

        Category::create([
            'title_lv' => $attributes['title_lv'],
            'title_en' => $attributes['title_en'],
            'slug' => $slug
        ]);

        return redirect(url($language . '/categories'));
    }
}
