<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/account/UserRegister',[AccountController::class,'registration'])->name('account.registration');
Route::post('/account/Process_UserRegister',[AccountController::class,'processRegistration'])->name('account.processRegistration');
Route::get('/account/login',[AccountController::class,'login'])->name('account.login');
Route::post('/account/authentication',[AccountController::class,'authenticateUser'])->name('account.authenticateUser');
Route::get('/account/profile',[AccountController::class,'profile'])->name('account.profile');
