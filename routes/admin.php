<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Admin\AccountSettingController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\Auth\ConfirmPasswordController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\Auth\VerificationController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MostVisitedPageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TaxonController;
use App\Http\Controllers\Admin\TaxonomyController;
use App\Http\Controllers\Admin\TaxonomyTreeController;
use App\Http\Controllers\Admin\TaxonRenameController;
use App\Http\Controllers\Admin\TaxonSearchController;
use App\Http\Controllers\Admin\TaxonSortController;
use App\Http\Controllers\Admin\TaxonTreeController;
use App\Http\Controllers\Admin\TopReferrerController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UploadTinymceController;
use App\Http\Controllers\Admin\LogActivityController;
use App\Http\Controllers\Admin\MailSettingController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenuItemController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Registration Routes...
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    // Password Confirmation Routes...
    Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

    // Email Verification Routes...
    Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

    // Route Dashboards
    Route::middleware('auth')
        ->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

            //Upload Tinymce
            Route::post('uploads-tinymce', UploadTinymceController::class)->name('public.upload-tinymce');

            // Application Route
            Route::get('taxonomies/{taxonomy}/taxon/{taxon}/jstree', TaxonTreeController::class)->name('taxons.tree');
            Route::get('/taxonomies/{taxonomy}/jstree', TaxonomyTreeController::class)->name('taxonomies.tree');
            Route::post('/taxonomies/bulk-delete', [TaxonomyController::class, 'bulkDelete'])->name('taxonomies.bulk-delete');
            Route::get('/taxonomies', [TaxonomyController::class, 'index'])->name('taxonomies.index');
            Route::get('/taxonomies/create', [TaxonomyController::class, 'create'])->name('taxonomies.create');
            Route::post('/taxonomies', [TaxonomyController::class, 'store'])->name('taxonomies.store');
            Route::get('/taxonomies/{taxonomy}/edit', [TaxonomyController::class, 'edit'])->name('taxonomies.edit');
            Route::delete('/taxonomies/{taxonomy}', [TaxonomyController::class, 'destroy'])->name('taxonomies.destroy');
            Route::put('/taxonomies/{taxonomy}', [TaxonomyController::class, 'update'])->name('taxonomies.update');


            Route::post('taxons/{taxon}/sort', TaxonSortController::class)->name('taxons.sort');
            Route::post('taxons/{taxon}/rename', TaxonRenameController::class)->name('taxons.rename');
            Route::post('/taxons', [TaxonController::class, 'store'])->name('taxons.store');
            Route::get('/taxons/{taxon}/edit', [TaxonController::class, 'edit'])->name('taxons.edit');
            Route::delete('/taxons/{taxon}', [TaxonController::class, 'destroy'])->name('taxons.destroy');
            Route::put('/taxons/{taxon}', [TaxonController::class, 'update'])->name('taxons.update');

            // System Route
            Route::post('/admins/bulk-delete', [AdminController::class, 'bulkDelete'])->name('admins.bulk-delete');
            Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
            Route::get('/admins/create', [AdminController::class, 'create'])->name('admins.create');
            Route::post('/admins', [AdminController::class, 'store'])->name('admins.store');
            Route::get('/admins/{admin}/edit', [AdminController::class, 'edit'])->name('admins.edit');
            Route::delete('/admins/{admin}', [AdminController::class, 'destroy'])->name('admins.destroy');
            Route::put('/admins/{admin}', [AdminController::class, 'update'])->name('admins.update');

            Route::post('/roles/bulk-delete', [RoleController::class, 'bulkDelete'])->name('roles.bulk-delete');
            Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
            Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
            Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
            Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
            Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
            Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');

            Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
            Route::post('settings', [SettingController::class, 'update'])->name('settings.update');

            Route::get('/account-settings', [AccountSettingController::class, 'edit'])->name('account-settings.edit');
            Route::put('/account-settings', [AccountSettingController::class, 'update'])->name('account-settings.update');

            Route::get('/analytics', AnalyticsController::class)->name('analytics');
            Route::get('/top-referrers', TopReferrerController::class)->name('top-referrers');
            Route::get('/most-visited-pages', MostVisitedPageController::class)->name('most-visited-pages');

            // PAGE
            Route::post('/pages/bulk-delete', [PageController::class, 'bulkDelete'])->name('pages.bulk-delete');
            Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
            Route::get('/pages/create', [PageController::class, 'create'])->name('pages.create');
            Route::post('/pages', [PageController::class, 'store'])->name('pages.store');
            Route::get('/pages/{page}/edit', [PageController::class, 'edit'])->name('pages.edit');
            Route::delete('/pages/{page}', [PageController::class, 'destroy'])->name('pages.destroy');
            Route::put('/pages/{page}', [PageController::class, 'update'])->name('pages.update');
            Route::post('/pages/{page}/status', [PageController::class, 'changeStatus'])->name('pages.change.status');
            //Upload Tinymce
            Route::post('pages/upload/image', [PageController::class, 'upLoadFileImage'])->name('pages.upload.image');

            // POST
            Route::post('/posts/bulk-delete', [PostController::class, 'bulkDelete'])->name('posts.bulk-delete');
            Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
            Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
            Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
            Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
            Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
            Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
            Route::post('/posts/{post}/status', [PostController::class, 'changeStatus'])->name('posts.change.status');
            Route::post('/posts/bulk-status', [PostController::class, 'bulkStatus'])->name('posts.bulk.status');

            //Upload Tinymce
            Route::post('posts/upload/image', [PostController::class, 'upLoadFileImage'])->name('posts.upload.image');

            // BANNER
            Route::group(['middleware' => ['banner']], function () {
                Route::post('/banners/bulk-delete', [BannerController::class, 'bulkDelete'])->name('banners.bulk-delete');
                Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');
                Route::get('/banners/create', [BannerController::class, 'create'])->name('banners.create');
                Route::post('/banners', [BannerController::class, 'store'])->name('banners.store');
                Route::get('/banners/{banner}/edit', [BannerController::class, 'edit'])->name('banners.edit');
                Route::delete('/banners/{banner}', [BannerController::class, 'destroy'])->name('banners.destroy');
                Route::put('/banners/{banner}', [BannerController::class, 'update'])->name('banners.update');
                Route::post('/banners/{banner}/status', [BannerController::class, 'changeStatus'])->name('banners.change.status');
                Route::post('/banners/bulk-status', [BannerController::class, 'bulkStatus'])->name('banners.bulk.status');
            });

            // LOG ACTIVITY
            Route::get('/log-activities', [LogActivityController::class, 'index'])->name('log-activities.index');
            Route::get('/log-activities/{log_activitiy}', [LogActivityController::class, 'show'])->name('log-activities.show');
            Route::post('/log-activities/bulk-delete', [LogActivityController::class, 'bulkDelete'])->name('log-activities.bulk-delete');
            Route::delete('/log-activities/{log_activitiy}', [LogActivityController::class, 'destroy'])->name('log-activities.destroy');

            //Search Taxon
            Route::get('/taxons/search', TaxonSearchController::class)->name('taxons.search');

            //Contact
            Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
            Route::get('/subscribe-emails', [ContactController::class, 'subscribeEmail'])->name('contacts.subscribe_email');
            Route::get('/searchs', [ContactController::class, 'search'])->name('contacts.search');

            //Mail
            Route::get('/mail-settings', [MailSettingController::class, 'index'])->name('mail-settings.index');
            Route::post('/mail-settings', [MailSettingController::class, 'save'])->name('mail-settings.save');
            Route::post('/send-mail-now', [MailSettingController::class, 'send_mail_now'])->name('mail-settings.send-mail-now');
            Route::delete('/mail-settings/delete/{slug}', [MailSettingController::class, 'delete'])->name('mail-settings.delete');

            //Menu
            Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');
            Route::post('/menus/store', [MenuController::class, 'store'])->name('menus.store');
            Route::get('/menus/{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit');
            Route::put('/menus/{menu}', [MenuController::class, 'update'])->name('menus.update');
            Route::post('/menus/{menu}/status', [MenuController::class, 'changeStatus'])->name('menus.change.status');
            Route::post('/menus/bulk-status', [MenuController::class, 'bulkStatus'])->name('menus.bulk.status');
            Route::get('menus/{menu}/menu-item/{menu_item}/jstree', [MenuItemController::class, 'tree'])->name('menu_item.tree');
            Route::get('/menus/{menu}/jstree', [MenuController::class, 'tree'])->name('menus.tree');
            Route::post('/menus/get_data_create', [MenuController::class, 'getDataCreate'])->name('menus.getDataCreate');
            Route::post('/menus/get_data_update', [MenuController::class, 'getDataUpdate'])->name('menus.getDataUpdate');
            Route::delete('/menus/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');
            Route::post('/menus/bulk-delete', [MenuController::class, 'bulkDelete'])->name('menus.bulk-delete');
            Route::get('/menus/search-data', [MenuController::class, 'searchData'])->name('menus.search-data');

            Route::post('/menu-item', [MenuItemController::class, 'store'])->name('menu-item.store');
            Route::get('/menu-item/{menu_item}/edit', [MenuItemController::class, 'edit'])->name('menu-item.edit');
            Route::delete('/menu-item/{menu_item}', [MenuItemController::class, 'destroy'])->name('menu-item.destroy');
            Route::post('/menu-item/update', [MenuItemController::class, 'update'])->name('menu-item.update');
        });
});
