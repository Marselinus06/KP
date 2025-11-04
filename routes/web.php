<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

// Rute untuk otentikasi (Login & Logout)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['is_logged_in'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'home']);
    Route::get('/users', [DashboardController::class, 'users']);
    Route::get('/waste-data', [DashboardController::class, 'wasteData']);
    Route::get('/transactions', [DashboardController::class, 'transactions']);
});