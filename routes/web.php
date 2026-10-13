<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');
Route::post('/contact', [PortfolioController::class, 'sendContact'])->name('contact.send');
Route::get('/lang/{locale}', [PortfolioController::class, 'switchLanguage'])->name('lang.switch');
