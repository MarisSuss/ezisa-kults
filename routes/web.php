<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

// Redirect to the default language
Route::get('/', function () {
    return redirect('/{language}');
})->name('home');

// Change the language
Route::post('/{language}/change-language', LanguageController::class);

// Group all routes and give them a prefix of the first segment as $language
Route::group(['prefix' => '{language}'], function () {

    // Home page
    Route::get('/', HomeController::class);

    // Registration
    Route::get('register', [RegistrationController::class, 'create'])->middleware('guest');
    Route::post('register', [RegistrationController::class, 'store'])->middleware('guest');

    // Profile
    Route::get('profile', [ProfileController::class, 'show'])->middleware('auth');

    // Login
    Route::get('login', [LoginController::class, 'create'])->middleware('guest')->name('en' . '.login');
    Route::post('login', [LoginController::class, 'authenticate'])->middleware('guest');

    // Logout
    Route::get('logout', LogoutController::class)->middleware('auth');

    // Posts
    Route::get('posts/create', [PostController::class, 'create'])->middleware('auth');
    Route::post('posts/create', [PostController::class, 'store'])->middleware('auth');
    Route::get('posts/{post:slug}', [PostController::class, 'show']);

    // Categories
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('categories/{category:slug}', [CategoryController::class, 'show']);

})->where([
    'language' => 'lv|en',
]);
