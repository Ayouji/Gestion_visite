<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\VisiteController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsLoged;
use App\Http\Middleware\Logged;
use App\Http\Middleware\Result;
use App\Models\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */

//Route::resource('calendar', VisiteController::class);
Route::get('welcome', [VisiteController::class, 'inde2'])->name('welcome');
Route::get('calendar/index', [VisiteController::class, 'index'])->name('calendar.index')->middleware(IsLoged::class);
Route::get('calendar/show/{id}', [VisiteController::class, 'show'])->name('calendar.show')->middleware([Result::class, IsLoged::class]);
Route::post('calendar', [VisiteController::class, 'store'])->name('calendar.store');
Route::get('search', [VisiteController::class, 'search']);
Route::post('result', [ResultController::class, 'store'])->name('result.store');
Route::post('resultNon', [ResultController::class, 'store_2'])->name('resultNon.store_2');
Route::put('/result/{id}', [ResultController::class, 'update']);
Route::post('/emails/sendMail',[MailController::class,'store'])->name('emails.sendMail');

// Auth

Route::middleware(Logged::class)->group(function() {
    Route::get('/', [AuthController::class, 'create'])->name('auth.create');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
});

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware(IsLoged::class);
Route::get('/admin', [AuthController::class, 'admin'])->name('admin')->middleware(IsAdmin::class);
Route::get('/auth/profil/{id}', [AuthController::class, 'profil'])->name('auth.profil')->middleware(IsLoged::class);
Route::put('update/{id}', [AuthController::class, 'update'])->name('profil.update');

// parti admin
Route::middleware(IsAdmin::class)->group(function() {
Route::get('admin/commercial', [AdminController::class, 'index'])->name('admin.commercial'); 
Route::get('admin/detail/{id}', [AdminController::class, 'show'])->name('admin.detail');
Route::get('admin/client', [ClientController::class, 'index'])->name('admin.client');
Route::get('client/create', [ClientController::class, 'create'])->name('client.create');
Route::post('client/store', [ClientController::class, 'store'])->name('client.store');
Route::get('client/destroy/{id}', [ClientController::class, 'destroy']);
Route::get('contact/create', [ClientController::class, 'contact'])->name('contact.create');
Route::post('contact/store_2', [ClientController::class, 'store_2'])->name('contact.store_2');
Route::get('admin/chart', [ChartController::class, 'chart']);
});

