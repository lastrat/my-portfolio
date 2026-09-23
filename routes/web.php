<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/lang/{locale}', [PortfolioController::class, 'switchLanguage'])->name('lang.switch');
