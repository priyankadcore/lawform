<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\auth\Authcontroller;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PropertyStatusController;

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\UploadsController;
use App\Http\Controllers\Admin\NavbarController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\PortfolioController;
use App\Http\Controllers\admin\CareerJobController;


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
        Route::put('/{id}', 'pageUpdate')->name('update');
        Route::post('/section-update', 'updateSectionFields')->name('section-update');
        Route::delete('/sections/{id}', 'deletePageSection')->name('sections.delete');
        Route::get('/get-templates/{section_type_id}', 'getTemplates')->name('getTemplates');
        Route::post('/section-add', 'section_add')->name('section-add');
        Route::get('/{id}/sections', 'getSections')->name('sections');
        Route::delete('/delete/{id}', 'destroyPage')->name('destroyPage');
        Route::get('sections/{pageSectionId}/fields', 'getSectionFields')->name('sections.fields');
    });

     Route::controller(PagesController::class)->prefix('pages-list')->name('pages-list.')->group(function () {
        Route::get('/', 'list')->name('list');
    });

    Route::controller(UploadsController::class)->prefix('uploads')->name('uploads.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
     Route::controller(NavbarController::class)->prefix('navbar')->name('navbar.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

     Route::controller(FooterController::class)->prefix('footer')->name('footer.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
    });

    Route::controller(BlogController::class)->prefix('blogs')->name('blogs.')->group(function () {
        Route::get('/', 'index')->name('index');
        
        Route::post('/store', 'store')->name('store');
        Route::get('/{blog}/edit', 'edit')->name('edit'); 
        Route::put('/{blog}', 'update')->name('update'); // Update route
        Route::delete('/{blog}', 'destroy')->name('destroy');
    });
    Route::get('blogs-create', [BlogController::class, 'create'])->name('blogs.create');
    Route::get('blogs-edit-{blog}', [BlogController::class, 'edit'])->name('blogs.edit');

    Route::resource('categories', CategoryController::class)->except(['create', 'edit', 'show']);

    Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::controller(TeamController::class)->prefix('team')->name('team.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/{team}/edit', 'edit')->name('edit'); 
       
        Route::put('/{team}', 'update')->name('update'); 
        Route::delete('/{team}', 'destroy')->name('destroy');
    });

    Route::controller(PortfolioController::class)->prefix('portfolio')->name('portfolio.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
     Route::put('/{id}', 'update')->name('update'); 
    Route::delete('/{id}', 'destroy')->name('destroy');
  
    });

  Route::get('portfolio-create', [PortfolioController::class, 'create'])->name('portfolio.create');
  Route::get('portfolio-show-{id}', [PortfolioController::class, 'show'])->name('portfolio.show');
  Route::get('portfolio-edit-{id}', [PortfolioController::class, 'edit'])->name('portfolio.edit');

 Route::get('contact-list', [ContactController::class, 'index'])->name('contact.list');


   Route::controller(GalleryController::class)->prefix('gallery')->name('gallery.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });


     Route::controller(CareerJobController::class)->prefix('job')->name('job.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::post('/{id}', 'update')->name('update'); 
         Route::get('/{id}/edit', 'edit')->name('edit'); 
        Route::delete('/{id}', 'destroy')->name('destroy');
    
        });

      



    });
});
