<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CommentController;

Route::controller(FrontController::class)->group(function () {
    // Route::get('/', 'index')->name('home');

    Route::get('/', 'show')->name('home');
    Route::get('/{slug}', 'show')->name('page.show');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/blog-detail/{slug}', 'blog_detail')->name('blog-detail');
     Route::get('/our-team', 'team')->name('our-team');
});

Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');




