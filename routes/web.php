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




// Route::get('/account/create-event',[AccountController::class,'createEvent'])->name('account.event');
// Route::post('/account/save-event',[AccountController::class,'store'])->name('account.saveJob');

// Route::get('/account/create-event', [AccountController::class, 'createEvent'])->name('account.event');
// Route::post('/account/save-event', [AccountController::class, 'store'])->name('account.saveJob');



Route::get('/account/create2',[AccountController::class,'createEvent2'])->name('account.createEvent2');
Route::post('/account/create2',[AccountController::class,'createEvent2'])->name('account.saveJob2');