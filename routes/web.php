<?php

use App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Backend\Auditor;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Frontend\WelcomeController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'web', 'namespace' => 'Frontend', 'as' => 'frontend.'], function() {

    Route::get('/lang', [WelcomeController::class, 'setLocal'])->name('set-local');
    Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');

});

Route::group(['middleware' => ['auth:sanctum', 'verified'], 'prefix' => 'dashboard'], function (){
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    /* USER BLOCK */

    /* AUDITOR BLOCK */
    Route::group(['middleware' => ['role:admin|manager|seller'], 'prefix' => 'auditor', 'as' => 'auditor.'], function () {
        Route::resource('users', Auditor\UserController::class)->names('users');
    });

    /* ADMIN BLOCK */
    Route::group(['middleware' => ['role:admin|manager'], 'prefix' => 'admins', 'as' => 'admins.'], function (){

        /* Categories */Route::resource('categories', Admin\CategoryController::class)->names('categories');

        /* Users */
        Route::match(['get', 'post'],'/users/profile/{uuid}/personal', [Admin\UserController::class, 'profilePersonal'])->name('users.profile.personal');
        Route::match(['get', 'post'],'/users/profile/{uuid}/permission', [Admin\UserController::class, 'profilePermission'])->name('users.profile.permission');
        Route::match(['get', 'post'],'/users/profile/{uuid}/company', [Admin\UserController::class, 'profileCompany'])->name('users.profile.company');
        Route::match(['get', 'post'],'/users/profile/{uuid}/security', [Admin\UserController::class, 'profileSecurity'])->name('users.profile.security');
        Route::post('/users/profile/{uuid}/password/update', [Admin\UserController::class, 'passwordUpdate'])->name('users.profile.password.update');
        Route::resource('users', Admin\UserController::class)->names('users');
        Route::resource('companies', Admin\CompanyController::class)->names('companies');
        Route::resource('taxes', Admin\TaxController::class)->names('taxes');
        Route::resource('reports', Admin\ReportController::class)->names('reports');

        /* Settings */
        Route::get('/cache-clear', [SettingController::class, 'cacheClear'])->name('settings.cache.clear');
        Route::get('/translations', [SettingController::class, 'translationManager'])->name('settings.translations');
    });
});
