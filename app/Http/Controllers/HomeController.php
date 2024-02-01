<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function __invoke($language)
    {
        return view('home', [
            'language' => $language
        ]);
    }
}
