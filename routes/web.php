<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistrationController;

// Redirect to the default language
Route::get('/', function () {
    return redirect('/{language}');
});

// Change the language
Route::post('/{language}/change-language', LanguageController::class);

// Group all routes and give them a prefix of the first segment as $language
Route::group(['prefix' => '{language}'], function () {

    // Home page
    Route::get('/', HomeController::class);

    // Welcome page
    Route::get('welcome', WelcomeController::class);

    // Registration
    Route::get('register', [RegistrationController::class, 'create'])->middleware('guest');
    Route::post('register', [RegistrationController::class, 'store'])->middleware('guest');

    // Login
    Route::get('login', [LoginController::class, 'create'])->middleware('guest')->name('login');
    Route::post('login', [LoginController::class, 'authenticate'])->middleware('guest');

    // Logout
    Route::get('logout', LogoutController::class)->middleware('auth');

})->where([
    'language' => 'lv|en',
]);
