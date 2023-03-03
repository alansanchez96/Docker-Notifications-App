<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/send-mails', [MailController::class, 'sendMails'])->name('mail.sends');
Route::get('/create/product', [ProductController::class, 'create'])->name('product.create');
Route::post('/create/product', [ProductController::class, 'store'])->name('product.store');
