<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('/tester', 'App\Http\Controllers\CustomerController@holla');
});

Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index']); 
Route::get('/customers/{id}', [App\Http\Controllers\CustomerController::class, 'show']); 
Route::post('/customers', [App\Http\Controllers\CustomerController::class, 'store']); 
Route::put('/customers/{id}', [App\Http\Controllers\CustomerController::class, 'update']); 
Route::delete('/customers/{id}', [App\Http\Controllers\CustomerController::class, 'destroy']); 
Route::get('/holla', [App\Http\Controllers\CustomerController::class, 'holla']);
