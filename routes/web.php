<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;

use App\Http\Controllers\WelcomeController;

// ========= Start All Admin Controller =========
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SiteInfo\AdminSiteInfoController;
use App\Http\Controllers\Admin\SiteInfo\UserSiteInfoController;
use App\Http\Controllers\Admin\SiteInfo\UserHerosectionController;
use App\Http\Controllers\Admin\SiteInfo\UserInquiryController;

// ========= Landing Page Controller =========
use App\Http\Controllers\User\About\AboutController;
use App\Http\Controllers\User\ContactController;

// ========= User Controller =========
use App\Http\Controllers\User\UserHomeController;
use App\Http\Controllers\User\UserProfileController;

Route::group(['middleware' => 'prevent-back-history'], function () {
    // ========= Google Authentication =========
    Route::get('login/google', [GoogleController::class, 'login']);
    Route::get('login/google/callback', [GoogleController::class, 'callback']);

    // ========= Facebook Authentication =========
    Route::get('login/facebook', [FacebookController::class, 'login']);
    Route::get('login/facebook/callback', [FacebookController::class, 'callback']);

    // ========= Landing Page =========
    Route::middleware(['guest'])->group(function () {
        Route::get('/', [WelcomeController::class, 'WelcomeView'])->name('welcome');
        //About Routes
        Route::prefix('about')->group(function () {
            Route::get('mission-vission', [AboutController::class, 'MissionVissionView'])->name('about.mission.view');
            Route::get('quality-policy', [AboutController::class, 'QualityPolicyView'])->name('about.quality.view');
            Route::get('message-sds', [AboutController::class, 'MessageSDSView'])->name('about.message.view');
        });
        Route::get('contact', [contactcontroller::class, 'ContactAdd'])->name('user.contact.add');
        Route::post('contact/store', [contactcontroller::class, 'ContactStore'])->name('user.contact.store');
    });

    // ========= ALL Admin Routes =========
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
        'admin'
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
            // Admin Site Info 
            Route::get('admin/edit', [AdminSiteInfoController::class, 'AdminSiteInfoEdit'])->name('admin.siteinfo.edit');
            Route::post('admin/update/{id}', [AdminSiteInfoController::class, 'AdminSiteInfoUpdate'])->name('admin.siteinfo.update');
            Route::get('admin/remove_admin_brand', [AdminSiteInfoController::class, 'RemoveAdminBrand'])->name('remove.admin_brand');

            // User Site Info 
            Route::get('user/edit', [UserSiteInfoController::class, 'UserSiteInfoEdit'])->name('user.siteinfo.edit');
            Route::post('user/update/{id}', [UserSiteInfoController::class, 'UserSiteInfoUpdate'])->name('user.siteinfo.update');
            Route::get('user/remove_auth_brand', [UserSiteInfoController::class, 'RemoveAuthBrand'])->name('remove.auth_brand');
            Route::get('user/remove_user_brand', [UserSiteInfoController::class, 'RemoveUserBrand'])->name('remove.user_brand');

            // User Herosection 
            Route::get('herosection/view', [UserHerosectionController::class, 'UserHerosectionView'])->name('user.herosection.view');
            Route::get('herosection/add', [UserHerosectionController::class, 'UserHerosectionAdd'])->name('user.herosection.add');
            Route::post('herosection/store', [UserHerosectionController::class, 'UserHerosectionStore'])->name('user.herosection.store');
            Route::get('herosection/edit/{id}', [UserHerosectionController::class, 'UserHerosectionEdit'])->name('user.herosection.edit');
            Route::post('herosection/update/{id}', [UserHerosectionController::class, 'UserHerosectionUpdate'])->name('user.herosection.update');
            Route::get('herosection/delete/{id}', [UserHerosectionController::class, 'UserHerosectionDelete'])->name('user.herosection.delete');
        });

        // User Inquiries 
        Route::get('inquiries/view', [UserInquiryController::class, 'UserInquiryView'])->name('user.inquiries.view');
        Route::get('inquiries/delete/{id}', [UserInquiryController::class, 'UserInquiryDelete'])->name('user.inquiries.delete');
    }); // End Admin Routes

    // ========= ALL User Routes =========
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('home', [UserHomeController::class, 'UserHome'])->name('user.welcome');
        // All Request Route
        Route::prefix('personal')->group(function () {
            Route::post('datasheet/update', [UserHomeController::class, 'PersonalDatasheetUpdate'])->name('personal.datasheet.update');
        });

        // Profile Route
        Route::prefix('profile')->group(function () {
            Route::get('user/view', [UserProfileController::class, 'ProfileView'])->name('user.profile.view');
            Route::get('user/edit', [UserProfileController::class, 'ProfileEdit'])->name('user.profile.edit');
            Route::post('user/update', [UserProfileController::class, 'ProfileUpdate'])->name('user.profile.update');
            Route::post('user/update_password', [UserProfileController::class, 'PasswordUpdate'])->name('user.password.update');
            Route::get('user/remove_avatar', [UserProfileController::class, 'RemoveAvatar'])->name('user.remove.avatar');
        });
    }); // End User Routes

    // Logout Route
    Route::get('admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');
    Route::get('/password/logout', [AdminController::class, 'ChangePasswordLogout'])->name('password.logout');
}); // End Prevent Back Middleware 
