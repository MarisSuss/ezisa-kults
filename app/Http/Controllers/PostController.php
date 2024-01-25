<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // validate the form
        $attributes = request()->validate([
            'name' => ['required', 'min:1', 'max:50'],
            'title_lv' => ['required', 'min:1', 'max:50'],
            'title_en' => ['min:1', 'max:50'],
        ]);

        // create slug from name
        $slug = strtolower(str_replace(' ', '-', $attributes['name']));

        // check if slug exists in the database
        $existingSlug = Post::where('slug', $slug)->exists();

        if ($existingSlug) {
            return redirect()->back()->withInput()->withErrors(['name' => 'The name has already been taken.']);
        }

        // add attributes to the array
        $attributes['content_lv'] = request('content_lv');
        $attributes['content_en'] = request('content_en');
        $attributes['date'] = date('Y-m-d');
        $attributes['slug'] = $slug;
        $attributes['user_id'] = auth()->id();

        // create a new post
        Post::create($attributes);

        return redirect('/')->with('success', 'Post created successfully!');
    }
}