<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TwoFAController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Alapértelmezett auth routes
Auth::routes();

// Főoldal útvonal átirányítás
Route::redirect('/', '/home');

// Cégek listája
Route::get('/companiesList', [CompanyController::class, 'index']);

// Kijelentkezés
Route::get('/logout', [LoginController::class, 'logout']);

// Kezdőoldal
Route::middleware('2fa')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

// Cégek erőforrás útvonalai
Route::resource('/company', CompanyController::class)->name('', 'CCreate');

// Kétlépcsős hitelesítés
Route::prefix('2fa')->name('2fa.')->group(function () {
    Route::get('/', [TwoFAController::class, 'index'])->name('index');
    Route::post('/', [TwoFAController::class, 'store'])->name('post');
    Route::get('/reset', [TwoFAController::class, 'resend'])->name('resend');
});