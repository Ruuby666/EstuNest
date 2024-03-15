<?php

use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\FilterController;


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

Route::get('/', [PropertyController::class, 'recomendaciones'])->name('mainPage');

Route::get('/about', function () {
    return view('aboutUs');
})->name('aboutUs');

Route::get('/catalog', [PropertyController::class, 'index'])->name('catalog');

Route::get('/signup', function () {
    return view('signUp');
})->name('signUp');

Route::post('/signup', [UserController::class, 'register'])->name('signup.create');


Route::get('/login', function () {
    return view('logIn');
})->name('logIn');

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/property/{id}', [PropertyController::class, 'show'])->name('property');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/userDetails', [PropertyController::class, 'create'])->name('userDetails');

Route::get('/userDetails',[DocumentController::class, 'uploadDocument'])->name('documentNew');

Route::post('/userDetails', [PropertyController::class, 'register'])->name('property.create');

Route::get('/userProperties', [UserController::class, 'viewMyProperties'])->name('userProperties');


// Route::get('/userDetails/{id}/edit', 'PropertyController@edit')->name('property.edit');

Route::delete('/userProperties/{id}', [PropertyController::class, 'destroy'])->name('property.delete');

Route::get('/reserve/{id}', [PropertyController::class, 'rentPay'])->name('reserveProperty');

Route::post('/reserve/{id}/pay', [RentController::class, 'pay'])->name('reserveProperty.pay');


Route::post('/filter', [FilterController::class, 'filter'])->name('filter');

