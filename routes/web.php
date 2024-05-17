<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Content\Blog\BlogCategoryController;
use App\Http\Controllers\Admin\Content\Blog\BlogController;
use App\Http\Controllers\Admin\Content\FaqController;
use App\Http\Controllers\Site\HomeController;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
// return view('welcome');
// });

#region site

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
});

#endregion


#region admin

Route::controller(AdminController::class)->prefix('admin')->group(function () {
    Route::get('/{user:username}', 'index')->name('admin.home');

    Route::prefix('content')->group(function () {

        #region faq

        Route::controller(FaqController::class)->prefix('faq')->group(function () {
            Route::get('{user:username}/', 'index')->name('admin.faq.index');
            Route::get('{user:username}/create', 'create')->name('admin.faq.create');
            Route::post('{user:username}/store', 'store')->name('admin.faq.store');
            Route::get('{user:username}/edit/{faq}', 'edit')->name('admin.faq.edit');
            Route::put('{user:username}/update/{faq}', 'update')->name('admin.faq.update');
            Route::delete('{user:username}/delete/{faq}', 'delete')->name('admin.faq.delete');
        });

        #endregion

        #region blog & categories

        Route::controller(BlogCategoryController::class)->prefix('blog-category')->group(function () {
            Route::get('{user:username}/', 'index')->name('admin.blog-category.index');
            Route::get('{user:username}/create', 'create')->name('admin.blog-category.create');
            Route::post('{user:username}/store', 'store')->name('admin.blog-category.store');
            Route::get('{user:username}/edit/{category}', 'edit')->name('admin.blog-category.edit');
            Route::put('{user:username}/update/{category}', 'update')->name('admin.blog-category.update');
            Route::delete('{user:username}/delete/{category}', 'delete')->name('admin.blog-category.delete');
        });

        Route::controller(BlogController::class)->prefix('blog')->group(function () {
            Route::get('{user:username}/', 'index')->name('admin.blog.index');
            Route::get('{user:username}/create', 'create')->name('admin.blog.create');
            Route::post('{user:username}/store', 'store')->name('admin.blog.store');
            Route::get('{user:username}/edit/{blog}', 'edit')->name('admin.blog.edit');
            Route::put('{user:username}/update/{blog}', 'update')->name('admin.blog.update');
            Route::delete('{user:username}/delete/{blog}', 'delete')->name('admin.blog.delete');
        });

        #endregion

    });
});

#endregion
