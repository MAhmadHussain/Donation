<?php

use App\Http\Controllers\homecontroller;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});


Route::get('/confirm', [StripePaymentController::class,'confirm']);
Route::view('/about', 'about');
Route::view('/payment', 'payment');
Route::view('/contact', 'contact');
Route::post('/contact', [homecontroller::class, 'loadcontact']);
Route::post('/payment', [StripePaymentController::class, 'charge']);
Route::view('/services', 'services');