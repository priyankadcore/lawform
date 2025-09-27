<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\auth\Authcontroller;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PropertyStatusController;

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\PagesController;


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

        
        
        Route::controller(PropertyStatusController::class)->prefix('property_statuses')->name('property_statuses.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{propertyStatus}/edit', 'edit')->name('edit');
            Route::put('/{propertyStatus}', 'update')->name('update');
            Route::delete('/{propertyStatus}', 'destroy')->name('destroy');
        });
    
        Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/profile/update-profile', [ProfileController::class, 'updateAvatar'])->name('profile.update-avatar');
        Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
    

     Route::controller(SectionController::class)->prefix('section_types')->name('section_types.')->group(function () {
        Route::get('/', 'section_type')->name('type');
        Route::post('/', 'store')->name('store');
        Route::get('/{sectionType}/edit', 'edit')->name('edit');
        Route::put('/{sectionType}', 'update')->name('update');
        Route::delete('/{sectionType}', 'destroy')->name('destroy');
    });
    Route::controller(SectionController::class)->prefix('section_template')->name('section_template.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'template_save')->name('save');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'template_update')->name('update');
        Route::delete('/{id}', 'template_destroy')->name('destroy');
    });
     Route::controller(PagesController::class)->prefix('pages')->name('pages.')->group(function () {
        Route::get('/', 'index')->name('index');
        // Route::get('/list', 'list')->name('list');
        Route::post('/', 'store')->name('store');
        // Route::get('/{id}/edit', 'edit')->name('edit');
        // Route::put('/{id}', 'template_update')->name('update');
        Route::delete('/sections/{id}', 'deletePageSection')->name('sections.delete');
        Route::get('/get-templates/{section_type_id}', 'getTemplates')->name('getTemplates');
        Route::post('/section-add', 'section_add')->name('section-add');
        Route::get('/{id}/sections', 'getSections')->name('sections');
    
      
    });
     Route::controller(PagesController::class)->prefix('pages-list')->name('pages-list.')->group(function () {
        Route::get('/', 'list')->name('list');
    });



    });
});
