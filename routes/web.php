<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;


/*
|--------------------------------------------------------------------------
| WEBSITE PUBLIC
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])
    ->name('home');


// Galeri
Route::get('/galeri', [GalleryController::class, 'index'])
    ->name('gallery');


// Prestasi
Route::get('/prestasi', [AchievementController::class, 'index'])
    ->name('achievement');


// Profil Siswa
Route::get('/profil-siswa', [StudentController::class, 'index'])
    ->name('students');


// Detail siswa
Route::get('/profil-siswa/{student}', [StudentController::class, 'show'])
    ->name('students.show');


// Jadwal piket rayon
Route::get('/jadwal-piket', [StudentController::class, 'dutySchedule'])
    ->name('duty-schedule');

Route::middleware('auth')->group(function () {
    Route::get('/profil-saya', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profil-saya', [ProfileController::class, 'update'])->name('profile.update');
});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

// Halaman login admin
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])
    ->name('admin.login');

// Proses login
Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login.process');

// Logout
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout');


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/siswa', [AdminStudentController::class, 'index'])->name('admin.students.index');
    Route::get('/siswa/{student}/edit', [AdminStudentController::class, 'edit'])->name('admin.students.edit');
    Route::put('/siswa/{student}', [AdminStudentController::class, 'update'])->name('admin.students.update');
});