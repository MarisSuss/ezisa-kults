<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Show the registration form
    public function create()
    {
        return view('user.create');
    }

    // Store a new user
    public function store()
    {
        // Validate the user
        $attributes = request()->validate([
            'name' => ['required', 'min:3', 'max:255', 'unique:users,name'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:7', 'max:255'],
        ]);

        // Create and save the user
        $user = User::create($attributes);



        // Return to home page
        return redirect('/')->with('success', 'Your account has been created!');
    }
}
