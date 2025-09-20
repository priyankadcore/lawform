<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/second', 'second')->name('second');
    Route::get('/third', 'third')->name('third');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/services', 'services')->name('services');
    Route::get('/properties', 'properties')->name('properties');
    Route::get('/property/{id?}', 'propertyDetail')->name('property.detail');
    Route::get('/our-team', 'ourTeam')->name('our.team');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/blog/{id?}', 'blogDetail')->name('blog.detail');
    Route::get('/search', 'search')->name('search');
    Route::get('/property-listing', 'propertyList')->name('property.listing');
});
