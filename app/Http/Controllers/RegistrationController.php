<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
    // Show the registration form
    public function create()
    {
        return view('registration.create');
    }

    // Store a new user
    public function store($language)
    {     
        // Validate the user
        $attributes = request()->validate([
            'name' => ['required', 'min:3', 'max:20', 'unique:users,name'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:7', 'max:255'],
        ]);

        // Create and save the user
        $user = User::create($attributes);

        // Sign the user in
        auth()->login($user);

        // Return to home page
        return redirect("/$language")->with('success', __('success.registered'));
    }
}
