<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailCategoryController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::resource('surat', MailController::class);
Route::get('surat/{surat}/download', [MailController::class, 'download'])->name('surat.download');
Route::resource('kategori-surat', MailCategoryController::class);
Route::get('/about', [HomeController::class, 'about'])->name('about');