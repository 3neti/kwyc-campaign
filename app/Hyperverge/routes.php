<?php

use App\Hyperverge\Http\Controllers\RetrieveResultController;
use Illuminate\Support\Facades\Route;

Route::get('hyperverge-api/result', RetrieveResultController::class)->name('hyperverge-result');
