<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

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

Route::get('/', function() {
    return view('mainPage');
})->name('mainPage');

Route::get('/about', function () {
    return view('aboutUs');
})->name('aboutUs');

Route::get('/catalog', [PropertyController::class, 'index'])->name('catalog');

Route::get('/signUp', function () {
    return view('signUp');
})->name('signUp');

Route::get('/login', function () {
    return view('logIn');
})->name('logIn');

Route::get('/property/{id}', [PropertyController::class, 'show'])->name('property');
