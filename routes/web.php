<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CmtController;

use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\SiteConfigController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name('blog.index');
Route::get('/about', [BlogController::class, 'about']);
Route::get('/contact', [BlogController::class, 'contact']);
Route::post('/contact-store', [BlogController::class, 'contactStore']);
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/blogs/{blog:slug}/comments', [CmtController::class, 'store']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
        ->prefix('admin')
        ->group(function () {

            Route::get('/home', [HomeController::class, 'index'])->name('home.index');

            Route::resource('blogs', BlogsController::class)
                ->parameters(['blogs' => 'blog:slug'])
                ->except('show');

            Route::resource('comments', CommentController::class)
                ->only('index', 'destroy');

            Route::resource('categories', CategoryController::class)
                ->parameters(['categories' => 'category:slug'])
                ->except('show');

            Route::resource('tags', TagController::class)
                ->parameters(['tags' => 'tag:slug'])
                ->except('show');

            Route::resource('contactmessages', ContactMessageController::class)
                ->only('index', 'destroy');

            Route::get('/siteconfig/edit', [SiteConfigController::class, 'edit'])->name('siteconfig.edit');
            Route::patch('/siteconfig/update', [SiteConfigController::class, 'update'])->name('siteconfig.update');
                
        });


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});