<?php

use App\Http\Controllers\CategoryController;
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