<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
// ========= Start All Admin Controller =========
use App\Http\Controllers\Admin\ProfileController;

Route::group(['middleware' => 'prevent-back-history'], function () {
    // ========= Landing Page =========
    Route::get('/', function () {
        return view('welcome');
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
    }); // End Admin Routes

    // Logout Route
    Route::get('admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');
}); // End Prevent Back Middleware 
