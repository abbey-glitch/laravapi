<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/customers', [App\Http\Controllers\AppController::class, 'test']);
