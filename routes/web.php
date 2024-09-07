<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;


Route::get('/', function () {
    return view('signup');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::post('/signup', [App\Http\Controllers\UserController::class, 'signup']);
Route::post('/login_process', [App\Http\Controllers\UserController::class, 'login']);

Route::post('/logout', function () {
    // Perform logout
    Auth::logout();
    // Redirect to login page after logout
    return redirect('/login');
})->name('logout');

Route::get('/dashboard', [App\Http\Controllers\BookController::class, 'index']);
Route::get('/book/create', [App\Http\Controllers\BookController::class, 'create']);
Route::post('/book', [App\Http\Controllers\BookController::class, 'store']);
Route::get('/book/{id}/edit', [App\Http\Controllers\BookController::class, 'edit']);
Route::post('/book/{id}', [App\Http\Controllers\BookController::class, 'update']);
Route::delete('/book/{id}', [App\Http\Controllers\BookController::class, 'destroy']);

