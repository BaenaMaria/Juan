<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/enviar-email', [UserController::class, 'vistaEmail'])->name('vistaEmail');
Route::get('/send-email', [EmailController::class, 'sendEmail'])->name('sendEmail');
Route::any('/pruebaCorreo', [EmailController::class, 'index'])->name('pruebaCorreo');

