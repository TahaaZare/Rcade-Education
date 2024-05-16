<?php

use App\Http\Controllers\Admin\AdminController;
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

    });
});

#endregion
