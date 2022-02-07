<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\SocialMediaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/post/{slug}',[HomeController::class, 'show'])->name('post');
Route::get('/about',[AboutController::class, 'index'])->name('about');
Route::get('/contact',[ContactController::class, 'index'])->name('contact');



Auth::routes(['register' => false]);
Route::post('logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::group(['middleware' => ['protectedRoutes']], function(){

    Route::get('/admin/categories',[CategoryController::class, 'index'])->name('admin.category');
    Route::get('/admin/category/create',[CategoryController::class, 'create'])->name('admin.add_category');
    Route::post('/admin/category/create',[CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/category/{d}/edit',[CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/admin/category/update/{id}',[CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/admin/category/{id}',[CategoryController::class, 'destroy'])->name('admin.category.delete');
    Route::get('/admin/category/status/{id}',[CategoryController::class,'changeStatus']);

    Route::get('/admin/posts', [PostController::class, 'index'])->name('admin.post');
    Route::get('/admin/post/create', [PostController::class, 'create'])->name('admin.post.create');
    Route::post('/admin/post/create', [PostController::class, 'store'])->name('admin.post.store');
    Route::get('/admin/post/{id}/edit', [PostController::class, 'edit'])->name('admin.post.edit');
    Route::put('/admin/post/update/{id}', [PostController::class, 'update'])->name('admin.post.update');
    Route::delete('/admin/post/{id}',[PostController::class, 'destroy'])->name('admin.post.delete');
    Route::get('/admin/post/status/{id}', [PostController::class, 'changeStatus']);

    Route::get('/admin/social-media', [SocialMediaController::class, 'index'])->name('admin.social');
    Route::post('/admin/social-media', [SocialMediaController::class, 'store'])->name('admin.social.store');
    Route::get('/admin/social/{id}/edit', [SocialMediaController::class, 'edit'])->name('admin.social.edit');
    Route::put('/admin/social/update/{id}', [SocialMediaController::class, 'update'])->name('admin.social.update');
    Route::delete('/admin/social/{id}', [SocialMediaController::class, 'destroy'])->name('admin.social.delete');
    Route::get('/admin/social/status/{id}', [SocialMediaController::class, 'changeStatus']);

});