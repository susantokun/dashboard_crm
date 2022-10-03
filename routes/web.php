<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Q_sorbController;
use App\Http\Controllers\Q_sorhController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ConfigurationController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', HomeController::class)->name('home');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::prefix('sales-orders')->name('sales-orders.')->group(function () {
        Route::get('table', [Q_sorhController::class, 'salesOrder'])->name('table');
    });
    Route::prefix('sales-contracts')->name('sales-contracts.')->group(function () {
        Route::get('table', [Q_sorhController::class, 'salesContract'])->name('table');
    });

    Route::prefix('billings')->name('billings.')->group(function () {
        Route::get('table', [Q_sorbController::class, 'table'])->name('table');
    });

    Route::prefix('settings')->name('settings.')->group(function () {

        Route::prefix('configurations')->name('configurations.')->group(function () {
            Route::get('general', [ConfigurationController::class, 'general'])->name('general');
            Route::post('general/{id}', [ConfigurationController::class, 'generalUpdate'])->name('generalUpdate');

            Route::get('about', [ConfigurationController::class, 'about'])->name('about');
            Route::put('about/{id}', [ConfigurationController::class, 'aboutUpdate'])->name('aboutUpdate');

            Route::get('contact', [ConfigurationController::class, 'contact'])->name('contact');
            Route::put('contact/{id}', [ConfigurationController::class, 'contactUpdate'])->name('contactUpdate');

            Route::get('privacy-policy', [ConfigurationController::class, 'privacyPolicy'])->name('privacyPolicy');
            Route::put('privacy-policy/{id}', [ConfigurationController::class, 'privacyPolicyUpdate'])->name('privacyPolicyUpdate');

            Route::get('term-and-condition', [ConfigurationController::class, 'termAndCondition'])->name('termAndCondition');
            Route::put('term-and-condition/{id}', [ConfigurationController::class, 'termAndConditionUpdate'])->name('termAndConditionUpdate');
        });
    });
});

require __DIR__ . '/auth.php';
