<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Middleware\Authenticate;





Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/account/UserRegister', [AccountController::class, 'registration'])->name('account.registration');
Route::post('/account/Process_UserRegister', [AccountController::class, 'processRegistration'])->name('account.processRegistration');
Route::get('/account/login', [AccountController::class, 'login'])->name('account.login');
Route::post('/account/authentication', [AccountController::class, 'authenticateUser'])->name('account.authenticateUser');
Route::get('/account/profile', [AccountController::class, 'profile'])->name('account.profile');
Route::get('/account/logout', [AccountController::class, 'logout'])->name('account.logout');


Route::get('/account/create', [AccountController::class, 'createEvent2'])->name('account.createEvent');
Route::post('/account/store2', [AccountController::class, 'store2'])->name('account.saveEvent2');
Route::get('/account/my-events', [AccountController::class, 'myEvents'])->name('account.myEvents');


Route::get('/events', [EventsController::class, 'index'])->name('events');
Route::get('/events/detail/{id}', [EventsController::class, 'detail'])->name('eventsDetail');
Route::post('/events/apply-event', [EventsController::class, 'applyevent2'])->name('event.applyevent');

Route::post('/delete-event', [AccountController::class, 'deleteEvent'])->name('account.deleteEvent');

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/callback', [GoogleAuthController::class, 'callbackbygoogle']);
Route::get('/dashboardnew', [AccountController::class, 'dashboardnew'])->name('dashboardnew');
Route::get('/dashboardnew2', [AccountController::class, 'dashboardnew2'])->name('dashboardnew2');















//Mail Controlling
//Route::get('/send-mail', [EmailController::class, 'sendWelcomeEmail'])->name('send-mail');
Route::get('/send-mail/{event_id}', [EmailController::class, 'sendWelcomeEmail'])->name('send-mail');



Route::get('/account/my-event-applications', [AccountController::class, 'myEventApplication'])->name('account.myEventApplication');
Route::post('/cancel-event-application', [AccountController::class, 'cancelEvents'])->name('account.cancelEvents');















//sms sending
Route::get('/send-sms/{toNumber}', [SMSController::class, 'sendSMS']);
Route::get('/check-balance', [SMSController::class, 'checkBalance']);

















// SSLCOMMERZ Start
Route::get('/checkout1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/checkout2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);
// Route::get('/checkout2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay/{id}', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);


Route::get('/checkout3/{event_id}', [SslCommerzPaymentController::class, 'exampleHostedCheckout3']);
//SSLCOMMERZ END















//middleware handling
Route::middleware([Authenticate::class])->group(function () {
    Route::get('/account/create', [AccountController::class, 'createEvent2'])->name('account.createEvent');
    Route::get('/events/detail/{id}', [EventsController::class, 'detail'])->name('eventsDetail');
});
