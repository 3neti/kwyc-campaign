<?php

use App\Hyperverge\RetrieveResultController;
use Illuminate\Support\Facades\Route;

Route::get('hyperverge-api/result', RetrieveResultController::class)->name('hyperverge-result');
