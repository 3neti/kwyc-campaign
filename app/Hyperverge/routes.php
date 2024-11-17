<?php

use App\Hyperverge\Http\Controllers\CallbackController;
use Illuminate\Support\Facades\Route;

/** @deprecated  */
Route::get('hyperverge-api/result', CallbackController::class)->name('hyperverge-result');

Route::get('hyperverge-callback', CallbackController::class)->name('hyperverge-callback');
