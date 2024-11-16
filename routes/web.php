<?php

use App\Http\Controllers\SanctionCampaignController;
use App\Http\Middleware\{EnsureEnabled, SanctionAct};
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Actions\AutoCampaignCheckin;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('campaign-disabled', function () {
    return 'disabled';
})->name('campaign-disabled');

Route::get('campaign-unsanctioned', function () {
    return 'unsanctioned';
})->name('campaign-unsanctioned');

Route::get('sanction-campaign/{campaign}', [SanctionCampaignController::class, 'show'])
    ->name('sanction-campaign.show');

Route::post('sanction-campaign', [SanctionCampaignController::class, 'store'])
    ->name('sanction-campaign.store');

Route::get('campaign-checkin/{campaign}/{checkin?}', AutoCampaignCheckin::class)
    ->middleware(EnsureEnabled::class)
    ->middleware(SanctionAct::class)
    ->name('campaign-checkin');
