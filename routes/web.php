<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;

use App\Http\Controllers\WelcomeController;

// ========= All Admin Controller =========
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SiteInfo\AdminSiteInfoController;
use App\Http\Controllers\Admin\SiteInfo\UserSiteInfoController;
use App\Http\Controllers\Admin\SiteInfo\UserHerosectionController;
use App\Http\Controllers\Admin\SiteInfo\UserInquiryController;

// ========= All HR Controller =========
use App\Http\Controllers\Admin\PDS\PDSController;
use App\Http\Controllers\Admin\ServiceRecord\ServiceRecordController;
use App\Http\Controllers\Admin\Report\ReportController;

// ========= Landing Page Controller =========
use App\Http\Controllers\User\About\AboutController;
use App\Http\Controllers\User\ContactController;

// ========= User Controller =========
use App\Http\Controllers\User\UserHomeController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\User\GenerateSubmitPDFController;
use App\Http\Controllers\User\RequestServiceRecordController;

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
        Route::get('/dashboard', [DashboardController::class, 'ViewDashboard'])->name('dashboard');

        // ========= User Profile and Change Password =========
        Route::prefix('profile')->group(function () {
            Route::get('admin/view', [ProfileController::class, 'ProfileView'])->name('admin.profile.view');
            Route::get('admin/edit', [ProfileController::class, 'ProfileEdit'])->name('admin.profile.edit');
            Route::post('admin/update', [ProfileController::class, 'ProfileUpdate'])->name('admin.profile.update');
            Route::post('admin/update_password', [ProfileController::class, 'PasswordUpdate'])->name('admin.password.update');
            Route::get('admin/remove_avatar', [ProfileController::class, 'RemoveAvatar'])->name('admin.remove.avatar');
        });

        // ========= Account Management =========
        Route::prefix('accounts')->middleware('adminOnly')->group(function () {
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

        // ========= PDS Management =========
        Route::prefix('pds')->group(function () {
            // View
            Route::get('admin/pending/view', [PDSController::class, 'PDSPendingView'])->name('pds.pending.view');
            Route::get('admin/verified/view', [PDSController::class, 'PDSVerifiedView'])->name('pds.verified.view');
            Route::get('admin/invalid/view', [PDSController::class, 'PDSInvalidView'])->name('pds.invalid.view');
            Route::get('admin/archived/view', [PDSController::class, 'PDSArchivedView'])->name('pds.archived.view');

            // Functions
            Route::post('admin/pds/update', [PDSController::class, 'PDSUpdate'])->name('pds.update');
            Route::get('admin/pds/archive/{id}', [PDSController::class, 'PDSArchive'])->name('pds.archive');
            Route::get('admin/pds/restore/{id}', [PDSController::class, 'PDSRestore'])->name('pds.restore');
            Route::get('admin/pds/delete/{id}', [PDSController::class, 'PDSDelete'])->name('pds.delete');
        });

        // ========= SR Request Management =========
        Route::prefix('manage-sr')->group(function () {
            // Pending Request
            Route::get('admin/pending/view', [ServiceRecordController::class, 'AllRequestView'])->name('all.request.view');
            Route::get('admin/pending/edit/{id}', [ServiceRecordController::class, 'EditRequestSR'])->name('edit.request.sr');
            Route::post('admin/pending/update', [ServiceRecordController::class, 'UpdateRequestSR'])->name('update.request.sr');

            // Completed Request
            Route::get('admin/completed/view', [ServiceRecordController::class, 'AllCompletedView'])->name('all.completed.view');
            Route::get('admin/completed/edit/{id}', [ServiceRecordController::class, 'EditCompletedSR'])->name('edit.completed.sr');

            // Service Record
            Route::get('admin/completed/{email}/{id}', [ServiceRecordController::class, 'ViewDetailsCompletedSR'])->name('viewdetails.completed.sr');
            Route::post('admin/completed/store', [ServiceRecordController::class, 'StoreDetailsCompletedSR'])->name('storedetails.completed.sr');
            Route::post('admin/completed/update/{id}', [ServiceRecordController::class, 'UpdateDetailsCompletedSR'])->name('updatedetails.completed.sr');
            Route::get('admin/completed/delete/{email}/{id}', [ServiceRecordController::class, 'DeleteDetailsCompletedSR'])->name('deletedetails.completed.sr');

            // Archived Function
            Route::get('admin/completed/archive/{email}/{id}', [ServiceRecordController::class, 'ArchivedDetailsCompletedSR'])->name('archivedetails.completed.sr');

            // View Archived
            Route::get('admin/archived/view', [ServiceRecordController::class, 'AllArchivedView'])->name('all.archived.view');
            Route::get('admin/archived/restore/{id}', [ServiceRecordController::class, 'RestoreArchivedView'])->name('restore.archived.view');
            Route::get('admin/archived/delete/{id}', [ServiceRecordController::class, 'DeleteArchivedView'])->name('delete.archived.view');
        });

        // ========= Report Management =========
        Route::prefix('manage-report')->group(function () {
            Route::get('admin/generate-report', [ReportController::class, 'GenereteReport'])->name('generate.report.view');
            Route::post('admin/generate-report/pds', [ReportController::class, 'PDSGenereteReport'])->name('generate.report.pds');
            Route::post('admin/generate-report/sr', [ReportController::class, 'SRGenereteReport'])->name('generate.report.sr');
        });
    }); // End Admin Routes

    // ========= ALL User Routes =========
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('home', [UserHomeController::class, 'UserHome'])->name('user.welcome');

        // ========= All Request Route =========
        Route::post('personal/datasheet/update', [UserHomeController::class, 'PersonalDatasheetUpdate'])->name('personal.datasheet.update');
        Route::post('family/datasheet/update', [UserHomeController::class, 'FamilyDatasheetUpdate'])->name('family.datasheet.update');
        Route::post('educational/datasheet/update', [UserHomeController::class, 'EducationalDatasheetUpdate'])->name('educational.datasheet.update');
        Route::post('civil/datasheet/update', [UserHomeController::class, 'CivilDatasheetUpdate'])->name('civil.datasheet.update');
        Route::post('work/datasheet/update', [UserHomeController::class, 'WorkDatasheetUpdate'])->name('work.datasheet.update');
        Route::post('voluntary/datasheet/update', [UserHomeController::class, 'VoluntaryDatasheetUpdate'])->name('voluntary.datasheet.update');
        Route::post('learning/datasheet/update', [UserHomeController::class, 'LearningDatasheetUpdate'])->name('learning.datasheet.update');
        Route::post('other/datasheet/update', [UserHomeController::class, 'OtherDatasheetUpdate'])->name('other.datasheet.update');

        // Generate PDF
        Route::get('page_one_front/generate/pdf', [GenerateSubmitPDFController::class, 'PageOneFrontPDF'])->name('page_one_front.generate.pdf');
        Route::get('page_one_back/generate/pdf', [GenerateSubmitPDFController::class, 'PageOneBackPDF'])->name('page_one_back.generate.pdf');
        Route::get('page_two_back/generate/pdf', [GenerateSubmitPDFController::class, 'PageTwoFrontPDF'])->name('page_two_front.generate.pdf');

        // Submit PDF
        Route::get('submit/pdf', [GenerateSubmitPDFController::class, 'SubmitPDF'])->name('submit.pdf');
        Route::post('update/submit/pdf', [GenerateSubmitPDFController::class, 'UpdateSubmitPDF'])->name('update.submit.pdf');
        Route::get('delete/submit/pdf', [GenerateSubmitPDFController::class, 'DeleteSubmitPDF'])->name('delete.submit.pdf');

        // SR Request
        Route::get('request/service-record', [RequestServiceRecordController::class, 'ViewRequestServiceRecord'])->name('view.request.servicerecord');
        Route::get('store/service-record', [RequestServiceRecordController::class, 'StoreRequestServiceRecord'])->name('store.request.servicerecord');
        Route::get('delete/service-record/{id}', [RequestServiceRecordController::class, 'DeleteRequestServiceRecord'])->name('delete.request.servicerecord');
        Route::get('archive/service-record/{id}', [RequestServiceRecordController::class, 'ArchiveRequestServiceRecord'])->name('archive.request.servicerecord');

        // SR Archives
        Route::get('archives/service-record/view', [RequestServiceRecordController::class, 'ViewArchiveServiceRecord'])->name('view.archive.servicerecord');
        Route::get('archives/service-record/restore/{id}', [RequestServiceRecordController::class, 'RestoreArchiveServiceRecord'])->name('restore.archive.servicerecord');
        Route::get('archives/service-record/delete/{id}', [RequestServiceRecordController::class, 'DeleteArchiveServiceRecord'])->name('delete.archive.servicerecord');

        // Generate Service Record
        Route::get('generate/service-record/{id}', [RequestServiceRecordController::class, 'GenerateServiceRecord'])->name('generate.servicerecord');

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
