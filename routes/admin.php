<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\auth\Authcontroller;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\CityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PropertyTypeController;
use App\Http\Controllers\Admin\PropertyStatusController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ProfileController;


Route::name('admin.')->group(function () {

    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'loginSubmit')->name('loginSubmit');
        Route::get('/logout', 'logout')->name('logout')->middleware('admin');
    });
    Route::middleware(['admin'])->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'dashboard')->name('dashboard');
        });

        
        Route::controller(PropertyTypeController::class)->prefix('property_types')->name('property_types.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{propertyType}/edit', 'edit')->name('edit');
            Route::put('/{propertyType}', 'update')->name('update');
            Route::delete('/{propertyType}', 'destroy')->name('destroy');
        });
        Route::controller(PropertyStatusController::class)->prefix('property_statuses')->name('property_statuses.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{propertyStatus}/edit', 'edit')->name('edit');
            Route::put('/{propertyStatus}', 'update')->name('update');
            Route::delete('/{propertyStatus}', 'destroy')->name('destroy');
        });
        Route::controller(ServiceController::class)->prefix('services')->name('services.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{service}/edit', 'edit')->name('edit');
            Route::put('/{service}', 'update')->name('update');
            Route::delete('/{service}', 'destroy')->name('destroy');
        });
        Route::controller(TeamMemberController::class)->prefix('team-members')->name('team-members.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{teamMember}/edit', 'edit')->name('edit');
            Route::put('/{teamMember}', 'update')->name('update');
            Route::delete('/{teamMember}', 'destroy')->name('destroy');
        });

       
        
        Route::controller(PropertyController::class)->prefix('properties')->name('properties.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{property}/edit', 'edit')->name('edit');
            Route::put('/{property}', 'update')->name('update');
            Route::delete('/{property}', 'destroy')->name('destroy');

            Route::get('/get-states', 'getStates')->name('get-states');
            Route::get('/get-cities', 'getCities')->name('get-cities');
        });
        Route::controller(SettingController::class)->prefix('settings')->name('settings.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{setting}/edit', 'edit')->name('edit');
            Route::put('/{setting}', 'update')->name('update');
            Route::delete('/{setting}', 'destroy')->name('destroy');
        });


     Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/update-profile', [ProfileController::class, 'updateAvatar'])->name('profile.update-avatar');
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
   

    });
});
