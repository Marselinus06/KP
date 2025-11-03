<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard/home');
});

Route::get('/login', function () {
    return view('login/login');
});

Route::get('/users', function () {
    return view('dashboard/userslayout');
});

Route::get('/waste-data', function () {
    return view('dashboard/wastedatalayout');
});

Route::get('/transactions', function () {
    return view('dashboard/transactionlayout');
});