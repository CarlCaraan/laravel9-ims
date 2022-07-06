<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
// ========= Start All Admin Controller =========
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminSiteInfoController;
use App\Http\Controllers\Admin\UserSiteInfoController;

Route::group(['middleware' => 'prevent-back-history'], function () {
    // ========= Google Authentication =========
    Route::get('login/google', [GoogleController::class, 'login']);
    Route::get('login/google/callback', [GoogleController::class, 'callback']);

    // ========= Facebook Authentication =========
    Route::get('login/facebook', [FacebookController::class, 'login']);
    Route::get('login/facebook/callback', [FacebookController::class, 'callback']);


    // ========= Landing Page =========
    Route::get('/', function () {
        return view('landing_page.index');
    });

    // ========= Admin Routes =========
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.index');
        })->name('dashboard');

        // ========= User Profile and Change Password =========
        Route::prefix('profile')->group(function () {
            Route::get('admin/view', [ProfileController::class, 'ProfileView'])->name('admin.profile.view');
            Route::get('admin/edit', [ProfileController::class, 'ProfileEdit'])->name('admin.profile.edit');
            Route::post('admin/update', [ProfileController::class, 'ProfileUpdate'])->name('admin.profile.update');
            Route::post('admin/update_password', [ProfileController::class, 'PasswordUpdate'])->name('admin.password.update');
            Route::get('admin/remove_avatar', [ProfileController::class, 'RemoveAvatar'])->name('admin.remove.avatar');
        });

        // ========= Account Management =========
        Route::prefix('accounts')->group(function () {
            Route::get('admin/view', [UserController::class, 'UserView'])->name('user.view');
            Route::get('admin/add', [UserController::class, 'UserAdd'])->name('user.add');
            Route::post('admin/store', [UserController::class, 'UserStore'])->name('user.store');
            Route::get('admin/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
            Route::post('admin/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
            Route::get('admin/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');
        });

        // ========= SiteInfo Management =========
        Route::prefix('siteinfo')->group(function () {
            // Admin Site Info Management
            Route::get('admin/edit', [AdminSiteInfoController::class, 'AdminSiteInfoEdit'])->name('admin.siteinfo.edit');
            Route::post('admin/update/{id}', [AdminSiteInfoController::class, 'AdminSiteInfoUpdate'])->name('admin.siteinfo.update');
            Route::get('admin/remove_admin_brand', [AdminSiteInfoController::class, 'RemoveAdminBrand'])->name('remove.admin_brand');

            // User Site Info Management
            Route::get('user/edit', [UserSiteInfoController::class, 'UserSiteInfoEdit'])->name('user.siteinfo.edit');
            Route::post('user/update/{id}', [UserSiteInfoController::class, 'UserSiteInfoUpdate'])->name('user.siteinfo.update');
            Route::get('user/remove_auth_brand', [UserSiteInfoController::class, 'RemoveAuthBrand'])->name('remove.auth_brand');
            Route::get('user/remove_user_brand', [UserSiteInfoController::class, 'RemoveUserBrand'])->name('remove.user_brand');
        });
    }); // End Admin Routes

    // Logout Route
    Route::get('admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');
}); // End Prevent Back Middleware 
