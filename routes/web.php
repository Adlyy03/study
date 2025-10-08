<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\InventoryController;

// Halaman awal
Route::get('/', function () {
    $students = Student::latest()->take(6)->get(); // ambil 6 siswa terbaru
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login'); // pastikan ke file login.blade.php
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Route students (CRUD)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('students', StudentController::class);
});

// Route User Management (CRUD)
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard menampilkan tabel users
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    // Route users normal (CRUD)
    Route::get('/users', [UserController::class, 'index'])->name('users.index'); // Index → GET
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // Form tambah
    Route::post('/users', [UserController::class, 'store'])->name('users.store'); // Simpan data
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit'); // Edit form
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update'); // Update
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy'); // Delete
});

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('teachers', TeacherController::class);
Route::resource('inventories', InventoryController::class);

// Auth routes
require __DIR__.'/auth.php';
