<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.form');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/dashboard', function () {
    return view('auth.dashboard');
});
Route::get('/form', function () {
    return view('layout.form');
});