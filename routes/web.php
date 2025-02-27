<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\AdminController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdminMiddleware;

// Test route - Returns a UserResource for debugging purposes
Route::get('/test', function () {
    return UserResource::make(User::find(1));
});

// ===========================
// Admin-Only Routes (Protected)
// ===========================

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    IsAdminMiddleware::class,
])->group(function () {

    //Topic
    Route::resource('topics', TopicController::class);

    //Marketing
    Route::post('/marketings', [AdminController::class, 'storeMarketing'])->name('marketings.storeMarketing');
    Route::delete('/marketings/{marketing}', [AdminController::class, 'destroyMarketing'])->name('marketings.destroyMarketing');
});

// ===========================
// Authenticated User Routes
// ===========================
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard - Main user panel
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Posts - Allows authenticated users to create, edit, and delete their posts
    Route::resource('posts', PostController::class)->only(['create', 'store', 'edit', 'destroy']);
    Route::post('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

    // Comments - Nested resource under posts 
    Route::resource('posts.comments', CommentController::class)->shallow()->only(['store', 'update', 'destroy']);
    Route::post('/likes/{type}/{id}', [LikeController::class, 'store'])->name('likes.store');
    Route::delete('/likes/{type}/{id}', [LikeController::class, 'destroy'])->name('likes.destroy');
});

// ===========================
// Website Public Routes (No Authentication Required)
// ===========================
Route::controller(SiteController::class)->group(function () {
    Route::get('/', 'index')->name('welcome');
    Route::get('contact', 'contact')->name('contact');
    Route::post('contact', 'store')->name('contact.store');
});

// Public routes for viewing posts
Route::get('posts/{topic?}', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{post}/{slug}', [PostController::class, 'show'])->name('posts.show'); // Use showroute with slug
