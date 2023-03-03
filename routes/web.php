<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'loginView')->name('login.view');
    Route::post('/login', 'login')->name('login');
    Route::get('/register', 'registerView')->name('register.view');
    Route::post('/register', 'register')->name('register');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/send-mails', [MailController::class, 'sendMails'])->name('mail.sends');
Route::get('/create/product', [ProductController::class, 'create'])->name('product.create');
Route::post('/create/product', [ProductController::class, 'store'])->name('product.store');
