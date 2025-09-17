<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;

// ✅ Group untuk user management (CRUD)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard'); // Read
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // Create form
    Route::post('/users', [UserController::class, 'store'])->name('users.store'); // Store
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit'); // Edit form
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update'); // Update
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy'); // Delete
});

// ✅ Halaman awal
Route::get('/', function () {
    return view('welcome');
});

// ✅ Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Auth routes
require __DIR__.'/auth.php';
