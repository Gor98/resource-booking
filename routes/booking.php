<?php

use App\Modules\Booking\Controllers\BookingController;
use Illuminate\Support\Facades\Route;


Route::post('', [BookingController::class, 'store'])->name('store');
Route::delete('{booking}', [BookingController::class, 'remove'])->name('remove');
