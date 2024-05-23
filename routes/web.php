<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Content\AboutUsController;
use App\Http\Controllers\Admin\Content\Blog\BlogCategoryController;
use App\Http\Controllers\Admin\Content\Blog\BlogController;
use App\Http\Controllers\Admin\Content\Course\CourseCategoryController;
use App\Http\Controllers\Admin\Content\Course\CourseController;
use App\Http\Controllers\Admin\Content\Course\CourseEpisodeController;
use App\Http\Controllers\Admin\Content\FaqController;
use App\Http\Controllers\Admin\Content\MasterRulseController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Site\Account\ProfileController;
use App\Http\Controllers\Site\HomeController;
use App\Models\Content\Course\CourseCategory;
use Illuminate\Support\Facades\Route;

#region site

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/master-rules', 'MasterRules')->name('master-rules');
    Route::get('/about-us', 'AboutUs')->name('about-us');

    Route::get('courses', 'Courses')->name('courses');
    Route::get('courses/{course:slug}', 'ShowCourse')->name('show-course');

    Route::get('blogs', 'Blogs')->name('blogs');
    Route::get('blogs/{blog:slug}', 'ShowBlog')->name('show-blog');
});



Route::controller(ProfileController::class)->group(function () {

    Route::get('/{user:username}', 'UserProfile')->name('user-profile');

    Route::prefix('my-profile')->group(function () {
        Route::get('/{user:username}', "MyProfile")->name('user.profile');
        Route::post('/{user:username}/update-bio', "UpdateBio")->name('update-bio');

        Route::get('/{user:username}/create-blog', "CreateBlog")->name('user-create-blog');
        Route::post('/{user:username}/store-blog', "StoreBlog")->name('user-store-blog');

        Route::get('/{user:username}/edit-blog/{blog}', "EditBlog")->name('user-edit-blog');
        Route::put('/{user:username}/update-blog/{blog}', "UpdateBlog")->name('user-update-blog');

        Route::get('select-username/{user:mobile}', "SelectUsername")->name('select-username');
        Route::post('confirm-username/{user:mobile}', "ConfirmUsername")->name('confirm-username');
    });
});

Route::prefix('auth')->group(function () {
    Route::get('login-form', [LoginRegisterController::class, 'loginForm'])->name('loginForm');
    Route::post('/login-confrim', [LoginRegisterController::class, 'loginRegister'])->name('auth.login-register');
    Route::get('login-confirm/{token}', [LoginRegisterController::class, 'loginConfirmForm'])->name('auth.login-confirm-form');
    Route::post('/login-confirm/{token}', [LoginRegisterController::class, 'loginConfirm'])->name('auth.login-confirm');
    Route::get('/login-resend-otp/{token}', [LoginRegisterController::class, 'loginResendOtp'])->name('auth.login-resend-otp');
    Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('user.logout');
});


#endregion


#region admin

Route::controller(AdminController::class)->prefix('admin')->group(function () {
    Route::get('/{user:username}', 'index')->name('admin.home');

    Route::prefix('content')->group(function () {

        #region faq & about us

        Route::controller(MasterRulseController::class)->prefix('rule')->group(function () {
            Route::get('{user:username}/', 'index')->name('admin.rule.index');
            Route::get('{user:username}/edit/{rule}', 'edit')->name('admin.rule.edit');
            Route::put('{user:username}/update/{rule}', 'update')->name('admin.rule.update');
        });

        Route::controller(AboutUsController::class)->prefix('about')->group(function () {
            Route::get('{user:username}/', 'index')->name('admin.about.index');
            Route::get('{user:username}/edit/{about}', 'edit')->name('admin.about.edit');
            Route::put('{user:username}/update/{about}', 'update')->name('admin.about.update');
        });

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

        #region course & category

        Route::controller(CourseCategoryController::class)->prefix('course-category')->group(function () {
            Route::get('{user:username}/', 'index')->name('admin.course-category.index');
            Route::get('{user:username}/create', 'create')->name('admin.course-category.create');
            Route::post('{user:username}/store', 'store')->name('admin.course-category.store');
            Route::get('{user:username}/edit/{category}', 'edit')->name('admin.course-category.edit');
            Route::put('{user:username}/update/{category}', 'update')->name('admin.course-category.update');
            Route::delete('{user:username}/delete/{category}', 'delete')->name('admin.course-category.delete');
        });


        Route::controller(CourseController::class)->prefix('course')->group(function () {
            Route::get('{user:username}/', 'index')->name('admin.course.index');
            Route::get('{user:username}/create', 'create')->name('admin.course.create');
            Route::post('{user:username}/store', 'store')->name('admin.course.store');
            Route::get('{user:username}/edit/{course}', 'edit')->name('admin.course.edit');
            Route::put('{user:username}/update/{course}', 'update')->name('admin.course.update');
            Route::delete('{user:username}/delete/{course}', 'delete')->name('admin.course.delete');
        });


        Route::controller(CourseEpisodeController::class)->prefix('course-episode')->group(function () {
            Route::get('{user:username}/', 'index')->name('admin.course-episode.index');
            Route::get('{user:username}/create/{course}', 'create')->name('admin.course-episode.create');
            Route::post('{user:username}/store/{course}', 'store')->name('admin.course-episode.store');
            Route::get('{user:username}/edit/{episode}/{course}', 'edit')->name('admin.course-episode.edit');
            Route::put('{user:username}/update/{episode}/{course}', 'update')->name('admin.course-episode.update');
            Route::delete('{user:username}/delete/{episode}/{course}', 'delete')->name('admin.course-episode.delete');
        });




        #endregion

    });
});

#endregion
