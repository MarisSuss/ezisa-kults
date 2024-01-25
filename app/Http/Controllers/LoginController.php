<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create()
    {
        return view('login.create');
    }

    public function authenticate(Request $request, $language)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:rfc,dns'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect("/$language")->with('success', __('success.logged_in'));
        }

        return back()
        ->withErrors([
            'email' => __('auth.failed'),
        ])->withInput();
    }
}
