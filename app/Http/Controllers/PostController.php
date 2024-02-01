<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function create($language)
    {
        if ($language == 'lv') {
            $categories = Category::all()->sortBy('title_lv');
        } else if ($language == 'en') {
            $categories = Category::all()->sortBy('title_en');
        }

        return view('posts.create', [
            'language' => $language,
            'categories' => $categories,
        ]);
    }

    public function store($language)
    {
        // validate the form
        $attributes = request()->validate([
            'title_lv' => ['required', 'min:1', 'max:50'],
            'title_en' => ['required', 'min:1', 'max:50'],
            'content_lv' => ['required'],
            'content_en' => ['required']
        ]);

        // create slug from title in english
        $slug = strtolower(preg_replace('/[^a-z0-9]/', '', str_replace(' ', '-', $attributes['title_en'])));

        if ($slug === 'create') {
            return redirect()->back()->withInput()->withErrors(['title_en' => 'The title has already been taken.']);
        } else if ($slug === 'edit') {
            return redirect()->back()->withInput()->withErrors(['title_en' => 'The title has already been taken.']);
        } else if ($slug === '') {
            return redirect()->back()->withInput()->withErrors(['title_en' => 'The title has already been taken.']);
        }

        // check if slug exists in the database
        $existingSlug = Post::where('slug', $slug)->exists();
        if ($existingSlug) {
            return redirect()->back()->withInput()->withErrors(['title_en' => 'The title has already been taken.']);
        }

        $category = Category::where('slug', request('category_slug'))->firstOrFail();

        // add attributes to the array
        $attributes['date'] = date('Y-m-d');
        $attributes['slug'] = $slug;
        $attributes['user_id'] = auth()->id();
        $attributes['category_id'] = $category->id;

        // create a new post
        Post::create($attributes);

        return redirect('/' . $language)->with('success', __('success.post_created'));
    }

    public function show($language, Post $post)
    {     
        return view('posts.show',[
                'post' => $post,
                'language' => $language,
        ]);
    }
}