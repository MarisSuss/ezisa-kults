<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LanguageController;

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
    Route::get('register', [UserController::class, 'create']);
    Route::post('register', [UserController::class, 'store']);


})->where([
    'language' => 'lv|en',
]);
