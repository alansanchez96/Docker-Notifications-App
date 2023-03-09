<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthController;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('welcome');
    Route::get('/markAsRead', 'markAsRead')->name('markAsRead')->middleware('auth');
    Route::post('/read-notification/{id}', 'readNotification')->name('readNotification')->middleware('auth');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'loginView')->name('login.view')->middleware('guest');
    Route::post('/login', 'login')->name('login')->middleware('guest');
    Route::get('/register', 'registerView')->name('register.view')->middleware('guest');
    Route::post('/register', 'register')->name('register')->middleware('guest');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/create/product', 'create')->name('product.create');
    Route::post('/create/product', 'store')->name('product.store')->middleware('auth');
});

Route::controller(FileController::class)->group(function () {
    Route::get('/file-storage', 'index')->name('file.index');
    Route::post('/file-storage', 'uploadFile')->name('uploadFile')->middleware('auth');
    Route::get('/file-storage/download/{file}', 'downloadFile')->name('downloadFile');
});

Route::get('/send-mails', [MailController::class, 'sendMails'])->name('mail.sends')->middleware('auth');
