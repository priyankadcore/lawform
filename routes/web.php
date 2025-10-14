<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

Route::controller(FrontController::class)->group(function () {
    // Route::get('/', 'index')->name('home');

    Route::get('/', 'show')->name('home');
    Route::get('/{slug}', 'show')->name('page.show');
});




