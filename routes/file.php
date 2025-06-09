<?php

use App\Modules\File\Controllers\FileController;
use Illuminate\Support\Facades\Route;

Route::post('upload', [FileController::class, 'upload'])->name('upload');
Route::delete('remove/{file}', [FileController::class, 'remove'])->name('remove');
