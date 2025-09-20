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

        Route::controller(CountryController::class)->prefix('countries')->name('countries.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{country}/edit', 'edit')->name('edit');
            Route::put('/{country}', 'update')->name('update');
            Route::delete('/{country}', 'destroy')->name('destroy');
        });

        Route::controller(StateController::class)->prefix('states')->name('states.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{state}/edit', 'edit')->name('edit');
            Route::put('/{state}', 'update')->name('update');
            Route::delete('/{state}', 'destroy')->name('destroy');
        });
        Route::controller(CityController::class)->prefix('cities')->name('cities.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{city}/edit', 'edit')->name('edit');
            Route::put('/{city}', 'update')->name('update');
            Route::delete('/{city}', 'destroy')->name('destroy');

            Route::get('/states/{countryId}', 'getStates')->name('states');
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

        Route::controller(BlogCategoryController::class)->prefix('blog-categories')->name('blog-categories.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{blogCategory}/edit', 'edit')->name('edit');
            Route::put('/{blogCategory}', 'update')->name('update');
            Route::delete('/{blogCategory}', 'destroy')->name('destroy');
        });
        Route::controller(BlogController::class)->prefix('blogs')->name('blogs.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{blog}/edit', 'edit')->name('edit');
            Route::put('/{blog}', 'update')->name('update');
            Route::delete('/{blog}', 'destroy')->name('destroy');
        });
        Route::controller(SubscriberController::class)->prefix('subscribers')->name('subscribers.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{subscriber}', 'show')->name('show');
            Route::get('/{subscriber}/edit', 'edit')->name('edit');
            Route::put('/{subscriber}', 'update')->name('update');
            Route::delete('/{subscriber}', 'destroy')->name('destroy');
            Route::post('/{subscriber}/verify', 'verify')->name('verify');
            Route::post('/{subscriber}/unsubscribe', 'unsubscribe')->name('unsubscribe');
            Route::get('/export', 'export')->name('export');
        });
        Route::controller(SliderController::class)->prefix('sliders')->name('sliders.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{slider}/edit', 'edit')->name('edit');
            Route::put('/{slider}', 'update')->name('update');
            Route::delete('/{slider}', 'destroy')->name('destroy');
            Route::post('{slider}/status', 'updateStatus')->name('status.update');
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
    });
});
