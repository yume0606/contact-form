<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
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

//お問い合わせフォーム画面
Route::get('/', [CategoryController::class, 'index'])->name('form');
Route::post('/confirm', [CategoryController::class, 'confirm'])->name('contact.confirm');
Route::post('/thanks', [CategoryController::class, 'send'])->name('contact.send');
Route::post('/back', [CategoryController::class, 'back'])->name('contact.back');

//管理者画面
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.admin');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});