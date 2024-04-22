<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\VisiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('calendar', VisiteController::class);

Route::get('calendar/index', [VisiteController::class, 'index'])->name('calendar.index');
Route::get('calendar/show/{id}', [VisiteController::class, 'show'])->name('calendar.show');
Route::post('calendar', [VisiteController::class, 'store'])->name('calendar.store');
Route::post('result', [ResultController::class, 'store'])->name('result.store');
Route::post('resultNon', [ResultController::class, 'store_2'])->name('resultNon.store_2');
Route::put('/result/{id}', [ResultController::class, 'update']);
Route::post('/emails/sendMail',[MailController::class,'store'])->name('emails.sendMail');

// Auth

Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'store'])->name('auth.store');
Route::get('/login/create', [AuthController::class, 'create'])->name('auth.create');
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');


