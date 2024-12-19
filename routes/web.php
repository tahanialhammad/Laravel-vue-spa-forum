<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SiteController;
use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\IsAdminMiddleware;

Route::get('/test', function () {
    return UserResource::make(User::find(1));
});

// Auth only admin
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    IsAdminMiddleware::class,
])->group(function () {
    Route::post('services/', [ServiceController::class, 'store'])->name('services.store');
    Route::resource('services', ServiceController::class)->only(['store', 'update', 'destroy']);
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Post all in one 
    Route::resource('posts', PostController::class)->only(['create', 'store']);

    // Comments
    Route::resource('posts.comments', CommentController::class)->shallow()->only(['store', 'update', 'destroy']);
    Route::post('/likes/{type}/{id}', [LikeController::class, 'store'])->name('likes.store');
    Route::delete('/likes/{type}/{id}', [LikeController::class, 'destroy'])->name('likes.destroy');
});

// Site
Route::controller(SiteController::class)->group(function () {
    Route::get('/', 'index')->name('welcome');
});

// Posts
Route::get('posts/{topic?}', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{post}/{slug}', [PostController::class, 'show'])->name('posts.show'); // after use showroute with slug we can delete optionaly {slug?}'

// Service 
Route::get('services/', [ServiceController::class, 'index'])->name('services.index');
Route::get('services/{service}/{slug}', [ServiceController::class, 'show'])->name('services.show');
