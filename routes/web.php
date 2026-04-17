<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Website Routes
Route::prefix('website')->name('website.')->group(function () {
    Route::get('/', [WebsiteController::class, 'index'])->name('index');
    Route::get('/{id}/dashboard', [WebsiteController::class, 'show'])->name('show');
    Route::get('/{id}/analytics', [WebsiteController::class, 'analytics'])->name('analytics');
    Route::get('/{id}/logs', [WebsiteController::class, 'logs'])->name('logs');
});

// Sidebar Menu Routes
Route::get('/analytics', [\App\Http\Controllers\AnalyticsController::class, 'index'])->name('analytics');
Route::get('/security', [\App\Http\Controllers\SecurityController::class, 'index'])->name('security');
Route::get('/logs', [\App\Http\Controllers\LogsController::class, 'index'])->name('logs');
Route::get('/alerts', [\App\Http\Controllers\AlertsController::class, 'index'])->name('alerts');
Route::get('/settings', [\App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
