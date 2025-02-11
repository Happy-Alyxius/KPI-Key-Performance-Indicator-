<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout/dashboard-kpi');
});

Route::get('/tables', function () {
    return view('layout/tables');
});

Route::get('/login', function () {
    return view('layout/login');
});