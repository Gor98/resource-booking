<?php

use App\Modules\Resource\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;


Route::post('', [ResourceController::class, 'store'])->name('store');
Route::get('', [ResourceController::class, 'index'])->name('index');
