<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\VisiteController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */

//Route::resource('calendar', VisiteController::class);

Route::get('calendar/index', [VisiteController::class, 'index'])->name('calendar.index');
Route::get('calendar/show/{id}', [VisiteController::class, 'show'])->name('calendar.show');
Route::get('/', [VisiteController::class, 'inde2'])->name('welcome');
Route::post('calendar', [VisiteController::class, 'store'])->name('calendar.store');
Route::post('result', [ResultController::class, 'store'])->name('result.store');
Route::put('/result/{id}', [ResultController::class, 'update']);
Route::post('/emails/sendMail',[MailController::class,'store'])->name('emails.sendMail');