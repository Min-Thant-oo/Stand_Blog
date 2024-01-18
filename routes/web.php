<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CmtController;

// use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\SiteConfigController;
use App\Http\Controllers\Admin\TagController;




use Illuminate\Support\Facades\Route;


Route::get('/', [BlogController::class, 'index']);
Route::get('/about', [BlogController::class, 'about']);
Route::get('/contact', [BlogController::class, 'contact']);
Route::post('/contact-store', [BlogController::class, 'contactStore']);
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
Route::post('/blogs/{blog:slug}/comments', [CmtController::class, 'commentStore']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/admin/home', [BlogsController::class, 'home']);

    Route::get('/admin/blogs', [BlogsController::class, 'blogs']);
    Route::get('/admin/blogs/create', [BlogsController::class, 'blogCreate']);
    Route::post('/admin/blogs/store', [BlogsController::class, 'blogStore']);
    Route::get('/admin/blogs/{blog:slug}/edit', [BlogsController::class, 'blogEdit']);
    Route::patch('/admin/blogs/{blog:slug}/update', [BlogsController::class, 'blogUpdate']);
    Route::delete('/admin/blogs/{blog:slug}/delete', [BlogsController::class, 'blogDestroy']);

    Route::get('/admin/comments', [CommentController::class, 'comments']);
    Route::delete('/admin/comments/{comment:id}/delete', [CommentController::class, 'cmtDestroy']);

    Route::get('/admin/categories', [CategoryController::class, 'categories']);
    Route::get('/admin/categories/create', [CategoryController::class, 'categoryCreate']);
    Route::post('/admin/categories/store', [CategoryController::class, 'categoryStore']);
    Route::get('/admin/categories/{category:slug}/edit', [CategoryController::class, 'categoryEdit']);
    Route::patch('/admin/categories/{category:slug}/update', [CategoryController::class, 'categoryUpdate']);
    Route::delete('/admin/categories/{category:slug}/delete', [CategoryController::class, 'categoryDestroy']);

    Route::get('/admin/tags', [TagController::class, 'tags']);
    Route::get('/admin/tags/create', [TagController::class, 'tagCreate']);
    Route::post('/admin/tags/store', [TagController::class, 'tagStore']);
    Route::get('/admin/tags/{tag:slug}/edit', [TagController::class, 'tagEdit']);
    Route::patch('/admin/tags/{tag:slug}/update', [TagController::class, 'tagUpdate']);
    Route::delete('/admin/tags/{tag:slug}/delete', [TagController::class, 'tagDestroy']);

    Route::get('/admin/contact-messages', [ContactMessageController::class, 'contactMessages']);
    Route::delete('/admin/contact-messages/{contactmessages:id}/delete', [ContactMessageController::class, 'contactMessagesDestroy']);

    Route::get('/admin/Site-config', [SiteConfigController::class, 'config']);
    Route::patch('/admin/Site-config/{siteconfig:id}/update', [SiteConfigController::class, 'configUpdate']);
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
