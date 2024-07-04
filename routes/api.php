<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/register', RegisterController::class)->name('register.api')
    /*
->middleware('auth')
*/;

Route::post('/login', LoginController::class)->name('login.api')
    /*->middleware('auth:api')*/;
Route::group([], function () {
});
