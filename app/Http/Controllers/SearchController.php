<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class SearchController extends Controller
{
    public function __invoke()
    {
        return view('search.index', [
            'posts' => Post::latest()->filter([
                'search' => request('search'),
                'category' => request('category'),
                'currentCategory' => Category::firstWhere('slug', request('category'))
            ])->get(),
            'search' => request('search')
        ]);
    }
}
