<?php

use App\Modules\Product\Controllers\ProductController;
use App\Modules\Product\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ProductController::class, 'all'])
    ->middleware('optional.auth')
    ->name('all');
Route::post('add-favorite', [ProductController::class, 'addFavorite'])
    ->middleware('auth:sanctum')
    ->name('add-favorite');
Route::delete('remove-favorite/{product}', [ProductController::class, 'removeFavorite'])
    ->middleware('auth:sanctum')
    ->name('remove-favorite');
Route::get('categories', CategoryController::class)->name('categories');
