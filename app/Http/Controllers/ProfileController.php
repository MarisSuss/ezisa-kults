<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function myProfile($language)
    {
        $posts = auth()->user()->posts->sortByDesc('id')->load('category');
        
        return view('profile.user', [
            'posts' => $posts,
            'language' => $language,
        ]);
    }

    public function show($language, User $user)
    {
        $posts = $user->posts->sortByDesc('id')->load('category', 'author');

        return view('profile.show', [
            'user' => $user,
            'posts' => $posts,
            'language' => $language,
        ]);
    }
}