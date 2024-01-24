<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Redirect to the default language
Route::get('/', function () {
    return redirect('/{language}');
});

// Group all routes and give them a prefix of the first segment as function($language)
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
