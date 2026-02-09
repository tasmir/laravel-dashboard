<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['sanitize_input']], function () {

    Route::view('/', 'frontend.pages.index')->name('home.index');
    Route::view('/header/dynamic', 'frontend.layouts.helper.headerOption')->middleware('web');
});




Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin Users
Route::middleware(['auth:web', 'role:Creator|Super Admin|Admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('index');
    Route::get('cache/clear', [\App\Http\Controllers\Backend\DashboardController::class, 'cacheClear'])->name('cache.clear');

//    Route::resource('contacts', \App\Http\Controllers\Backend\ContactController::class)->only('index');
//    Route::resource('activities', \App\Http\Controllers\Backend\ActivityController::class)->only('index');
//    Route::resource('coupons', \App\Http\Controllers\Backend\CouponController::class);

    Route::resource('users', \App\Http\Controllers\Backend\UserController::class);
    Route::resource('roles', \App\Http\Controllers\Backend\RoleController::class);
    Route::resource('permissions', \App\Http\Controllers\Backend\PermissionController::class);
});

