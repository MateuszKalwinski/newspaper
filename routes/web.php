<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([

    'register' => false, // Register Routes...

    'reset' => false, // Reset Password Routes...

    'verify' => false, // Email Verification Routes...

]);

Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post-create');
Route::post('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post-create');
Route::get('/posts'.'/{id?}', [App\Http\Controllers\PostController::class, 'index'])->name('posts');

Route::get('/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories-create');
Route::post('/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories-create');



