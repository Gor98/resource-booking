<?php

use App\Modules\Resource\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;


Route::post('', [ResourceController::class, 'store'])->name('store');
Route::get('', [ResourceController::class, 'index'])->name('index');
Route::get('{resource}/bookings', [ResourceController::class, 'bookings'])->name('bookings');
// TODO
