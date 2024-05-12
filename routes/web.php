<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController; 
use App\Http\Controllers\MyPostsController; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [BlogController::class, 'index'])->name('blogs.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
Route::get('/blogs', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/blog-details/{id}', [BlogController::class, 'blogDetail']);
Route::middleware('auth')->group(function () {
    Route::get('/add-blog', [BlogController::class, 'create'])->name('add-blog');
    // Other routes related to blogs
});


Route::get('/my-blogs', [MyPostsController::class, 'userBlogs']);
Route::delete('/blogs/{blog}', [MyPostsController::class,'destroy'])->name('blogs.destroy');
Route::get('/blogs/{id}/edit', [MyPostsController::class, 'edit'])->name('blogs.edit');
Route::put('go-update/{id}', [MyPostsController::class, 'update']);



