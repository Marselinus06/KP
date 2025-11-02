<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard/dashboard');
});

Route::get('/login', function () {
    return view('login/login');
});