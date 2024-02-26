<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('search.index', [
            'posts' => Post::filter([
                'search' => $request->search,
            ])->get(),
            'search' => $request->search,
        ]);
    }
}
