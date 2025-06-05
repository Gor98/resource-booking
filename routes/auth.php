<?php

use App\Modules\Auth\Controllers\AuthController;
use App\Modules\Auth\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::post('login', [AuthController::class, 'login'])->name('login');
Route::delete('logout', [AuthController::class, 'logout'])
    ->middleware('auth:sanctum')
    ->name('logout');
Route::post('register', RegisterController::class)->name('register');
