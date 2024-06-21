<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CurrencyController;
use App\Models\Users;
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/settings', [ProfileController::class, 'edit'])->name('settings');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profileOfUser');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/currencyExchange', [CurrencyController::class, 'exchangeVue'])->name('currencyExchange');
    Route::get('/submitCurrency', [CurrencyController::class, 'SubmitCurrency']);
    Route::post('/save-data', [CurrencyController::class, 'submitCurrencyExchange']);
    //Route::get('/exchangeSubmit2', [CurrencyController::class, 'submitCurrencyExchange']);
    Route::post('/GetCurrencyColumn', [CurrencyController::class, 'GetCurrencyColumn']);
    Route::post('/returnCurrencies', [CurrencyController::class, 'returnAllCurrencies']);



});

require __DIR__.'/auth.php';
