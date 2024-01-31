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
        return view('posts.create', [
            'language' => $language,
            'categories' => Category::all(),
        ]);
    }

    public function store($language)
    {
        // validate the form
        $attributes = request()->validate([
            'title_lv' => ['required', 'min:1', 'max:50'],
            'title_en' => ['required', 'min:1', 'max:50'],
            'content_lv' => ['required'],
            'content_en' => ['required'],
            'category_name_lv' => ['required', 'min:1', 'max:20'],
            'category_name_en' => ['required', 'min:1', 'max:20']
        ]);

        // create slug from name
        $slug = strtolower(str_replace(' ', '-', $attributes['title_en']));

        if ($slug === 'create') {
            return redirect()->back()->withInput()->withErrors(['title_en' => 'The title has already been taken.']);
        }

        // check if slug exists in the database
        $existingSlug = Post::where('slug', $slug)->exists();

        if ($existingSlug) {
            return redirect()->back()->withInput()->withErrors(['title_en' => 'The title has already been taken.']);
        }

        // add attributes to the array
        $attributes['content_lv'] = request('content_lv');
        $attributes['content_en'] = request('content_en');
        $attributes['date'] = date('Y-m-d');
        $attributes['slug'] = $slug;
        $attributes['user_id'] = auth()->id();

        // make a category slug
        $categorySlug = strtolower(str_replace(' ', '-', request('category_name_en')));

        // check if category slug exists in the database
        $existingCategorySlug = Category::where('slug', $categorySlug)->exists();

        // if category slug exists add id to the array
        if ($existingCategorySlug) {
            $attributes['category_id'] = Category::where('slug', $categorySlug)->first()->id;
        } else {

            // if category slug doesn't exist create a new category
            $category = Category::create([
                'title_lv' => request('category_name_lv'),
                'title_en' => request('category_name_en'),
                'slug' => $categorySlug,
            ]);

            // add category id to the array
            $attributes['category_id'] = $category->id;
        }


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