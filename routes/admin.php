<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])
            ->name('login');

        Route::post('/login', [AuthController::class, 'login'])
            ->name('login.submit');
    });

    Route::middleware('auth')->group(function () {

        Route::get('/', [AdminController::class, 'index'])
            ->name('dashboard');

        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('logout');

        Route::resource('students', StudentController::class)
            ->except(['show']);

        Route::resource('galleries', GalleryController::class)
            ->except(['show']);
    });
});
