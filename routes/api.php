<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Products\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => ["auth:api"]], function () {
    Route::post('/logout', LogoutController::class)->name('logout.api');
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::post('/sign-in', LoginController::class)->name('login.api');
Route::post('/register', RegisterController::class)->name('register.api');

Route::get('/login', function () {
    return response('Utilisateur doit s\'authentifier');
})->name('login');

// TODO
Route::post('add-product', [ProductController::class, 'add']);
Route::get('show-product', [ProductController::class, 'show']);
Route::patch('update-product/{product}', [ProductController::class, 'update']);
Route::delete('delete-product', [ProductController::class, 'delete']);
