<?php

use App\Http\Controllers\Admin\AdminController;
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
});

#endregion
