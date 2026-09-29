<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DutyScheduleController as AdminDutyScheduleController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

// Struktur
Route::view('/struktur', 'struktur')
    ->name('struktur');

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
    Route::get('/siswa/tambah', [AdminStudentController::class, 'create'])->name('admin.students.create');
    Route::post('/siswa', [AdminStudentController::class, 'store'])->name('admin.students.store');
    Route::get('/siswa/{student}/edit', [AdminStudentController::class, 'edit'])->name('admin.students.edit');
    Route::put('/siswa/{student}', [AdminStudentController::class, 'update'])->name('admin.students.update');
    Route::delete('/siswa/{student}', [AdminStudentController::class, 'destroy'])->name('admin.students.destroy');

    // Jadwal piket
    Route::get('/jadwal-piket', [AdminDutyScheduleController::class, 'index'])->name('admin.duty-schedule.index');
    Route::get('/jadwal-piket/tambah', [AdminDutyScheduleController::class, 'create'])->name('admin.duty-schedule.create');
    Route::post('/jadwal-piket', [AdminDutyScheduleController::class, 'store'])->name('admin.duty-schedule.store');
    Route::get('/jadwal-piket/{dutySchedule}/edit', [AdminDutyScheduleController::class, 'edit'])->name('admin.duty-schedule.edit');
    Route::put('/jadwal-piket/{dutySchedule}', [AdminDutyScheduleController::class, 'update'])->name('admin.duty-schedule.update');
    Route::delete('/jadwal-piket/{dutySchedule}', [AdminDutyScheduleController::class, 'destroy'])->name('admin.duty-schedule.destroy');
});
