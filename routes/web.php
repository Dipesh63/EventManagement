<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\GoogleAuthController;
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



Route::get('/account/create',[AccountController::class,'createEvent2'])->name('account.createEvent');
Route::post('/account/store2',[AccountController::class,'store2'])->name('account.saveJob2');


Route::get('/events',[EventsController::class,'index'])->name('events');
Route::get('/events/detail/{id}',[EventsController::class,'detail'])->name('eventsDetail');








Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/callback', [GoogleAuthController::class, 'callbackbygoogle']);
Route::get('/dashboardnew', [AccountController::class, 'dashboardnew'])->name('dashboardnew');
Route::get('/dashboardnew2', [AccountController::class, 'dashboardnew2'])->name('dashboardnew2');
