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

Route::get('/property/{id}', [PropertyController::class, 'show'])->name('show.property');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/userDetails', [UserController::class, 'details'])->name('userDetails');

Route::post('/userDetails', [DocumentController::class, 'uploadDocument'])->name('userDetails.uploadDocument');


Route::post('/createProperty', [PropertyController::class, 'create'])->name('property.create');

Route::get('/userProperties', [UserController::class, 'viewMyProperties'])->name('userProperties');

 Route::get('/userProperties/{id}/edit', [PropertyController::class, 'edit'])->name('property.edit');

 Route::post('/userProperties/{id}/update', [PropertyController::class, 'update'])->name('property.update');

Route::delete('/userProperties/{id}', [PropertyController::class, 'destroy'])->name('property.delete');

Route::get('/reserve/{id}', [PropertyController::class, 'rentPay'])->name('reserveProperty');

Route::post('/reserve/{id}/pay', [RentController::class, 'pay'])->name('reserveProperty.pay');


Route::post('/filter', [FilterController::class, 'filter'])->name('filter');

Route::get('/documents', [DocumentController::class, 'viewDocuments'])->name('mainAdmin');

Route::post('/documents/{id}/accept', [DocumentController::class, 'acceptDocument'])->name('document.accept');

Route::post('/documents/{id}/deny', [DocumentController::class, 'denyDocument'])->name('document.deny');


Route::get('/viewAllProperties', [PropertyController::class, 'viewAllProperties'])->name('viewAllProperties');
Route::post('/viewAllProperties/{id}', [PropertyController::class, 'adminDeleteProperty'])->name('admin.property.delete');