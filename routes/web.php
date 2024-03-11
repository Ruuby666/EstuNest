<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

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

Route::get('/create', [PropertyController::class, 'create'])->name('create');